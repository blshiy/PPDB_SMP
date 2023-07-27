@extends('includes.app')

@section('title', 'Beranda')

@section('hero')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        <h1>Selamat Datang,<br>Di Penerimaan Peserta Didik Baru</h1>
        <h2>SMP Negeri 3 Anjir Muara</h2>
        <a href="{{route('daftar')}}" class="btn-get-started"><i class="bi bi-person-add"> Daftar Sekarang</i></a>
        <a href="{{route('login')}}" class="btn-get-started"><i class="bi bi-box-arrow-in-right"></i> Masuk</a>
    </div>
</section><!-- End Hero -->

@endsection

@section('content')

<!-- ======= About Section ======= -->
{{-- <section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Informasi</h2>
            <p>Tentang Sekolah</p>
        </div>


        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                <img src="{{asset('beranda/assets/img/smp32.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h3>Tentang Sekolah</h3>
                <p class="fst-italic" style="text-align: justify;">
                    Kurikulum SMP Negeri 3 Anjir Muara berupaya melakukan penyesuaian program pendidikan dengan kebutuhan dan potensi yang ada di SMP Negeri 3 Anjir Muara. SMP Negeri 3 Anjir Muara sebagai unit penyelenggara pendidikan dituntut memperhatikan perkembangan dan tantangan masa depan. Perkembangan dan tantangan itu antara lain:
                </p>
                <ul>
                    <li><i class="bi bi-check-circle"></i>
                        Perkembangan ilmu pengetahuan dan teknologi
                    </li>
                    <li><i class="bi bi-check-circle"></i>
                        Globalisasi yang memungkinkan cepatnya arus perubahan dan mobilitas antar dan lintas sektor serta tempat
                    </li>
                    <li><i class="bi bi-check-circle"></i>
                        Eera informasi
                    </li>
                    <li><i class="bi bi-check-circle"></i>
                        Pengaruh globalisasi terhadap perubahan perilaku dan moral manusia
                    </li>
                    <li><i class="bi bi-check-circle"></i>
                        Berubahnya kesadaran masyarakat dan orang tua terhadap pendidikan, dan
                    </li>
                    <li><i class="bi bi-check-circle"></i> Era perdagangan bebas.
                    </li>
                </ul>
                <p style="text-align: justify;">
                    Tantangan sekaligus peluang tersebut telah direspon oleh SMP Negeri 3 Anjir Muara, sehingga visi SMP Negeri 3 Anjir Muara diharapkan sesuai dengan arah perkembangan tersebut. Visi tidak lain merupakan citra moral yang menggambarkan profil SMP Negeri 3 Anjir Muara yang diinginkan di masa datang. Namun demikian, visi SMP Negeri 3 Anjir Muara harus tetap dalam koridor kebijakan pendidikan nasional. Visi juga harus memperhatikan dan mempertimbangkan potensi yang dimiliki SMP Negeri 3 Anjir Muara dan harapan masyarakat yang dilayani SMP Negeri 3 Anjir Muara.
                    Dalam merumuskan visi, pihak-pihak yang terkait (stakeholders) bermusyawarah. Visi sekolah mewakili aspirasi berbagai kelompok yang terkait sehingga seluruh kelompok yang terkait (guru, tenaga administrasi sekolah, siswa, orang tua, masyarakat, dan pemerintah) bersama-sama berperan aktif untuk mewujudkan visi SMP Negeri 3 Anjir Muara.
                </p>
            </div>
        </div>

    </div>
</section><!-- End About Section --> --}}


{{-- Syarat PPDB --}}
<section id="courses" class="courses">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Penerimaan Peserta Didik Baru</h2>
            <p>Informasi & Syarat Pendaftaran</p>
        </div>

        <div class="row">
            <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-2 content">
                <h3>Informasi & Syarat Pendaftaran</h3>
                {{-- <p class="fst-italic" style="text-align: justify;">
                    keterangan lain disini
                </p> --}}
                @foreach ($informasi as $data)
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <p><i class="bi bi-check-circle"></i> {{ $data->nama }}</p>
                        </div>
                        <div class="col-lg-8">
                            <p>: {{ $data->deskripsi }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-left" data-aos-delay="100">
                <img src="{{asset('beranda/assets/img/anak.PNG')}}" class="img-fluid" alt="">
            </div>

        </div>
    </div>
</section>



<!-- ======= Events Section ======= -->
{{-- <section id="events" class="events">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Tujuan Sekolah</h2>
            <p>Visi dan Misi</p>
        </div>


        <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-img">
                        <img src="{{asset('beranda/assets/img/smp38.jpg')}}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="">Visi SMP Negeri 3 Anjir Muara adalah:</a></h5>
                        <p class="fst-italic text-center">Terwujudnya Insan yang SIAP (Santun berperilaku, Iman dalam beragama, menjaga Asri lingkungannya, dan Percaya diri) BERPRESTASI.</p>
                        <p class="card-text"><i class="bi bi-check-circle"></i> Santun</p>
                        <p class="card-text"><i class="bi bi-check-circle"></i> Iman</p>
                        <p class="card-text"><i class="bi bi-check-circle"></i> Asri</p>
                        <p class="card-text"><i class="bi bi-check-circle"></i> Percaya Diri</p>
                        <p class="card-text"><i class="bi bi-check-circle"></i> Berprestasi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-img">
                        <img src="{{asset('beranda/assets/img/smp34.jpg')}}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="">Misi dari SMPN 3 Anjir Muara Adalah</a></h5>
                        <p class="fst-italic text-center">Untuk mencapai visi SMP Negeri 3 Anjir Muara perlu dilakukan suatu misi berupa kegiatan jangka panjang dengan arah yang jelas.Dalam setiap kinerja kami selalu menumbuhkan sikap dan perilaku santun berdasarkan iman dalam beragama, selalu menjaga keasrian lingkungannya, dan menanamkan sikap percaya diri dalam berusaha meraih prestasi dan meningkatkan mutu dalam kebersamaan antara peserta didik, guru, karyawan, kepala sekolah, dan komite sekolah, serta warga masyarakat sekitar.</p>
                        <p class="card-text">
                            Menyelenggarakan pendidikan bermutu untuk meningkatkan kualitas dan kuantitas kompetensipeserta didik, pendidik, dan tenaga kependidikan yang didukung sarana prasarana pembelajaran, lingkungan yang asri, dan pelayanan prima.
                        </p>

                    </div>

                </div>
            </div>
        </div>

    </div>
</section> --}}
<!-- End Events Section -->

<!-- ======= Pengumuman ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Penerimaan Peserta Didik Baru Online</h2>
            <p>Pengumuman</p>
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" style="max-width: 230px;" placeholder="Silahkan Cari Nama Anda">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="searchButton">Cari</button>
                </div>
            </div>
        </div>


        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @foreach ($verifikasi as $data)
                <div class="swiper-slide">
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <img src="{{ asset('storage/siswa/profil/' . $data->siswa->foto) }}" class="testimonial-img" alt="">
                            <h3>{{$data->siswa->name}}</h3>
                            <h4>{{$data->siswa->nisn}}</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Calon Peserta didik baru dengan NISN  {{$data->siswa->nisn}}, tanggal daftar {{$data->tanggal_daftar}}, dinyatakan Lulus!
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            {{-- <a href="{{ route('export.data') }}" class="btn btn-success"><i class="bi bi-file-earmark-excel"></i> Ekspor Data</a> --}}
                        </div>
                    </div>
                </div><!-- End testimonial item -->
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- End Testimonials Section -->


@endsection