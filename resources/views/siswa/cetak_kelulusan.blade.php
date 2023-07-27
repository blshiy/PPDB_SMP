<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cetak Kelulusan</title>
    <style>
        /* Atur gaya tampilan untuk PDF di sini */
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            }
        .rangkasurat {
            width: 600px;
            margin: 0 auto;
            background-color: #fff;
            height: 500px;
            padding: 20px;
        }

        table{
            border-bottom: 5px solid #000;
            padding: 2px
        }

        .tengah {
            text-align: center;
            line-height: 5px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        .info {
            margin-bottom: 30px;
        }
        .content {
            text-align: left;
        }
        .footer {
            text-align: left;
            float: right;
            width: 30%;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="rangkasurat">
        <table width="100%">
            <tr>
                {{-- <td><img src="{{asset('assets/dashboard/assets/images/ico.png')}}" width="140px" alt=""></td> --}}
                <td class="tengah">
                    <h1>SURAT KETERANGAN LULUS</h1>
                    <h2>SEKOLAH MENENGAH PERTAMA 3 ANJIR MUARA</h2>
                    <b>Jalan Handil Masjid, Beringin Jaya, Telp.(0811) 2253</b>
                </td>
            </tr>
        </table>
    <div class="info">
        <p>Nama         : {{ $nama }}</p>
        <p>Tanggal Lulus: {{ $tanggal_lulus }}</p>
        <!-- Tambahkan data lainnya yang ingin ditampilkan -->
    </div>

    <div class="content">
        <!-- Konten surat keterangan kelulusan di sini -->
        <p>Selamat! Anda telah dinyatakan lulus dan diterima sebagai peserta didik baru SMP Negeri 3 Anjir Muara.</p>
        <p>Semoga sukses selalu dalam perjalanan pendidikan Anda!</p>
    </div>
<br><br><br>
    <div style="width: 50%; text-align: left; float: right;">
        Anjir Muara, <br>
        Kepala Sekolah SMPN 3 Anjir Muara
    </div>
    <br><br><br><br><br>

    <div style="width: 50%; text-align: left; float: right;">
        <p>M.Nunci, A.Ma.Pd, S.Pd, M.Pd.</p>


    </div>
</body>
</html>
