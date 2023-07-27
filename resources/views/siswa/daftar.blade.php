@extends('layout.app')

@section('title', 'Pendaftaran')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-12 order-md-1 order-last">
            <h3>Soal Tes dan Data Pendaftar</h3>
            {{-- <p class="text-subtitle text-muted">Isi Informasi Lainnya disini</p> --}}
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

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{-- <h5 class="card-title">Data Pendaftaran</h5> --}}
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tes</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Data Pendaftar</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body">
                            @if(empty($verifikasi))
                            <h6 class="my-2"> Tes </h6>

                            <form class="form form-vertical" action="{{route('proses.pendaftaran')}}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="jawaban_pertanyaan_1">1. GAMBARAN = ....</label>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_1-a" name="jawaban_pertanyaan_1" value="a">
                                                    <label for="jawaban_pertanyaan_1-a">A. Dimensi</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_1-b" name="jawaban_pertanyaan_1" value="b">
                                                    <label for="jawaban_pertanyaan_1-b">B. Potret</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_1-c" name="jawaban_pertanyaan_1" value="c">
                                                    <label for="jawaban_pertanyaan_1-c">C. Imajinasi</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_1-d" name="jawaban_pertanyaan_1" value="d">
                                                    <label for="jawaban_pertanyaan_1-d">D. Penampakan</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="jawaban_pertanyaan_2">2. DATANG : PERGI = AWAL : ....</label>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_2-a" name="jawaban_pertanyaan_2" value="a">
                                                    <label for="jawaban_pertanyaan_2-a">A. Kemudian</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_2-b" name="jawaban_pertanyaan_2" value="b">
                                                    <label for="jawaban_pertanyaan_2-b">B. Penutup</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_2-c" name="jawaban_pertanyaan_2" value="c">
                                                    <label for="jawaban_pertanyaan_2-c">C. Usai</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_2-d" name="jawaban_pertanyaan_2" value="d">
                                                    <label for="jawaban_pertanyaan_2-d">D. Akhir</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="jawaban_pertanyaan_3">3. Jika anda belajar hal baru, bagaimana cara paling mudah mengingatnya?</label>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_3-a" name="jawaban_pertanyaan_3" value="a">
                                                    <label for="jawaban_pertanyaan_3-a">A. Melihatnya</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_3-b" name="jawaban_pertanyaan_3" value="b">
                                                    <label for="jawaban_pertanyaan_3-b">B. Mendengarnya</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_3-c" name="jawaban_pertanyaan_3" value="c">
                                                    <label for="jawaban_pertanyaan_3-c">C. Menulisnya</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_3-d" name="jawaban_pertanyaan_3" value="d">
                                                    <label for="jawaban_pertanyaan_3-d">D. Mempraktekkan hal baru itu</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="jawaban_pertanyaan_4">4. Kegiatan apa yang anda senangi untuk mengisi waktu luang?</label>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_4-a" name="jawaban_pertanyaan_4" value="a">
                                                    <label for="jawaban_pertanyaan_4-a">A. Membaca buku</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_4-b" name="jawaban_pertanyaan_4" value="b">
                                                    <label for="jawaban_pertanyaan_4-b">B. Mendengar musik</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_4-c" name="jawaban_pertanyaan_4" value="c">
                                                    <label for="jawaban_pertanyaan_4-c">C. Menulis atau menggambar</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_4-d" name="jawaban_pertanyaan_4" value="d">
                                                    <label for="jawaban_pertanyaan_4-d">D. Berolahraga</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="jawaban_pertanyaan_5">5. Manakah hal berikut yang paling anda gemari?</label>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_5-a" name="jawaban_pertanyaan_5" value="a">
                                                    <label for="jawaban_pertanyaan_5-a">A. Anda senang melukis dan memiliki selera yang baik tentang warna dan desain</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_5-b" name="jawaban_pertanyaan_5" value="b">
                                                    <label for="jawaban_pertanyaan_5-b">B. Anda senang mendengar musik dan sering bersenandung</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_5-c" name="jawaban_pertanyaan_5" value="c">
                                                    <label for="jawaban_pertanyaan_5-c">C. Anda senang menuangkan cerita kedalam suatu tulisan</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="jawaban_pertanyaan_5-d" name="jawaban_pertanyaan_5" value="d">
                                                    <label for="jawaban_pertanyaan_5-d">D. Anda tidak bisa duduk diam</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Anda sudah melakukan pendaftaran, data pendaftaran telah diterima Admin, mohon menunggu pengumuman untuk informasi selanjutnya! </div>
                            @endif
                        </div>

                        
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card-body">
                            @if(empty($verifikasi))
                            <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i> Belum ada data pendaftaran, segera lakukan pendaftaran dan pastikan anda sudah melengkapi Data Diri pada Dashboard dan Menjawab Soal Tes terlebih dahulu sebelum melakukan pendaftaran.</div>
                            @else
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th class="text-center">NISN</th>
                                            <th class="text-center">Nomor Pendaftaran</th>
                                            <th class="text-center">Tanggal Daftar</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Informasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td> {{$verifikasi->siswa->name}} </td>
                                        <td class="text-center"> {{$verifikasi->siswa->nisn}} </td>
                                        <td class="text-center"> {{$verifikasi->nomor_pendaftaran}} </td>
                                        <td class="text-center"> {{$verifikasi->tanggal_daftar}} </td>
                                        <td class="text-center">
                                            @if ($verifikasi->status == 'proses')
                                            <div class="alert alert-light-warning color-warning"><i class="bi bi-check-circle"></i> Proses! </div>
                                            @elseif ($verifikasi->status == 'lulus')
                                            <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Lulus! </div>
                                            @elseif ($verifikasi->status == 'tolak')
                                            <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-triangle"></i>Tidak Lulus</div>                                
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($verifikasi->status == 'proses')
                                            <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Pendaftaran Berhasil! </div>
                                            @elseif ($verifikasi->status == 'lulus')
                                            <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Selamat Anda dinyatakan Lulus!</div>
                                            @elseif ($verifikasi->status == 'tolak')
                                            <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-triangle"></i> Maaf, Anda tidak diterima karena data pendaftaran anda tidak memenuhi persyaratan.</div>
                                
                                            @endif
                                        </td>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
