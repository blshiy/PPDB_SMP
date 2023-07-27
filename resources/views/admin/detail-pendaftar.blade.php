@extends('template.app')

@section('title', 'Detail Pendaftar')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-12 order-md-1 order-last">
            <h3>Detail Pendaftar</h3>
            {{-- <p class="text-subtitle text-muted">Isi Informasi Lainnya disini</p> --}}
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Akun</h4>
        </div>
        <form class="form form-vertical" action="{{ route('update.password', ['id' => $verifikasi->siswa->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4 mb-4">
                            @if ($verifikasi->siswa->foto)
                            <img id="uploadedAvatar" src="{{ asset('storage/siswa/profil/' . $verifikasi->siswa->foto) }}" alt="Foto Profil" class="d-block rounded" height="250" width="250" />

                            @else
                            <img id="uploadedAvatar" src="{{ asset('assets/dashboard/assets/images/faces/1.jpg') }}" alt="Foto Profil" class="d-block rounded" height="250" width="250" />

                            @endif
                        </div>

                        <div class="button-wrapper ml-4">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload foto</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" name="foto" hidden accept="image/png, image/jpeg" onchange="previewImage(event)" />
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
                                        <label for="first-name-icon">Nama Lengkap</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" value="{{ $verifikasi->siswa->name }}" name="name" id="first-name-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">

                                    <div class="form-group has-icon-left">
                                        <label for="email-id-icon">Email</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" value="{{ $verifikasi->siswa->email }}" name="email" id="email-id-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="mobile-id-icon">NISN</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" value="{{ $verifikasi->siswa->nisn }}" name="nisn" id="mobile-id-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-key"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="password-id-icon">Password <small class="text-info"> <em> *kosongkan jika ingin merubah password! </em> </small></label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder="******" id="password-id-icon" name="password">
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update Passowrd Pendaftar</button>
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
                <h5 class="card-title">Data Diri Calon Peserta Didik</h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Diri</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Data Orang Tua</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Data Wali</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="data-tab" data-bs-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="false">Dokumen Administratif</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body">
                            <form class="form form-vertical" id="detail">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="name" placeholder="Nama Lengkap Sesuai Akta" value="{{ $verifikasi->siswa->name }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password-vertical">Jenis Kelamin</label>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" id="radio-laki" value="Laki-Laki" {{ $verifikasi->siswa->jk == 'Laki-Laki' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="radio-laki">
                                                    Laki - Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" id="radio-perempuan" value="Perempuan" {{ $verifikasi->siswa->jk == 'Perempuan' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="radio-perempuan">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="email-id-vertical">NISN</label>
                                                <input type="number" class="form-control" name="nisn" placeholder="NISN" value="{{ $verifikasi->siswa->nisn }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">NIK</label>
                                                <input type="number" class="form-control" name="nik" value="{{ $verifikasi->siswa->nik }}" placeholder="Nomer Induk Kependudukan">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">NO KK</label>
                                                <input type="number" class="form-control" name="no_kk" value="{{ $verifikasi->siswa->no_kk }}" placeholder="Nomer Kartu Keluarga">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" value="{{ $verifikasi->siswa->tempat_lahir }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tgl_lahir" value="{{ $verifikasi->siswa->tgl_lahir }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Nomor Registrasi Akta Lahir</label>
                                                <input type="number" class="form-control" name="no_akta_lahir" value="{{ $verifikasi->siswa->no_akta_lahir }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Agama & Kepercayaan</label>

                                                <select class="form-select" id="basicSelect" name="agama" required>
                                                    @if(!empty($verifikasi->siswa->agama))
                                                    <option>{{ $verifikasi->siswa->agama }}
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
                                                <label for="contact-info-vertical">Kewarganegaraan</label>

                                                <select class="form-select" id="basicSelect" name="kewarganegaraan" required>
                                                    @if(!empty($verifikasi->siswa->kewarganegaraan))
                                                    <option>{{ $verifikasi->siswa->kewarganegaraan }}
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
                                                <label for="contact-info-vertical">Berkebutuhan Khusus</label>

                                                <select class="form-select" id="basicSelect" name="kebutuhan_khusus">
                                                    @if(!empty($verifikasi->siswa->tempat_tinggal))
                                                    <option>{{ $verifikasi->siswa->tempat_tinggal }}
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
                                                <label for="first-name-vertical">Kelurahan/Desa</label>
                                                <input type="text" class="form-control" name="kelurahan" value="{{ $verifikasi->siswa->kelurahan }}" placeholder="Nama Kelurahan atau Desa sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Kecamatan</label>
                                                <input type="text" class="form-control" name="kecamatan" value="{{ $verifikasi->siswa->kecamatan }}" placeholder="Nama Kecamatan sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Kode Pos</label>
                                                <input type="number" class="form-control" name="kode_pos" value="{{ $verifikasi->siswa->kode_pos }}" placeholder="Kode Pos sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Alamat Lengkap</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ $verifikasi->siswa->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Tempat Tinggal</label>

                                                <select class="form-select" id="basicSelect" name="tempat_tinggal">
                                                    @if(!empty($verifikasi->siswa->tempat_tinggal))
                                                    <option>{{ $verifikasi->siswa->tempat_tinggal }}
                                                    </option>
                                                    @else
                                                    <option>Pilih Status Tempat Tinggal</option>
                                                    @endif
                                                    <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                                                    <option value="Wali">Wali</option>
                                                    <option value="Kos">Kos</option>
                                                    <option value="Asrama">Asrama</option>
                                                    <option value="Panti Asuhan">Panti Asuhan</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Modal Transportasi</label>

                                                <select class="form-select" id="basicSelect" name="transportasi" required>
                                                    @if(!empty($verifikasi->siswa->transportasi))
                                                    <option>{{ $verifikasi->siswa->transportasi }}
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
                                                <label for="first-name-vertical">Anak Keberapa</label>
                                                <input type="number" class="form-control" name="anak_ke" value="{{ $verifikasi->siswa->anak_ke }}" placeholder="Urutan Anak Keberapa Dalam Saudara Sekandung">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6 class="mb-2">Apakah Punya KIP</h6>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kip" id="radio-ya" value="ya" {{ $verifikasi->siswa->kip == 'ya' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="radio-ya">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kip" id="radio-tidak" value="tidak" {{ $verifikasi->siswa->kip == 'tidak' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="radio-tidak">Tidak</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password-vertical">Apakah akan tetap menerima KIP</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="menerima_kip" id="radio-kip-ya" value="ya" {{ $verifikasi->siswa->menerima_kip == 'ya' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="radio-ya">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="terima_kip" id="radio-kip-tidak" value="tidak" {{ $verifikasi->siswa->menerima_kip == 'tidak' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="radio-tidak">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Alasan Menolak KIP <small class="text-info"> <em> *kosongkan jika tidak ada! </em> </small> </label>

                                                <select class="form-select" id="basicSelect" name="tolak_kip">
                                                    @if(!empty($verifikasi->siswa->tolak_kip))
                                                    <option>{{ $verifikasi->siswa->tolak_kip }}
                                                    </option>
                                                    @else
                                                    <option>Pilih Alasan Jika Menolak KIP</option>
                                                    @endif
                                                    <option value="Dilarang Pemda karena menerima bantuan serupa">Dilarang Pemda karena menerima bantuan serupa</option>
                                                    <option value="Menolak">Menolak</option>
                                                    <option value="Sudah Mampu">Sudah Mampu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Tinggi Badan</label>
                                                <input type="number" class="form-control" name="tb" value="{{ $verifikasi->siswa->tb }}" placeholder="Tinggi Badan Terbaru">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Berat Badan</label>
                                                <input type="number" class="form-control" name="bb" value="{{ $verifikasi->siswa->bb }}" placeholder="Berat Badan Terbaru">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Jumlah Saudara Kandung</label>
                                                <input type="number" class="form-control" name="saudara" value="{{ $verifikasi->siswa->saudara }}" placeholder="Jumlah Saudara Kandung">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card-body">
                            <h6 class="mb-2"> Data Ayah Kandung </h6>
                            <form class="form form-vertical" id="detail" >
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama Lengkap Ayah Kandung</label>
                                                <input type="text" class="form-control" name="nama_ayah" value="{{ $verifikasi->siswa->nama_ayah }}" placeholder="Nama Lengkap Ayah Kandung Sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">NIK Ayah Kandung</label>
                                                <input type="text" class="form-control" name="nik_ayah" value="{{ $verifikasi->siswa->nik_ayah }}" placeholder="NIK Ayah Kandung Sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Tahun Lahir Ayah Kandung</label>
                                                <input type="date" class="form-control" name="tahun_ayah" value="{{ $verifikasi->siswa->tahun_ayah }}" placeholder="Tahun Lahir Ayah Kandung Sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Pendidikan Ayah</label>

                                                <select class="form-select" id="basicSelect" name="pendidikan_ayah">
                                                    @if(!empty($verifikasi->siswa->pendidikan_ayah))
                                                    <option>{{ $verifikasi->siswa->pendidikan_ayah }}
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
                                                    @if(!empty($verifikasi->siswa->pekerjaan_ayah))
                                                    <option>{{ $verifikasi->siswa->pekerjaan_ayah }}
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
                                                    @if(!empty($verifikasi->siswa->penghasilan_ayah))
                                                    <option>{{ $verifikasi->siswa->penghasilan_ayah }}
                                                    </option>
                                                    @else
                                                    <option>Pilih Penghasilan Bulanan Ayah</option>
                                                    @endif
                                                    <option value="< Rp.500.000">
                                                        < Rp.500.000 </option>
                                                    <option value="Rp.500.000-Rp.999.999"> Rp.500.000-Rp.999.999</option>
                                                    <option value="Rp. 1.000.000-Rp.1.999.999"> Rp. 1.000.000-Rp.1.999.999</option>
                                                    <option value="Rp. 2.000.000-Rp.4.000.000"> Rp. 2.000.000-Rp.4.000.000</option>
                                                    <option value="Rp. 5.000.000-Rp.20.000.000"> Rp. 5.000.000-Rp.20.000.000</option>
                                                    <option value="> Rp. 20.000.000"> > Rp. 20.000.000</option>
                                                    <option value="Tidak Berpenghasilan"> Tidak Berpenghasilan</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Berkebutuhan Khusus <small class="text-info"> <em> *kosongkan jika tidak ada! </em> </small></label>

                                                <select class="form-select" id="basicSelect" name="kebutuhan_ayah">
                                                    @if(!empty($verifikasi->siswa->kebutuhan_ayah))
                                                    <option>{{ $verifikasi->siswa->kebutuhan_ayah }}
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
                                                <input type="text" class="form-control" name="nama_ibu" value="{{ $verifikasi->siswa->nama_ibu }}" placeholder="Nama Lengkap Ibu Kandung Sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">NIK Ibu Kandung</label>
                                                <input type="text" class="form-control" name="nik_ibu" value="{{ $verifikasi->siswa->nik_ibu }}" placeholder="NIK Ibu Kandung Sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Tahun Lahir Ibu Kandung</label>
                                                <input type="date" class="form-control" name="tahun_ibu" value="{{ $verifikasi->siswa->tahun_ibu }}" placeholder="Nama Lengkap Sesuai Akta">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Pendidikan Ibu</label>

                                                <select class="form-select" id="basicSelect" name="pendidikan_ibu">
                                                    @if(!empty($verifikasi->siswa->pendidikan_ibu))
                                                    <option>{{ $verifikasi->siswa->pendidikan_ibu }}
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
                                                    @if(!empty($verifikasi->siswa->pekerjaan_ibu))
                                                    <option>{{ $verifikasi->siswa->pekerjaan_ibu }}
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
                                                    @if(!empty($verifikasi->siswa->penghasilan_ibu))
                                                    <option>{{ $verifikasi->siswa->penghasilan_ibu }}
                                                    </option>
                                                    @else
                                                    <option>Pilih Penghasilan Ibu</option>
                                                    @endif
                                                    <option value="< Rp.500.000">
                                                        < Rp.500.000 </option>
                                                    <option value="Rp.500.000-Rp.999.999"> Rp.500.000-Rp.999.999</option>
                                                    <option value="Rp. 1.000.000-Rp.1.999.999"> Rp. 1.000.000-Rp.1.999.999</option>
                                                    <option value="Rp. 2.000.000-Rp.4.000.000"> Rp. 2.000.000-Rp.4.000.000</option>
                                                    <option value="Rp. 5.000.000-Rp.20.000.000"> Rp. 5.000.000-Rp.20.000.000</option>
                                                    <option value="> Rp. 20.000.000"> > Rp. 20.000.000</option>
                                                    <option value="Tidak Berpenghasilan"> Tidak Berpenghasilan</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Berkebutuhan Khusus</label>

                                                <select class="form-select" id="basicSelect" name="kebutuhan_ibu">
                                                    @if(!empty($verifikasi->siswa->kebutuhan_ibu))
                                                    <option>{{ $verifikasi->siswa->kebutuhan_ibu }}
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
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card-body">
                            <h6 class="mb-2"> Data Wali <small class="text-info"> <em> *kosongkan jika tidak ada! </em> </small> </h6>
                            <form class="form form-vertical" id="detail">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Nama Lengkap Wali</label>
                                                <input type="text" class="form-control" name="nama_wali" value="{{ $verifikasi->siswa->nama_wali }}" placeholder="Nama Lengkap Wali Sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">NIK Wali</label>
                                                <input type="text" class="form-control" name="nik_wali" value="{{ $verifikasi->siswa->nik_wali }}" placeholder="NIK Wali Sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Tahun Lahir Wali</label>
                                                <input type="date" class="form-control" name="tahun_wali" value="{{ $verifikasi->siswa->tahun_wali }}" placeholder="Tahun Lahir Wali Sesuai KK">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Pendidikan Wali</label>

                                                <select class="form-select" id="basicSelect" name="pendidikan_wali">
                                                    @if(!empty($verifikasi->siswa->pendidikan_wali))
                                                    <option>{{ $verifikasi->siswa->pendidikan_wali }}
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
                                                <label for="contact-info-vertical">Pekerjaan Wali</label>

                                                <select class="form-select" id="basicSelect" name="pekerjaan_wali">
                                                    @if(!empty($verifikasi->siswa->pekerjaan_wali))
                                                    <option>{{ $verifikasi->siswa->pekerjaan_wali }}
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
                                                <label for="contact-info-vertical">Penghasilan Bulanan Wali</label>

                                                <select class="form-select" id="basicSelect" name="penghasilan_wali">
                                                    @if(!empty($verifikasi->siswa->penghasilan_wali))
                                                    <option>{{ $verifikasi->siswa->penghasilan_wali }}
                                                    </option>
                                                    @else
                                                    <option>Pilih Penghasilan Wali</option>
                                                    @endif
                                                    <option value="< Rp.500.000">
                                                        < Rp.500.000 </option>
                                                    <option value="Rp.500.000-Rp.999.999"> Rp.500.000-Rp.999.999</option>
                                                    <option value="Rp. 1.000.000-Rp.1.999.999"> Rp. 1.000.000-Rp.1.999.999</option>
                                                    <option value="Rp. 2.000.000-Rp.4.000.000"> Rp. 2.000.000-Rp.4.000.000</option>
                                                    <option value="Rp. 5.000.000-Rp.20.000.000"> Rp. 5.000.000-Rp.20.000.000</option>
                                                    <option value="> Rp. 20.000.000"> > Rp. 20.000.000</option>
                                                    <option value="Tidak Berpenghasilan"> Tidak Berpenghasilan</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Berkebutuhan Khusus</label>

                                                <select class="form-select" id="basicSelect" name="kebutuhan_wali">
                                                    @if(!empty($verifikasi->siswa->kebutuhan_wali))
                                                    <option>{{ $verifikasi->siswa->kebutuhan_wali }}
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
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="data" role="tabpanel" aria-labelledby="data-tab">
                        <div class="card-body">
                            <form class="form form-vertical" id="detail">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="kontak">Kontak (Nomor HP Orang Tua/Wali)</label>
                                                <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Nomor Yang Dapat Dihubungi" value="{{ $verifikasi->siswa->kontak }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="skhu">SKHU / Surat Keterangan Lulus</label>
                                                @if(!empty($verifikasi->siswa->skhu))
                                                <div class="mb-2">
                                                    <a href="{{ asset('storage/berkas/siswa/' . $verifikasi->siswa->skhu) }}">Download-{{ $verifikasi->siswa->name }}-skhu.pdf</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="akta_lahir">Akta Kelahiran </label>
                                                @if(!empty($verifikasi->siswa->akta_lahir))
                                                <div class="mb-2">
                                                    <a href="{{ asset('storage/berkas/siswa/' . $verifikasi->siswa->akta_lahir) }}">Download-{{ $verifikasi->siswa->name }}-.pdf</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="kk">Kartu Keluarga</label>
                                                @if(!empty($verifikasi->siswa->kk))
                                                <div class="mb-2">
                                                    <a href="{{ asset('storage/berkas/siswa/' . $verifikasi->siswa->kk) }}">Download-{{ $verifikasi->siswa->name }}-kk.pdf</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="ktp">KTP Orang Tua/Wali </label>
                                                @if(!empty($verifikasi->siswa->ktp))
                                                <div class="mb-2">
                                                    <a href="{{ asset('storage/berkas/siswa/' . $verifikasi->siswa->ktp) }}">Download-{{ $verifikasi->siswa->name }}-ktp.pdf</a>
                                                </div>
                                                @endif
                                            </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mendapatkan referensi elemen-elemen input form
        var formInputs = document.querySelectorAll('#detail input, #detail select, #detail textarea, #detail radio');

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
        }

        // Panggil fungsi untuk mengatur form menjadi disabled saat halaman dimuat
        setFormDisabled(true);

});
</script>


@endsection
