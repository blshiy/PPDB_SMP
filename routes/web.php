<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/login', [LoginController::class, 'halamanLogin'])->name('login');
Route::get('/daftar', [LoginController::class, 'halamanDaftar'])->name('daftar');
Route::post('/daftar', [LoginController::class, 'processDaftar'])->name('daftar.procces');

Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:user')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/data-pendaftar', [AdminController::class, 'dataPendaftar'])->name('admin.data');
    Route::post('/data-pendaftar/verifikasi/{id}', [AdminController::class, 'verifikasi'])->name('verifikasi');
    Route::get('/pendaftar/{id}', [AdminController::class, 'show'])->name('pendaftar.detail');
    Route::post('/pendaftar/update-password/{id}', [AdminController::class, 'updatePassowrd'])->name('update.password');
    Route::get('/data-pendaftar/lulus', [AdminController::class, 'eksporData'])->name('admin.ekspor');
    Route::delete('/data/{id}', [AdminController::class, 'hapusData'])->name('admin.hapusData');


    Route::get('/data-ppdb', [AdminController::class, 'informasiPpdb'])->name('admin.informasi');
    Route::post('/tambah-informasi', [AdminController::class, 'tambahInformasi'])->name('tambah.informasi');
    Route::post('/data-ppdb/update/{id}', [AdminController::class, 'UpdateinformasiPpdb'])->name('informasi.update');
    Route::delete('/data-ppdb/hapus/{id}', [AdminController::class, 'hapusInformasi'])->name('informasi.hapus');
 
    Route::get('/profil-admin', [AdminController::class, 'profilAdmin'])->name('admin.profil');
    Route::post('/profil-admin', [AdminController::class, 'UpdateprofilAdmin'])->name('admin.updateProfil');
    Route::get('/data-admin', [AdminController::class, 'dataAdmin'])->name('data.admin');
    Route::post('/tambah-admin', [AdminController::class, 'tambahUser'])->name('admin.tambahUser');
    Route::delete('/user/{id}', [AdminController::class, 'hapusUser'])->name('admin.hapusUser');
    Route::get('/export', [AdminController::class, 'export'])->name('data.export');
});

Route::middleware('auth:siswa')->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::post('/siswa/akun', [SiswaController::class, 'updateAkun'])->name('update.akun');



    Route::post('/data-siswa', [SiswaController::class, 'dataSiswa'])->name('data.siswa');
    Route::post('/data-siswa/orang-tua', [SiswaController::class, 'dataOrangTua'])->name('data.orangtua');
    Route::post('/data-siswa/wali', [SiswaController::class, 'dataWali'])->name('data.wali');
    Route::post('/data-siswa/berkas', [SiswaController::class, 'berkasSiswa'])->name('berkas.siswa');
    Route::post('/data-siswa/daftar', [SiswaController::class, 'prosesPendaftaran'])->name('proses.pendaftaran');




    Route::get('/siswa-daftar', [SiswaController::class, 'daftarSiswa'])->name('siswa.daftar');
    Route::get('/siswa-pengumuman', [SiswaController::class, 'pengumumanSiswa'])->name('siswa.pengumuman');
    Route::get('/cetak-kelulusan', [SiswaController::class, 'cetakKelulusan'])->name('cetak.kelulusan');

});
