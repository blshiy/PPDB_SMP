@extends('layout.app')

@section('title', 'Pengumuman Pendaftaran')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-12 order-md-1 order-last">
            <h3>Pengumuman Pendaftaran</h3>
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
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            {{-- <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Berhasil Membuat Akun PPDB SMPN 3 Anjir Muara, segera Lengkapi profil anda di halaman dashboard atau <a href="{{route('siswa')}}">klik disini! </a> </div> --}}

            @if ($verifikasi -> status == 'proses')
            <div class="alert alert-light-warning color-warning"><i class="bi bi-check-circle"></i> Data Pendaftaran Anda telah diterima dan sedang melewati tahap verifikasi oleh admin, mohon tunggu pengumuman untuk informasi selanjutnya!</div>
            @elseif ($verifikasi -> status == 'lulus')
            <div class="alert alert-light-warning color-warning"><i class="bi bi-check-circle"></i> Data Pendaftaran Anda telah diterima dan sedang melewati tahap verifikasi oleh admin, mohon tunggu pengumuman untuk informasi selanjutnya!</div>

            <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Selamat! Anda dinyatakan lulus dan diterima sebagai peserta didik baru SMP Negeri 3 Anjir Muara.</div>
            <!-- Tombol cetak hanya akan aktif jika status verifikasi adalah 'lulus' -->
            <a href="{{ route('cetak.kelulusan') }}" target="_blank" class="btn btn-primary">Cetak Kelulusan</a>

            @elseif ($verifikasi -> status == 'tolak')
            <div class="alert alert-light-danger color-danger"><i class="bi bi-exclamation-triangle"></i> Maaf, Data Pendaftaran Anda tidak memenuhi persyaratan dan tidak diterima sebagai peserta didik baru SMP Negeri 3 Anjir Muara.</div>
            @endif
        </div>
    </div>
</div>

@endsection