@extends('layout.app')

@section('title', 'Dashboard Siswa')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h3>Selamat Datang Di Sistem PPDB SMPN 3 Anjir Muara</h3>
                <p class="text-subtitle text-muted">Segera Lengkapi Data untuk dapat melakukan pendaftaran, pastikan data
                    yang diinputkan sesuai dengan dokumen resmi dan terbaru (Akta Kelahiran atau Kartu Keluarga) .</p>
            </div>
            <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>
                                        </ol>
                                    </nav>
                                </div> -->
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Akun</h4>
            </div>
            <form class="form form-vertical" action="{{ route('update.akun') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4 mb-4">
                                @if (Auth::guard('siswa')->user()->foto)
                                    <img id="uploadedAvatar"
                                        src="{{ asset('storage/siswa/profil/' . Auth::guard('siswa')->user()->foto) }}"
                                        alt="Foto Profil" class="d-block rounded" height="250" width="250" />
                                @else
                                    <img id="uploadedAvatar" src="{{ asset('assets/dashboard/assets/images/faces/1.jpg') }}"
                                        alt="Foto Profil" class="d-block rounded" height="250" width="250" />
                                @endif
                            </div>

                            <div class="button-wrapper ml-4">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" name="foto" hidden
                                        accept="image/png, image/jpeg" onchange="previewImage(event)" />
                                </label>
                                <p class="text-muted mb-0">Foto Profil * (Ukuran maksimal 1,5 MB)</p>
                                
                                @error('foto')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Nama Lengkap <small class="text-info"
                                                    > <em> *kosongkan jika tidak ingin merubah nama!
                                                    </em> </small></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    value="{{ Auth::guard('siswa')->user()->name }}" name="name"
                                                    id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Email <small class="text-info" style="color: red;">
                                                    <em> *kosongkan jika tidak ingin merubah email! </em> </small></label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    value="{{ Auth::guard('siswa')->user()->email }}" name="email"
                                                    id="email-id-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">NISN <small class="text-info" style="color: red;"> <em> *kosongkan jika tidak ingin merubah nisn! </em> </small></label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" value="{{ Auth::guard('siswa')->user()->nisn }}" name="nisn" id="mobile-id-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-key"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Password <small class="text-info"> <em> *kosongkan
                                                        jika tidak ingin merubah password! </em> </small></label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="******"
                                                    id="password-id-icon" name="password">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Data Diri Calon Peserta Didik </h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ request()?->query('tab') == 'home' || !request()->has('tab') ? 'active' : '' }}"
                                id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home"
                                aria-selected="true">Data Diri </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ request()?->query('tab') == 'profile' ? 'active' : '' }}"
                                id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Data Orang Tua</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ request()?->query('tab') == 'contact' ? 'active' : '' }}"
                                id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Data Wali</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ request()?->query('tab') == 'data' ? 'active' : '' }}" id="data-tab"
                                data-bs-toggle="tab" href="#data" role="tab" aria-controls="data"
                                aria-selected="false">Dokumen Administratif</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{ request()?->query('tab') == 'home' || !request()->has('tab') ? 'show active' : '' }}"
                            id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-body">
                                <h6 class="mb-2"> Data Diri <small class="text-info"> <em> *Wajib
                                            di isi! </em> </small> </h6>
                                <form class="form form-vertical" id="formSiswa" action="{{ route('data.siswa') }}"
                                    method="post">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama Lengkap
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small></label>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Nama Lengkap Sesuai Akta"
                                                        value="{{ Auth::guard('siswa')->user()->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="password-vertical">Jenis Kelamin
                                                    <small class="text-info"> 
                                                        <em> *Wajib di isi! </em> 
                                                    </small></label>
                                                </label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jk"
                                                        id="radio-laki" value="Laki-Laki"
                                                        {{ Auth::guard('siswa')->user()->jk == 'Laki-Laki' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="radio-laki">
                                                        Laki - Laki
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jk"
                                                        id="radio-perempuan" value="Perempuan"
                                                        {{ Auth::guard('siswa')->user()->jk == 'Perempuan' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="radio-perempuan">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">NISN
                                                    <small class="text-info"> 
                                                        <em> NISN Wajib diisi * (Maksimal 10 angka)</em> 
                                                    </small></label>
                                                    <input type="number" class="form-control" name="nisn"
                                                        placeholder="NISN"
                                                        value="{{ Auth::guard('siswa')->user()->nisn }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">NIK
                                                    <small class="text-info"> 
                                                        <em> NIK Wajib diisi * (Maksimal 16 angka)</em> 
                                                    </small></label>
                                                    <input type="number" class="form-control" name="nik"
                                                        value="{{ Auth::guard('siswa')->user()->nik }}"
                                                        placeholder="Nomer Induk Kependudukan">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">NO KK
                                                        <small class="text-info"> 
                                                            <em> No.KK Wajib diisi * (Maksimal 16 angka)</em> 
                                                        </small></label>
                                                    </label>
                                                    <input type="number" class="form-control" name="no_kk"
                                                        value="{{ Auth::guard('siswa')->user()->no_kk }}"
                                                        placeholder="Nomer Kartu Keluarga">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Tempat Lahir
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="text" class="form-control" name="tempat_lahir"
                                                        value="{{ Auth::guard('siswa')->user()->tempat_lahir }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Tanggal Lahir
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="date" class="form-control" name="tgl_lahir"
                                                        value="{{ Auth::guard('siswa')->user()->tgl_lahir }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Nomor Registrasi Akta Lahir
                                                        <small class="text-info"> 
                                                            <em> No.KK Wajib diisi * (Maksimal 16 angka)</em> 
                                                        </small>
                                                    </label>
                                                    <input type="number" class="form-control" name="no_akta_lahir"
                                                        value="{{ Auth::guard('siswa')->user()->no_akta_lahir }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Agama & Kepercayaan
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>

                                                    <select class="form-select" id="basicSelect" name="agama" required>
                                                        @if (!empty(Auth::guard('siswa')->user()->agama))
                                                            <option>{{ Auth::guard('siswa')->user()->agama }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Agama</option>
                                                        @endif
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen/Protestan">Kristen/Protestan</option>
                                                        <option value="Katolik">Katolik</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Khonghucu">Khonghucu</option>
                                                        <option value="Kepercayaan">Kepercayaan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Kewarganegaraan
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>

                                                    <select class="form-select" id="basicSelect" name="kewarganegaraan"
                                                        required>
                                                        @if (!empty(Auth::guard('siswa')->user()->kewarganegaraan))
                                                            <option>{{ Auth::guard('siswa')->user()->kewarganegaraan }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Warga Negara</option>
                                                        @endif
                                                        <option value="WNI">WNI</option>
                                                        <option value="WNA">WNA</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Berkebutuhan Khusus
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>

                                                    <select class="form-select" id="basicSelect" name="kebutuhan_khusus">
                                                        @if (!empty(Auth::guard('siswa')->user()->kebutuhan_khusus))
                                                            <option>{{ Auth::guard('siswa')->user()->kebutuhan_khusus }}
                                                            </option>
                                                        @else
                                                            <option>Apakah Memiliki Kebutuhan Khusus</option>
                                                        @endif
                                                        <option value="Tidak">Tidak</option>
                                                        <option value="Netra">Netra</option>
                                                        <option value="Rungu">Rungu</option>
                                                        <option value="Wicara">Wicara</option>
                                                        <option value="Hiper Aktif">Hiper Aktif</option>
                                                        <option value="Down Sindrome">Down Sindrome</option>
                                                        <option value="Autis">Autis</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Kelurahan/Desa
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="text" class="form-control" name="kelurahan"
                                                        value="{{ Auth::guard('siswa')->user()->kelurahan }}"
                                                        placeholder="Nama Kelurahan atau Desa sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Kecamatan
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="text" class="form-control" name="kecamatan"
                                                        value="{{ Auth::guard('siswa')->user()->kecamatan }}"
                                                        placeholder="Nama Kecamatan sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Kode Pos
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="number" class="form-control" name="kode_pos"
                                                        value="{{ Auth::guard('siswa')->user()->kode_pos }}"
                                                        placeholder="Kode Pos sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Alamat Lengkap
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ Auth::guard('siswa')->user()->alamat }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Tempat Tinggal
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>

                                                    <select class="form-select" id="basicSelect" name="tempat_tinggal">
                                                        @if (!empty(Auth::guard('siswa')->user()->tempat_tinggal))
                                                            <option>{{ Auth::guard('siswa')->user()->tempat_tinggal }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Status Tempat Tinggal</option>
                                                        @endif
                                                        <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                                                        <option value="Wali">Wali</option>
                                                        <option value="Panti Asuhan">Panti Asuhan</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Modal Transportasi
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>

                                                    <select class="form-select" id="basicSelect" name="transportasi"
                                                        required>
                                                        @if (!empty(Auth::guard('siswa')->user()->transportasi))
                                                            <option>{{ Auth::guard('siswa')->user()->transportasi }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Modal Transportasi</option>
                                                        @endif
                                                        <option value="Jalan Kaki">Jalan Kaki</option>
                                                        <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                                                        <option value="Kendaraan Umum">Kendaraan Umum</option>
                                                        <option value="Sepeda">Sepeda</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Anak Keberapa
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="number" class="form-control" name="anak_ke"
                                                        value="{{ Auth::guard('siswa')->user()->anak_ke }}"
                                                        placeholder="Urutan Anak Keberapa Dalam Saudara Sekandung">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h6 class="mb-2">Apakah Punya KIP
                                                    <small class="text-info"> 
                                                        <em> *Wajib di isi! </em> 
                                                    </small>
                                                </h6>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kip"
                                                        id="radio-ya" value="ya"
                                                        {{ Auth::guard('siswa')->user()->kip == 'ya' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="radio-ya">Ya</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="kip"
                                                        id="radio-tidak" value="tidak"
                                                        {{ Auth::guard('siswa')->user()->kip == 'tidak' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="radio-tidak">Tidak</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="password-vertical">Apakah akan tetap menerima KIP
                                                    <small class="text-info"> 
                                                        <em> *Wajib di isi! </em> 
                                                    </small>
                                                </label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="menerima_kip"
                                                        id="radio-kip-ya" value="ya"
                                                        {{ Auth::guard('siswa')->user()->menerima_kip == 'ya' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="radio-ya">
                                                        Ya
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="menerima_kip"
                                                        id="radio-kip-tidak" value="tidak"
                                                        {{ Auth::guard('siswa')->user()->menerima_kip == 'tidak' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="radio-tidak">
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Alasan Menolak KIP 
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>

                                                    <select class="form-select" id="basicSelect" name="tolak_kip">
                                                        @if (!empty(Auth::guard('siswa')->user()->tolak_kip))
                                                            <option>{{ Auth::guard('siswa')->user()->tolak_kip }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Alasan Jika Menolak KIP</option>
                                                        @endif
                                                        <option value="Dilarang Pemda karena menerima bantuan serupa">
                                                            Dilarang Pemda karena menerima bantuan serupa</option>
                                                        <option value="Menolak">Menolak</option>
                                                        <option value="Sudah Mampu">Sudah Mampu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Tinggi Badan
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="number" class="form-control" name="tb"
                                                        value="{{ Auth::guard('siswa')->user()->tb }}"
                                                        placeholder="Tinggi Badan Terbaru">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Berat Badan
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="number" class="form-control" name="bb"
                                                        value="{{ Auth::guard('siswa')->user()->bb }}"
                                                        placeholder="Berat Badan Terbaru">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Jumlah Saudara Kandung
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="number" class="form-control" name="saudara"
                                                        value="{{ Auth::guard('siswa')->user()->saudara }}"
                                                        placeholder="Jumlah Saudara Kandung">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1"
                                            id="simpanBtn">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ request()?->query('tab') == 'profile' ? 'show active' : '' }}"
                            id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card-body">
                                <h6 class="mb-2"> Data Ayah Kandung
                                    <small class="text-info"> 
                                        <em> *Kosongkan data ini apabila Orang Tua telah tiada </em> 
                                    </small> </h6>
                                <form class="form form-vertical" action="{{ route('data.orangtua') }}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama Lengkap Ayah Kandung</label>
                                                    <input type="text" class="form-control" name="nama_ayah"
                                                        value="{{ Auth::guard('siswa')->user()->nama_ayah }}"
                                                        placeholder="Nama Lengkap Ayah Kandung Sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">NIK Ayah Kandung
                                                        <small class="text-info"> 
                                                            <em> *Maksimal 16 angka</em> 
                                                        </small>
                                                    </label>
                                                    <input type="text" class="form-control" name="nik_ayah"
                                                        value="{{ Auth::guard('siswa')->user()->nik_ayah }}"
                                                        placeholder="NIK Ayah Kandung Sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Tahun Lahir Ayah Kandung</label>
                                                    <input type="date" class="form-control" name="tahun_ayah"
                                                        value="{{ Auth::guard('siswa')->user()->tahun_ayah }}"
                                                        placeholder="Tahun Lahir Ayah Kandung Sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Pendidikan Ayah</label>

                                                    <select class="form-select" id="basicSelect" name="pendidikan_ayah">
                                                        @if (!empty(Auth::guard('siswa')->user()->pendidikan_ayah))
                                                            <option>{{ Auth::guard('siswa')->user()->pendidikan_ayah }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Pendidikan Terakhir Ayah</option>
                                                        @endif
                                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                        <option value="Putus SD">Putus SD</option>
                                                        <option value="SD Sederajat">SD Sederajat</option>
                                                        <option value="SD Sederajat">SD Sederajat</option>
                                                        <option value="SMP Sederajat">SMP Sederajat</option>
                                                        <option value="SMA Sederajat">SMA Sederajat</option>
                                                        <option value="D1"> D1 </option>
                                                        <option value="D2"> D2 </option>
                                                        <option value="D3"> D3 </option>
                                                        <option value="D4/S1"> D4/S1 </option>
                                                        <option value="S2"> S2 </option>
                                                        <option value="S3"> S3 </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Pekerjaan Ayah</label>

                                                    <select class="form-select" id="basicSelect" name="pekerjaan_ayah">
                                                        @if (!empty(Auth::guard('siswa')->user()->pekerjaan_ayah))
                                                            <option>{{ Auth::guard('siswa')->user()->pekerjaan_ayah }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Pekerjaan Ayah</option>
                                                        @endif
                                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Petani">Petani </option>
                                                        <option value="Peternak">Peternak </option>
                                                        <option value="PNS/TNI/POLRI">PNS/TNI/POLRI </option>
                                                        <option value="Karyawan Swasta">Karyawan Swasta </option>
                                                        <option value="Pedagang">Pedagang </option>
                                                        <option value="Wiraswasta">Wiraswasta </option>
                                                        <option value="Wirausaha">Wirausaha </option>
                                                        <option value="Buruh">Buruh </option>
                                                        <option value="Pensiunan">Pensiunan </option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Penghasilan Bulanan Ayah</label>

                                                    <select class="form-select" id="basicSelect" name="penghasilan_ayah">
                                                        @if (!empty(Auth::guard('siswa')->user()->penghasilan_ayah))
                                                            <option>{{ Auth::guard('siswa')->user()->penghasilan_ayah }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Penghasilan Bulanan Ayah</option>
                                                        @endif
                                                        <option value="< Rp.500.000">
                                                            < Rp.500.000 </option>
                                                        <option value="Rp.500.000-Rp.999.999"> Rp.500.000-Rp.999.999
                                                        </option>
                                                        <option value="Rp. 1.000.000-Rp.1.999.999"> Rp.
                                                            1.000.000-Rp.1.999.999</option>
                                                        <option value="Rp. 2.000.000-Rp.4.000.000"> Rp.
                                                            2.000.000-Rp.4.000.000</option>
                                                        <option value="Rp. 5.000.000-Rp.20.000.000"> Rp.
                                                            5.000.000-Rp.20.000.000</option>
                                                        <option value="> Rp. 20.000.000"> > Rp. 20.000.000</option>
                                                        <option value="Tidak Berpenghasilan"> Tidak Berpenghasilan</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Berkebutuhan Khusus </label>

                                                    <select class="form-select" id="basicSelect" name="kebutuhan_ayah">
                                                        @if (!empty(Auth::guard('siswa')->user()->kebutuhan_ayah))
                                                            <option>{{ Auth::guard('siswa')->user()->kebutuhan_ayah }}
                                                            </option>
                                                        @else
                                                            <option>Apakah Ayah Memiliki Kebutuhan Khusus</option>
                                                        @endif
                                                        <option value="Tidak">Tidak</option>
                                                        <option value="Netra">Netra</option>
                                                        <option value="Rungu">Rungu</option>
                                                        <option value="Wicara">Wicara</option>
                                                        <option value="Hiper Aktif">Hiper Aktif</option>
                                                        <option value="Down Sindrome">Down Sindrome</option>
                                                        <option value="Autis">Autis</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                    <h6 class="my-2"> Data Ibu Kandung </h6>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama Lengkap Ibu Kandung</label>
                                                    <input type="text" class="form-control" name="nama_ibu"
                                                        value="{{ Auth::guard('siswa')->user()->nama_ibu }}"
                                                        placeholder="Nama Lengkap Ibu Kandung Sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">NIK Ibu Kandung
                                                        <small class="text-info"> 
                                                            <em> *Maksimal 16 angka</em> 
                                                        </small>
                                                    </label>
                                                    <input type="text" class="form-control" name="nik_ibu"
                                                        value="{{ Auth::guard('siswa')->user()->nik_ibu }}"
                                                        placeholder="NIK Ibu Kandung Sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Tahun Lahir Ibu Kandung</label>
                                                    <input type="date" class="form-control" name="tahun_ibu"
                                                        value="{{ Auth::guard('siswa')->user()->tahun_ibu }}"
                                                        placeholder="Nama Lengkap Sesuai Akta">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Pendidikan Ibu</label>

                                                    <select class="form-select" id="basicSelect" name="pendidikan_ibu">
                                                        @if (!empty(Auth::guard('siswa')->user()->pendidikan_ibu))
                                                            <option>{{ Auth::guard('siswa')->user()->pendidikan_ibu }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Pendidikan Terakhir Ibu</option>
                                                        @endif
                                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                        <option value="Putus SD">Putus SD</option>
                                                        <option value="SD Sederajat">SD Sederajat</option>
                                                        <option value="SD Sederajat">SD Sederajat</option>
                                                        <option value="SMP Sederajat">SMP Sederajat</option>
                                                        <option value="SMA Sederajat">SMA Sederajat</option>
                                                        <option value="D1"> D1 </option>
                                                        <option value="D2"> D2 </option>
                                                        <option value="D3"> D3 </option>
                                                        <option value="D4/S1"> D4/S1 </option>
                                                        <option value="S2"> S2 </option>
                                                        <option value="S3"> S3 </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Pekerjaan Ibu</label>
                                                    <select class="form-select" id="basicSelect" name="pekerjaan_ibu">
                                                        @if (!empty(Auth::guard('siswa')->user()->pekerjaan_ibu))
                                                            <option>{{ Auth::guard('siswa')->user()->pekerjaan_ibu }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Pekerjaan Ibu</option>
                                                        @endif
                                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Petani">Petani </option>
                                                        <option value="Peternak">Peternak </option>
                                                        <option value="PNS/TNI/POLRI">PNS/TNI/POLRI </option>
                                                        <option value="Karyawan Swasta">Karyawan Swasta </option>
                                                        <option value="Pedagang">Pedagang </option>
                                                        <option value="Wiraswasta">Wiraswasta </option>
                                                        <option value="Wirausaha">Wirausaha </option>
                                                        <option value="Buruh">Buruh </option>
                                                        <option value="Pensiunan">Pensiunan </option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Penghasilan Bulanan</label>

                                                    <select class="form-select" id="basicSelect" name="penghasilan_ibu">
                                                        @if (!empty(Auth::guard('siswa')->user()->penghasilan_ibu))
                                                            <option>{{ Auth::guard('siswa')->user()->penghasilan_ibu }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Penghasilan Ibu</option>
                                                        @endif
                                                        <option value="< Rp.500.000">
                                                            < Rp.500.000 </option>
                                                        <option value="Rp.500.000-Rp.999.999"> Rp.500.000-Rp.999.999
                                                        </option>
                                                        <option value="Rp. 1.000.000-Rp.1.999.999"> Rp.
                                                            1.000.000-Rp.1.999.999</option>
                                                        <option value="Rp. 2.000.000-Rp.4.000.000"> Rp.
                                                            2.000.000-Rp.4.000.000</option>
                                                        <option value="Rp. 5.000.000-Rp.20.000.000"> Rp.
                                                            5.000.000-Rp.20.000.000</option>
                                                        <option value="> Rp. 20.000.000"> > Rp. 20.000.000</option>
                                                        <option value="Tidak Berpenghasilan"> Tidak Berpenghasilan</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Berkebutuhan Khusus</label>

                                                    <select class="form-select" id="basicSelect" name="kebutuhan_ibu">
                                                        @if (!empty(Auth::guard('siswa')->user()->kebutuhan_ibu))
                                                            <option>{{ Auth::guard('siswa')->user()->kebutuhan_ibu }}
                                                            </option>
                                                        @else
                                                            <option>Apakah Ibu Memiliki Kebutuhan Khusus</option>
                                                        @endif
                                                        <option value="Tidak">Tidak</option>
                                                        <option value="Netra">Netra</option>
                                                        <option value="Rungu">Rungu</option>
                                                        <option value="Wicara">Wicara</option>
                                                        <option value="Hiper Aktif">Hiper Aktif</option>
                                                        <option value="Down Sindrome">Down Sindrome</option>
                                                        <option value="Autis">Autis</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ request()?->query('tab') == 'contact' ? 'show active' : '' }}"
                            id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="card-body">
                                <h6 class="mb-2"> Data Wali <small class="text-info" style="color: red;"> <em> *Wajib
                                            di isi! </em> </small> </h6>
                                <form class="form form-vertical" action="{{ route('data.wali') }}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nama Lengkap Wali
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="text" class="form-control" name="nama_wali"
                                                        value="{{ Auth::guard('siswa')->user()->nama_wali }}"
                                                        placeholder="Nama Lengkap Wali Sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">NIK Wali
                                                        <small class="text-info"> 
                                                            <em> NIK Wajib diisi * (Maksimal 16 angka)</em> 
                                                        </small>
                                                    </label>
                                                    <input type="text" class="form-control" name="nik_wali"
                                                        value="{{ Auth::guard('siswa')->user()->nik_wali }}"
                                                        placeholder="NIK Wali Sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Tahun Lahir Wali
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>
                                                    <input type="date" class="form-control" name="tahun_wali"
                                                        value="{{ Auth::guard('siswa')->user()->tahun_wali }}"
                                                        placeholder="Tahun Lahir Wali Sesuai KK">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Pendidikan Wali
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>

                                                    <select class="form-select" id="basicSelect" name="pendidikan_wali">
                                                        @if (!empty(Auth::guard('siswa')->user()->pendidikan_wali))
                                                            <option>{{ Auth::guard('siswa')->user()->pendidikan_wali }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Pendidikan Terakhir Wali</option>
                                                        @endif
                                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                        <option value="Putus SD">Putus SD</option>
                                                        <option value="SD Sederajat">SD Sederajat</option>
                                                        <option value="SD Sederajat">SD Sederajat</option>
                                                        <option value="SMP Sederajat">SMP Sederajat</option>
                                                        <option value="SMA Sederajat">SMA Sederajat</option>
                                                        <option value="D1"> D1 </option>
                                                        <option value="D2"> D2 </option>
                                                        <option value="D3"> D3 </option>
                                                        <option value="D4/S1"> D4/S1 </option>
                                                        <option value="S2"> S2 </option>
                                                        <option value="S3"> S3 </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Pekerjaan Wali
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>

                                                    <select class="form-select" id="basicSelect" name="pekerjaan_wali">
                                                        @if (!empty(Auth::guard('siswa')->user()->pekerjaan_wali))
                                                            <option>{{ Auth::guard('siswa')->user()->pekerjaan_wali }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Pekerjaan Wali</option>
                                                        @endif
                                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Petani">Petani </option>
                                                        <option value="Peternak">Peternak </option>
                                                        <option value="PNS/TNI/POLRI">PNS/TNI/POLRI </option>
                                                        <option value="Karyawan Swasta">Karyawan Swasta </option>
                                                        <option value="Pedagang">Pedagang </option>
                                                        <option value="Wiraswasta">Wiraswasta </option>
                                                        <option value="Wirausaha">Wirausaha </option>
                                                        <option value="Buruh">Buruh </option>
                                                        <option value="Pensiunan">Pensiunan </option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Penghasilan Bulanan Wali
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>

                                                    <select class="form-select" id="basicSelect" name="penghasilan_wali">
                                                        @if (!empty(Auth::guard('siswa')->user()->penghasilan_wali))
                                                            <option>{{ Auth::guard('siswa')->user()->penghasilan_wali }}
                                                            </option>
                                                        @else
                                                            <option>Pilih Penghasilan Wali</option>
                                                        @endif
                                                        <option value="< Rp.500.000">
                                                            < Rp.500.000 </option>
                                                        <option value="Rp.500.000-Rp.999.999"> Rp.500.000-Rp.999.999
                                                        </option>
                                                        <option value="Rp. 1.000.000-Rp.1.999.999"> Rp.
                                                            1.000.000-Rp.1.999.999</option>
                                                        <option value="Rp. 2.000.000-Rp.4.000.000"> Rp.
                                                            2.000.000-Rp.4.000.000</option>
                                                        <option value="Rp. 5.000.000-Rp.20.000.000"> Rp.
                                                            5.000.000-Rp.20.000.000</option>
                                                        <option value="> Rp. 20.000.000"> > Rp. 20.000.000</option>
                                                        <option value="Tidak Berpenghasilan"> Tidak Berpenghasilan</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Berkebutuhan Khusus
                                                        <small class="text-info"> 
                                                            <em> *Wajib di isi! </em> 
                                                        </small>
                                                    </label>

                                                    <select class="form-select" id="basicSelect" name="kebutuhan_wali">
                                                        @if (!empty(Auth::guard('siswa')->user()->kebutuhan_wali))
                                                            <option>{{ Auth::guard('siswa')->user()->kebutuhan_wali }}
                                                            </option>
                                                        @else
                                                            <option>Apakah Wali Memiliki Kebutuhan Khusus</option>
                                                        @endif
                                                        <option value="Tidak">Tidak</option>
                                                        <option value="Netra">Netra</option>
                                                        <option value="Rungu">Rungu</option>
                                                        <option value="Wicara">Wicara</option>
                                                        <option value="Hiper Aktif">Hiper Aktif</option>
                                                        <option value="Down Sindrome">Down Sindrome</option>
                                                        <option value="Autis">Autis</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ request()?->query('tab') == 'data' ? 'show active' : '' }}"
                            id="data" role="tabpanel" aria-labelledby="data-tab">
                            <div class="card-body">
                                <h6 class="mb-2"> Dokumen Administratif <small class="text-info" style="color: red;">
                                        <em> *Wajib di isi! </em> </small> </h6>
                                <form class="form form-vertical" action="{{ route('berkas.siswa') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="kontak">Kontak (Nomor HP Orang Tua/Wali)</label>
                                                    <input type="text" class="form-control" name="kontak"
                                                        id="kontak" placeholder="Nomor Yang Dapat Dihubungi"
                                                        value="{{ Auth::guard('siswa')->user()->kontak }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="skhu">SKHU / Surat Keterangan Lulus <small
                                                            class="text-info"> <em> *hanya menerima file PDF! </em>
                                                        </small></label>
                                                    @if (!empty(Auth::guard('siswa')->user()->skhu))
                                                        <div class="mb-2">
                                                            <a
                                                                href="{{ Storage::url(Auth::guard('siswa')->user()->skhu) }}">{{ Auth::guard('siswa')->user()->name }}-skhu.pdf</a>
                                                        </div>
                                                    @endif
                                                    <input type="file" class="form-control" name="skhu"
                                                        id="skhu" accept=".pdf"
                                                        placeholder="SKHU / Surat Keterangan Lulus">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="akta_lahir">Akta Kelahiran <small class="text-info"><em>
                                                                *hanya menerima file PDF! </em> </small></label>
                                                    @if (!empty(Auth::guard('siswa')->user()->akta_lahir))
                                                        <div class="mb-2">
                                                            <a
                                                                href="{{ Storage::url(Auth::guard('siswa')->user()->akta_lahir) }}">{{ Auth::guard('siswa')->user()->name }}-akta_lahir.pdf</a>
                                                        </div>
                                                    @endif
                                                    <input type="file" class="form-control" name="akta_lahir"
                                                        id="akta_lahir" accept=".pdf" placeholder="Akta Kelahiran">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="kk">Kartu Keluarga <small class="text-info"><em>
                                                                *hanya menerima file PDF! </em> </small></label>
                                                    @if (!empty(Auth::guard('siswa')->user()->kk))
                                                        <div class="mb-2">
                                                            <a
                                                                href="{{ Storage::url(Auth::guard('siswa')->user()->kk) }}">{{ Auth::guard('siswa')->user()->name }}-kk.pdf</a>
                                                        </div>
                                                    @endif
                                                    <input type="file" class="form-control" name="kk"
                                                        id="kk" accept=".pdf" placeholder="Kartu Keluarga">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="ktp">KTP Orang Tua/Wali <small class="text-info"><em>
                                                                *hanya menerima file PDF! </em> </small></label>
                                                    @if (!empty(Auth::guard('siswa')->user()->ktp))
                                                        <div class="mb-2">
                                                            <a
                                                                href="{{ Storage::url(Auth::guard('siswa')->user()->ktp) }}">{{ Auth::guard('siswa')->user()->name }}-ktp.pdf</a>
                                                        </div>
                                                    @endif
                                                    <input type="file" class="form-control" name="ktp"
                                                        id="ktp" accept=".pdf" placeholder="KTP Orang Tua/Wali">
                                                </div>
                                            </div>


                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mendapatkan referensi elemen-elemen input form
            var formInputs = document.querySelectorAll(
                '#formSiswa input, #formSiswa select, #formSiswa textarea, #formSiswa radio');
            var simpanBtn = document.getElementById('simpanBtn');

            // Set status disabled pada elemen-elemen input form
            function setFormDisabled(disabled) {
                formInputs.forEach(function(input) {
                    if (input.tagName === 'INPUT') {
                        input.disabled = disabled;
                    } else if (input.tagName === 'SELECT') {
                        input.disabled = disabled;
                    } else if (input.tagName === 'TEXTAREA') {
                        input.disabled = disabled;
                    } else if (input.tagName === 'RADIO') {
                        input.disabled = disabled;
                    }
                });
                simpanBtn.disabled = disabled;
            }

            // Panggil fungsi untuk mengatur form menjadi disabled saat halaman dimuat
            setFormDisabled(true);

            // Tambahkan event listener pada tombol "Edit Data"
            var editBtn = document.getElementById('editBtn');
            editBtn.addEventListener('click', function() {
                setFormDisabled(false); // Mengaktifkan input form
            });
        });
    </script> -->


@endsection
