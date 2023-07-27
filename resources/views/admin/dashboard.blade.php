@extends('template.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-12 order-md-1 order-last">
            <h3>Selamat Datang Admin</h3>
            <p class="text-subtitle text-muted">Mari Selesaikan Pekerjaan Hari Ini!</p>
        </div>
    </div>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon warning mb-2">
                                        <i class="iconly-boldUser1"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pendaftar</h6>
                                    <h6 class="font-extrabold mb-0">{{$totalPendaftar}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldTick-Square"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Lulus</h6>
                                    <h6 class="font-extrabold mb-0">{{$pendaftarTerverifikasi}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldTime-Square"></i>
                                    </div>
                                    
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Proses</h6>
                                    <h6 class="font-extrabold mb-0">{{$pendaftarBelumTerverifikasi}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Tidak Lulus</h6>
                                    <h6 class="font-extrabold mb-0">{{$ditolak}}</h6>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pendaftar Hari Ini</h4>
                        </div>
                        <div class="card-body">
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
                                    @if ($pendaftarHariIni->isEmpty())
                                    <div class="alert alert-light-warning color-warning"><i class="bi bi-check-circle"></i> Belum ada pendaftar hari ini!</div>
                                    @else
                                    <tbody>
                                        @foreach ($pendaftarHariIni as $verifikasi)
                                        <tr>
                                            <td>{{ $verifikasi->siswa->name }}</td>
                                            <td class="text-center">{{ $verifikasi->siswa->nisn }}</td>
                                            <td class="text-center">{{ $verifikasi->nomor_pendaftaran }}</td>
                                            <td class="text-center">{{ $verifikasi->tanggal_daftar }}</td>
                                            <td class="text-center">
                                                @if ($verifikasi->status == 'proses')
                                                <div class="alert alert-light-warning color-warning"><i class="bi bi-check-circle"></i> Proses!</div>
                                                @elseif ($verifikasi->status == 'lulus')
                                                <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Lulus!</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($verifikasi->status == 'proses')
                                                <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Pendaftaran Berhasil!</div>
                                                @elseif ($verifikasi->status == 'lulus')
                                                <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Selamat Anda dinyatakan Lulus!</div>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    @endif

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
</div>

<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mendapatkan referensi elemen-elemen input form
        var formInputs = document.querySelectorAll('#formSiswa input, #formSiswa select, #formSiswa textarea, #formSiswa radio');
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
