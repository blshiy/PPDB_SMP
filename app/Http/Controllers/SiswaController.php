<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use PDF;
use App\Models\Siswa;
use App\Models\Verifikasi;
use Illuminate\Support\Facades\Redis;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class SiswaController extends Controller
{
    public function index()
    {

        $siswa = Auth::guard('siswa')->user();
        return view('siswa.dashboard');
    }

    public function updateAkun(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::guard('siswa')->user()->id,
            // 'nisn' => 'required|string|max:20',
            'password' => 'nullable|string|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png|max:1500',
        ]);

        // Memperbarui data akun siswa
        $user = Auth::guard('siswa')->user();

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        // $user->nisn = $validatedData['nisn'];

        // Memperbarui password jika diinput
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }


        if ($request->hasFile('foto')) {
            $fotoFile = $request->file('foto');
            $fotoFileName = $user->name . '-foto.' . $fotoFile->getClientOriginalExtension();
            $fotoFilePath = $fotoFile->storeAs('siswa/profil', $fotoFileName, 'public');
            $user->foto = $fotoFileName;
        }



        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil diperbarui!');
    }

    public function dataSiswa(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'jk' => 'required|in:Laki-Laki,Perempuan',
            'nisn' => 'required|numeric|digits:10',
            'nik' => 'required|numeric|digits:16',
            'no_kk' => 'required|numeric|digits:16',
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'no_akta_lahir' => 'required|numeric',
            'agama' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|numeric',
            'alamat' => 'required|string',
            'tempat_tinggal' => 'required|string',
            'anak_ke' => 'required|numeric',
            'kip' => 'required|in:ya,tidak',
            'menerima_kip' => 'required|in:ya,tidak',
            'tb' => 'required|numeric',
            'bb' => 'required|numeric',
            'saudara' => 'required|numeric', // Menambahkan validasi untuk fotoProfil
            'transportasi' => 'required', // Menambahkan validasi untuk fotoProfil
        ], [
            'name.required' => 'Nama Lengkap harus di isi',
            'jk.required' => 'Pilih Jenis Kelamin',
            'nisn.required' => 'NISN tidak boleh kosong',
            'nisn.digits' => 'NISN harus terdiri dari 10 digit',
            'nisn.number' => 'NISN hanya berisi angka',
            'nisn.unique' => 'NISN sudah digunakan oleh siswa lain. Harap gunakan NISN yang berbeda.',
            'nik.required' => 'NIK harus di isi',
            'nik.number' => 'NIK hanya berisi angka',
            'nik.digits' => 'NIK harus terdiri dari 16 digit',
            'no_kk.required' => 'No. KK harus di isi',
            'tempat_lahir.required' => 'Tempat Lahir harus di isi',
            'tgl_lahir' => 'Tanggal lahir harus di isi',
            'no_akta_lahir.required' => 'No. Akta Kelahiran harus di isi',
            'agama.required' => 'Agama harus di isi',
            'kewarganegaraan' => 'Kewarganegaraan harus di isi',
            'kelurahan.required' => 'Kelurahan harus di isi',
            'kecamatan.required' => 'Kecamatan harus di isi',
            'kode_pos.required' => 'Kode pos harus di isi',
            'alamat.required' => 'Alamat harus di isi',
            'tempat_tinggal.required' => 'Tempat tinggal harus di isi',
            'anak_ke.required' => 'Anak Keberapa harus di isi',
            'kip.required' => 'KIP harus di isi',
            'menerima_kip.required' => 'Apakah menerima KIP harus di isi',
            'tb.required' => 'Tinggi Badan harus di isi',
            'bb.required' => 'Berat badan harus di isi',
            'saudara.required' => 'Berapa saudara harus di isi',
            'transportasi.required' => 'Transportasi harus di isi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $siswa = auth('siswa')->user();
        $existingSiswa = Siswa::where('nisn', $request->input('nisn'))->first();
    
        if ($existingSiswa && $existingSiswa->id !== $siswa->id) {
            // If a student with the same nisn already exists and it's not the current student being updated, return an error message.
            return redirect()->back()->withErrors(['nisn' => 'NISN sudah digunakan oleh siswa lain. Harap gunakan NISN yang berbeda.'])->withInput();
        }


        $siswa->name = $request->input('name');
        $siswa->jk = $request->input('jk');
        $siswa->nisn = $request->input('nisn');
        $siswa->nik = $request->input('nik');
        $siswa->no_kk = $request->input('no_kk');
        $siswa->tempat_lahir = $request->input('tempat_lahir');
        $siswa->tgl_lahir = $request->input('tgl_lahir');
        $siswa->no_akta_lahir = $request->input('no_akta_lahir');
        $siswa->agama = $request->input('agama');
        $siswa->kewarganegaraan = $request->input('kewarganegaraan');
        $siswa->kelurahan = $request->input('kelurahan');
        $siswa->kecamatan = $request->input('kecamatan');
        $siswa->kode_pos = $request->input('kode_pos');
        $siswa->alamat = $request->input('alamat');
        $siswa->tempat_tinggal = $request->input('tempat_tinggal');
        $siswa->anak_ke = $request->input('anak_ke');
        $siswa->kip = $request->input('kip');
        $siswa->menerima_kip = $request->input('menerima_kip');
        $siswa->tb = $request->input('tb');
        $siswa->bb = $request->input('bb');
        $siswa->saudara = $request->input('saudara');
        $siswa->transportasi = $request->input('transportasi');
        $siswa->tolak_kip = $request->input('tolak_kip');

        $siswa->update();


        // Redirect ke route 'siswa' dengan pesan sukses
        return redirect()->route('siswa', ['tab' => 'profile'])->with('success', 'Data siswa berhasil disimpan.');
    }

    public function dataOrangTua(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_ayah' => 'required|string',
            'nik_ayah' => 'required|string',
            'tahun_ayah' => 'required|date',
            'pendidikan_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'penghasilan_ayah' => 'required|string',
            'kebutuhan_ayah' => 'nullable|string',
            'nama_ibu' => 'required|string',
            'nik_ibu' => 'required|string',
            'tahun_ibu' => 'required|date',
            'pendidikan_ibu' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
            'penghasilan_ibu' => 'required|string',
            'kebutuhan_ibu' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Dapatkan objek siswa yang sedang login
        $siswa = auth('siswa')->user();

        // Update data orang tua siswa
        $siswa->nama_ayah = $request->input('nama_ayah');
        $siswa->nik_ayah = $request->input('nik_ayah');
        $siswa->tahun_ayah = $request->input('tahun_ayah');
        $siswa->pendidikan_ayah = $request->input('pendidikan_ayah');
        $siswa->pekerjaan_ayah = $request->input('pekerjaan_ayah');
        $siswa->penghasilan_ayah = $request->input('penghasilan_ayah');
        $siswa->kebutuhan_ayah = $request->input('kebutuhan_ayah');
        $siswa->nama_ibu = $request->input('nama_ibu');
        $siswa->nik_ibu = $request->input('nik_ibu');
        $siswa->tahun_ibu = $request->input('tahun_ibu');
        $siswa->pendidikan_ibu = $request->input('pendidikan_ibu');
        $siswa->pekerjaan_ibu = $request->input('pekerjaan_ibu');
        $siswa->penghasilan_ibu = $request->input('penghasilan_ibu');
        $siswa->kebutuhan_ibu = $request->input('kebutuhan_ayah');

        $siswa->save();

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // Redirect ke route 'siswa' dengan pesan sukses
        return redirect()->route('siswa', ['tab' => 'contact'])->with('success', 'Data orang tua berhasil disimpan.');
    }

    public function dataWali(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_wali' => 'required|string',
            'nik_wali' => 'required|string|digits:16',
            'tahun_wali' => 'required|date',
            'pendidikan_wali' => 'required|string',
            'pekerjaan_wali' => 'required|string',
            'penghasilan_wali' => 'required|string',
            'kebutuhan_wali' => 'nullable|string',
        ],[
            'nama_wali.required' => 'Nama Wali harus di isi',
            'nik_wali.required' => 'NIK Wali harus di isi',
            'nik_wali.digits' => 'NIK Wali harus terdiri dari 16 digit',
            'nik_wali.number' => 'NIK Wali hanya berisi angka',
            'tahun_wali.required' => 'Tahun Lahir Wali harus di isi',
            'pendidikan_wali.required' => 'Pendidikan Terakhir Wali harus di isi',
            'pekerjaan_wali.required' => 'Pekerjaan Wali harus di isi',
            'kebutuhan_wali.required' => 'Apakah Wali Memiliki Kebutuhan Khusus harus di isi',


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Dapatkan objek siswa yang sedang login
        $siswa = auth('siswa')->user();

        // Update data wali siswa
        $siswa->nama_wali = $request->input('nama_wali');
        $siswa->nik_wali = $request->input('nik_wali');
        $siswa->tahun_wali = $request->input('tahun_wali');
        $siswa->pendidikan_wali = $request->input('pendidikan_wali');
        $siswa->pekerjaan_wali = $request->input('pekerjaan_wali');
        $siswa->penghasilan_wali = $request->input('penghasilan_wali');
        $siswa->kebutuhan_wali = $request->input('kebutuhan_wali');

        $siswa->save();

        // Redirect ke route 'siswa' dengan pesan sukses
        return redirect()->route('siswa', ['tab' => 'data'])->with('success', 'Data wali berhasil disimpan.');
    }

    public function berkasSiswa(Request $request)
    {
        $siswa = auth('siswa')->user();

        $validatedData = $request->validate([
            'kontak' => 'required|digits:12',
            'skhu' => 'required|mimes:pdf',
            'akta_lahir' => 'required|mimes:pdf',
            'kk' => 'required|mimes:pdf',
            'ktp' => 'required|mimes:pdf',
        ]);

        $siswa->kontak = $request->kontak;

        if ($request->hasFile('skhu')) {
            $skhuFile = $request->file('skhu');
            $skhuFileName = $siswa->name . '-skhu.' . $skhuFile->getClientOriginalExtension();
            $skhuFilePath = $skhuFile->storeAs('berkas/siswa', $skhuFileName, 'public');
            $siswa->skhu = $skhuFileName;
        }

        if ($request->hasFile('akta_lahir')) {
            $aktaLahirFile = $request->file('akta_lahir');
            $aktaLahirFileName = $siswa->name . '-akta-lahir.' . $aktaLahirFile->getClientOriginalExtension();
            $aktaLahirFilePath = $aktaLahirFile->storeAs('berkas/siswa', $aktaLahirFileName, 'public');
            $siswa->akta_lahir = $aktaLahirFileName;
        }

        if ($request->hasFile('kk')) {
            $kkFile = $request->file('kk');
            $kkFileName = $siswa->name . '-kk.' . $kkFile->getClientOriginalExtension();
            $kkFilePath = $kkFile->storeAs('berkas/siswa', $kkFileName, 'public');
            $siswa->kk = $kkFileName;
        }

        if ($request->hasFile('ktp')) {
            $ktpFile = $request->file('ktp');
            $ktpFileName = $siswa->name . '-ktp.' . $ktpFile->getClientOriginalExtension();
            $ktpFilePath = $ktpFile->storeAs('berkas/siswa', $ktpFileName, 'public');
            $siswa->ktp = $ktpFileName;
        }

        $siswa->save();

        return redirect()->route('siswa', ['tab' => 'data'])->with('success', 'Berkas siswa berhasil diunggah.');
    }



    public function daftarSiswa()
    {
        $id_siswa = auth('siswa')->user()->id; // Mendapatkan ID user yang sedang login
        $verifikasi = Verifikasi::where('id_siswa', Auth::guard('siswa')->user()->id)->first(); // Mendapatkan data pendaftaran berdasarkan ID user

        return view('siswa.daftar', compact('verifikasi'));
    }

    public function prosesPendaftaran(Request $request)
    {
        $pendaftar = Auth::guard('siswa')->user();

        // Ambil data dari permintaan
        $validator = Validator::make($request->all(), [
            'jawaban_pertanyaan_1' => 'required',
            'jawaban_pertanyaan_2' => 'required',
            'jawaban_pertanyaan_3' => 'required',
            'jawaban_pertanyaan_4' => 'required',
            'jawaban_pertanyaan_5' => 'required',
        ], [
            'jawaban_pertanyaan_1.required' => 'Jawaban Pertanyaan 1 harus di isi',
            'jawaban_pertanyaan_2.required' => 'Jawaban Pertanyaan 2 harus di isi',
            'jawaban_pertanyaan_3.required' => 'Jawaban Pertanyaan 3 harus di isi',
            'jawaban_pertanyaan_4.required' => 'Jawaban Pertanyaan 4 harus di isi',
            'jawaban_pertanyaan_5.required' => 'Jawaban Pertanyaan 5 harus di isi',

        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $data['tanggal_daftar'] = Carbon::now();

        // Set nilai default untuk field-field yang diinginkan
        $data['nomor_pendaftaran'] = 'SMPN3-2023' . $pendaftar->id;
        $data['id_siswa'] = $pendaftar->id;
        $data['status'] = 'proses';

        //dd($data);
        Verifikasi::create($data);

        return redirect()->route('siswa.daftar')->with('success', 'Berhasil melakukan pendaftaran!');
    }

    public function pengumumanSiswa()
    {
        $id_siswa = auth('siswa')->user()->id; // Mendapatkan ID user yang sedang login
        $verifikasi = Verifikasi::where('id_siswa', Auth::guard('siswa')->user()->id)->first(); // Mendapatkan data pendaftaran berdasarkan ID user

        return view('siswa.pengumuman', compact('verifikasi'));
    }
    public function cetakKelulusan()
    {
    // Ambil data yang diperlukan untuk mencetak kelulusan
    $siswa = auth('siswa')->user();

        // Menyiapkan data untuk dikirim ke view cetak_kelulusan.blade.php
        $data = [
            'nama' => $siswa->name,
            'tanggal_lulus' => Carbon::now()->toDateString(), // Contoh tanggal lulus, sesuaikan dengan data yang sebenarnya
            // Tambahkan data lain yang diperlukan sesuai kebutuhan
        ];

        // Load view yang akan dijadikan PDF
        $pdf = PDF::loadView('siswa.cetak_kelulusan', $data);
        return response($pdf->output(), 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'inline; filename="cetak_kelulusan.pdf"');


        // Optional: Atur ukuran kertas dan orientasi
        $pdf->setPaper('A4', 'portrait');

        // Optional: Atur nama file PDF yang akan dihasilkan
        $fileName = 'Kelulusan-' . $data['nama'] . '.pdf';

        // Download atau tampilkan PDF di browser
        return $pdf->download($fileName);
    }
}
