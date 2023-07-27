<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Verifikasi;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Hash;

use App\Exports\VerifikasiDataExport;
use App\Models\Informasi;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;




class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ditolak = Verifikasi::where('status', 'tolak')->count();
        $pendaftarTerverifikasi = Verifikasi::where('status', 'lulus')->count();
        $pendaftarHariIni = Verifikasi::whereDate('tanggal_daftar', Carbon::today())->get();
        $totalPendaftar = Verifikasi::count();
        $pendaftarBelumTerverifikasi = Verifikasi::where('status', 'proses')->count();

        return view('admin.dashboard', compact('ditolak', 'pendaftarTerverifikasi', 'pendaftarHariIni', 'totalPendaftar', 'pendaftarBelumTerverifikasi'));
    }

    public function dataPendaftar()
    {
        $verifikasi = Verifikasi::paginate(5); // Use paginate() instead of get()
        return view('admin.data-pendaftar', compact('verifikasi'));
    }

    public function hapusData($id)
    {
        $verifikasi = Verifikasi::findOrFail($id);

        $verifikasi->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    public function eksporData()
    {
        $verifikasi = Verifikasi::where('status', 'lulus')->paginate(5);
        return view('admin.pendaftar-lulus', compact('verifikasi'));
    }

    public function verifikasi(Request $request, $id)
    {
        $pendaftar = Verifikasi::find($id);

        if ($pendaftar) {

            $pendaftar->status = $request->input('status');
            $pendaftar->save();

            return back()->with('success', 'Berhasil Melakukan Verifikasi!');
        } else {
            // Jika tidak ditemukan, berikan respon error
            return back()->with('error', 'Data Pendaftaran tidak ditemukan!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $verifikasi = Verifikasi::findOrFail($id);
        return view('admin.detail-pendaftar', compact('verifikasi'));
    }

    public function updatePassowrd(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'password' => 'nullable|string|min:6',
        ]);

        // Memperbarui data akun siswa
        $siswa = Siswa::findOrFail($id);

        // Memperbarui password jika diinput
        if (!empty($validatedData['password'])) {
            $siswa->password = Hash::make($validatedData['password']);
        }



        $siswa->save();

        return redirect()->back()->with('success', 'Password berhasil diperbarui!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profilAdmin()
    {
        return view('admin.profil');
    }

    public function updateProfilAdmin(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::guard('user')->user()->id,
            'jabatan' => 'required|string|max:100',
            'password' => 'nullable|string|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png|max:1500',
        ]);

        // Memperbarui data akun admin
        $user = Auth::guard('user')->user();

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->jabatan = $validatedData['jabatan'];

        // Memperbarui password jika diinput
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }


        if ($request->hasFile('foto')) {
            $fotoFile = $request->file('foto');
            $fotoFileName = $user->name . '-foto.' . $fotoFile->getClientOriginalExtension();
            $fotoFilePath = $fotoFile->storeAs('admin/profil', $fotoFileName, 'public');
            $user->foto = $fotoFileName;
        }



        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil diperbarui!');
    }

    // public function dataAdmin()
    // {
    //     $user = User::all();
    //     return view('admin.data-admin', compact('user'));
    // }

    public function tambahUser(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jabatan' => 'required|string',
            'password' => 'nullable|string|min:6',
        ]);

        // Mengunggah foto jika ada
        if ($request->hasFile('foto')) {
            $fotoFile = $request->file('foto');
            $fotoFileName = $fotoFile->getClientOriginalName(); // Menggunakan nama asli file
            $fotoFilePath = $fotoFile->storeAs('admin/profil', $fotoFileName, 'public');
            $validatedData['foto'] = $fotoFileName; // Simpan nama file foto dalam data yang divalidasi
        }

        // Mengenkripsi password jika diinput
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        // Menambahkan data user ke database
        User::create($validatedData);

        return redirect()->back()->with('success', 'Admin berhasil ditambahkan!');
    }

    public function hapusUser($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto user jika ada
        if (!empty($user->foto)) {
            Storage::disk('public')->delete('admin/profil/' . $user->foto);
        }

        // Hapus user dari database
        $user->delete();

        return redirect()->back()->with('success', 'Admin berhasil dihapus!');
    }

    public function informasiPpdb()
    {
        $informasi = Informasi::all();
        return view('admin.informasi', compact('informasi'));
    }

    public function tambahInformasi(Request $request)
    {
        $informasi = new Informasi();
        $informasi->nama = $request->input('nama');
        $informasi->deskripsi = $request->input('deskripsi');
        $informasi->save();

        return redirect()->back()->with('success', 'Berhasil Menambahkan Informasi!');
    }

    public function UpdateinformasiPpdb(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->nama = $request->input('nama');
        $informasi->deskripsi = $request->input('deskripsi');
        $informasi->save();

        return redirect()->back()->with('success', 'Data informasi berhasil diperbarui');
    }


    public function hapusInformasi($id)
    {
        $informasi = Informasi::findOrFail($id);

        // Hapus informasi dari database
        $informasi->delete();

        return redirect()->back()->with('success', 'Informasi berhasil dihapus!');
    }

    public function export()
    {
        return Excel::download(new VerifikasiDataExport, 'verifikasi.xlsx');
    }


 
}
