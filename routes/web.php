<?php

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

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Siswa\SiswaController;
use Illuminate\Support\Facades\Route;




Route::get('/', 'DashboardController@index')->name('index');
Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/login', 'Auth\AuthController@proseslogin')->name('proseslogin');
Route::get('/register',  'Auth\AuthController@register')->name('register');
Route::post('/register', 'Auth\AuthController@prosesregister')->name('prosesregister');
Route::post('/logout', 'Auth\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::get('/dashboard/kepala-tu', 'KepalaTU\KepalaTUController@index')->name('pdashboard');
        Route::get('/hasil', 'KepalaTU\KepalaTUController@hasil')->name('hasil');
        //route profil 
        Route::get('/kprofil/create', 'KepalaTU\ProfilController@create')->name('kepala.profil.create');
        Route::post('/kprofil', 'KepalaTU\ProfilController@store')->name('kepala.profil.store');
        Route::get('/kprofil/view', 'KepalaTU\ProfilController@index')->name('kepala.profil.index');
        Route::get('/kprofil/{id}', 'KepalaTU\ProfilController@show')->name('kepala.profil.show');
        Route::get('/kprofil/{id}/edit', 'KepalaTU\ProfilController@edit')->name('kepala.profil.edit');
        Route::put('/kprofil/{id}', 'KepalaTU\ProfilController@update')->name('kepala.profil.update');
        Route::put('/kprofil/logo/{id}', 'KepalaTU\ProfilController@updatelogo')->name('kepala.profil.updatelogo');
        Route::delete('/kprofil/{id}', 'KepalaTU\ProfilController@destroy')->name('kepala.profil.delete');
        
        Route::get('/diterima', 'KepalaTU\KepalaTUController@terima')->name('terima');
        Route::get('/ditolak', 'KepalaTU\KepalaTUController@tolak')->name('tolak');
        
        Route::get('/rekap/terima', 'KepalaTU\KepalaTUController@rekapterima')->name('rekap.terima');
        Route::get('/rekap/tolak', 'KepalaTU\KepalaTUController@rekaptolak')->name('rekap.tolak');
    });
    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');
        Route::get('/ubahpassword', 'Admin\AdminController@ubahpassword')->name('admin.ubahpassword');
        Route::post('/updateubahpassword', 'Admin\AdminController@updateubahpassword')->name('admin.updateubahpassword');


        //route roles
        Route::get('/roles', 'Roles\RolesController@index')->name('roles.index');
        Route::get('/roles/create', 'Roles\RolesController@create')->name('roles.create');
        Route::post('/roles', 'Roles\RolesController@store')->name('roles.store');
        Route::get('/roles/{id}/edit', 'Roles\RolesController@edit')->name('roles.edit');
        Route::put('/roles/{id}', 'Roles\RolesController@update')->name('roles.update');
        Route::delete('/roles/{id}', 'Roles\RolesController@destroy')->name('roles.delete');

        //route CRUD sekolah    
        Route::get('/jurusan/create', 'Admin\JurusanController@create')->name('jurusan.create');
        Route::post('/jurusan', 'Admin\JurusanController@store')->name('jurusan.store');
        Route::get('/jurusan', 'Admin\JurusanController@index')->name('jurusan.index');
        Route::get('/jurusan/{sekolah_id}', 'Admin\JurusanController@show')->name('jurusan.show');
        Route::get('/jurusan/{sekolah_id}/edit', 'Admin\JurusanController@edit')->name('jurusan.edit');
        Route::put('/jurusan/{sekolah_id}', 'Admin\JurusanController@update')->name('jurusan.update');
        Route::delete('/jurusan/{sekolah_id}', 'Admin\JurusanController@destroy')->name('jurusan.delete');

        //route pendaftar
        Route::get('/pendaftar/view', 'Admin\PendaftarController@index')->name('pendaftar.index');
        Route::get('/pendaftar/detail/{id}', 'Admin\PendaftarController@detail')->name('pendaftar.detail');
        Route::post('/pendaftar/diterima/{id}', 'Admin\PendaftarController@updateterima')->name('pendaftar.updateterima');
        Route::post('/pendaftar/ditolak/{id}', 'Admin\PendaftarController@updatetolak')->name('pendaftar.updatetolak');
        Route::get('/pendaftar/diterima', 'Admin\PendaftarController@terima')->name('pendaftar.terima');
        Route::get('/pendaftar/ditolak', 'Admin\PendaftarController@tolak')->name('pendaftar.tolak');

        //route pengguna
        Route::get('/pengguna', 'Admin\PenggunaController@index')->name('pengguna.index');
        Route::get('/pengguna/{id}', 'Admin\PenggunaController@edit')->name('pengguna.edit');
        Route::post('/pengguna/{id}/edit', 'Admin\PenggunaController@update')->name('pengguna.update');

        //route persyaratan 
        Route::get('/persyaratan/create', 'Admin\PersyaratanController@create')->name('persyaratan.create');
        Route::post('/persyaratan', 'Admin\PersyaratanController@store')->name('persyaratan.store');
        Route::get('/persyaratan/view', 'Admin\PersyaratanController@index')->name('persyaratan.index');
        Route::get('/persyaratan/{id}', 'Admin\PersyaratanController@show')->name('persyaratan.show');
        Route::get('/persyaratan/{id}/edit', 'Admin\PersyaratanController@edit')->name('persyaratan.edit');
        Route::put('/persyaratan/{id}', 'Admin\PersyaratanController@update')->name('persyaratan.update');
        Route::delete('/persyaratan/{id}', 'Admin\PersyaratanController@destroy')->name('persyaratan.delete');

        //route profil 
        Route::get('/profil/create', 'Admin\ProfilController@create')->name('profil.create');
        Route::post('/profil', 'Admin\ProfilController@store')->name('profil.store');
        Route::get('/profil/view', 'Admin\ProfilController@index')->name('profil.index');
        Route::get('/profil/{id}', 'Admin\ProfilController@show')->name('profil.show');
        Route::get('/profil/{id}/edit', 'Admin\ProfilController@edit')->name('profil.edit');
        Route::put('/profil/{id}', 'Admin\ProfilController@update')->name('profil.update');
        Route::put('/profil/logo/{id}', 'Admin\ProfilController@updatelogo')->name('profil.updatelogo');
        Route::delete('/profil/{id}', 'Admin\ProfilController@destroy')->name('profil.delete');

        //route gelombang
        Route::get('/gelombang/create', 'Admin\GelombangController@create')->name('gelombang.create');
        Route::post('/gelombang', 'Admin\GelombangController@store')->name('gelombang.store');
        Route::get('/gelombang/view', 'Admin\GelombangController@index')->name('gelombang.index');
        Route::get('/gelombang/{id}', 'Admin\GelombangController@show')->name('gelombang.show');
        Route::get('/gelombang/{id}/edit', 'Admin\GelombangController@edit')->name('gelombang.edit');
        Route::put('/gelombang/{id}', 'Admin\GelombangController@update')->name('gelombang.update');
        Route::delete('/gelombang/{id}', 'Admin\GelombangController@destroy')->name('gelombang.delete');

        //route soal
        Route::get('/test/soal/create', 'Admin\SoalController@create')->name('soal.create');
        Route::post('/test/soal', 'Admin\SoalController@store')->name('soal.store');
        Route::get('/test/soal/view', 'Admin\SoalController@index')->name('soal.index');
        Route::get('/test/soal/{id}', 'Admin\SoalController@show')->name('soal.show');
        Route::get('/test/soal/{id}/edit', 'Admin\SoalController@edit')->name('soal.edit');
        Route::put('/test/soal/{id}', 'Admin\SoalController@update')->name('soal.update');
        Route::delete('/test/soal/{id}', 'Admin\SoalController@destroy')->name('soal.delete');

        //route jawaban
        Route::get('/test/jawaban/create', 'Admin\JawabanController@create')->name('jawaban.create');
        Route::post('/test/jawaban', 'Admin\JawabanController@store')->name('jawaban.store');
        Route::get('/test/jawaban/view', 'Admin\JawabanController@index')->name('jawaban.index');
        Route::get('/test/jawaban/{id}', 'Admin\JawabanController@show')->name('jawaban.show');
        Route::get('/test/jawaban/{id}/edit', 'Admin\JawabanController@edit')->name('jawaban.edit');
        Route::put('/test/jawaban/{id}', 'Admin\JawabanController@update')->name('jawaban.update');
        Route::delete('/test/jawaban/{id}', 'Admin\JawabanController@destroy')->name('jawaban.delete');

        //route hasil
        Route::get('/test/hasil/view', 'Admin\HasilController@index')->name('hasil.index');
        Route::get('/test/hasil/detail/{id}', 'Admin\HasilController@detail')->name('hasil.detail');
        Route::get('/test/hasil/rekap', 'Admin\HasilController@rekap')->name('hasil.rekap');
        Route::post('/pendaftar/lulus/{id}', 'Admin\HasilController@updatelulus')->name('pendaftar.updatelulus');
        Route::post('/pendaftar/tidaklulus/{id}', 'Admin\HasilController@updatetidaklulus')->name('pendaftar.updatetidaklulus');
    });
    Route::group(['middleware' => ['cek_login:3']], function () {
        Route::get('/dashboard/siswa', 'Siswa\SiswaController@index')->name('sdashboard');
        
        Route::get('/form/{id_gelombang}', 'Siswa\SiswaController@formulirshow')->name('siswa.form');
        Route::get('/formedit/{id}', 'Siswa\SiswaController@formulireditshow')->name('siswa.formedit');
        Route::get('/test/{id_gelombang}', 'Siswa\SiswaController@testujian')->name('siswa.test');
        Route::post('/test', 'Siswa\SiswaController@formtest')->name('siswa.formtest');
        Route::post('/form', 'Siswa\SiswaController@formulir')->name('siswa.formulir');
        Route::post('/formedit', 'Siswa\SiswaController@formuliredit')->name('siswa.formuliredit');
        Route::post('/formeditijasah', 'Siswa\SiswaController@formulireditijasah')->name('siswa.formulireditijasah');
        Route::get('/detailpendaftar', 'Siswa\SiswaController@detailpendaftar')->name('siswa.detail');
        Route::get('/riwayat', 'Siswa\SiswaController@riwayat')->name('siswa.riwayat');
        Route::get('/pengumuman/{id_gelombang}', 'Siswa\SiswaController@pengumuman')->name('siswa.pengumuman');
        Route::get('/cetakformulir/{id_gelombang}', 'Siswa\SiswaController@cetakformulir')->name('siswa.cetakformulir');


        Route::get('/ubahpassword', 'Siswa\SiswaController@ubahpassword')->name('siswa.ubahpassword');
        Route::post('/updateubahpassword', 'Siswa\SiswaController@updateubahpassword')->name('siswa.updateubahpassword');
    });
});

Route::get('/test/hasil/rekap', 'Admin\HasilController@rekap')->name('hasil.rekap');

Route::get('/persyaratan', 'DashboardController@persyaratan')->name('persyaratan');
Route::get('/profil', 'DashboardController@profil')->name('profil');