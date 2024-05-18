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
        Route::get('/pdashboard', 'Panitia\PanitiaController@index')->name('pdashboard');

        //route persyaratan 
        // Route::get('/ppersyaratan/create', 'Panitia\PersyaratanController@create')->name('ppersyaratan.create');
        // Route::post('/ppersyaratan', 'Panitia\PersyaratanController@store')->name('ppersyaratan.store');
        // Route::get('/ppersyaratan/view', 'Panitia\PersyaratanController@index')->name('ppersyaratan.index');
        // Route::get('/ppersyaratan/{id}', 'Panitia\PersyaratanController@show')->name('ppersyaratan.show');
        // Route::get('/ppersyaratan/{id}/edit', 'Panitia\PersyaratanController@edit')->name('ppersyaratan.edit');
        // Route::put('/ppersyaratan/{id}', 'Panitia\PersyaratanController@update')->name('ppersyaratan.update');
        // Route::delete('/ppersyaratan/{id}', 'Panitia\PersyaratanController@destroy')->name('ppersyaratan.delete');

        //route gelombang
        Route::get('/gelombang/create', 'Panitia\GelombangController@create')->name('gelombang.create');
        Route::post('/gelombang', 'Panitia\GelombangController@store')->name('gelombang.store');
        Route::get('/gelombang/view', 'Panitia\GelombangController@index')->name('gelombang.index');
        Route::get('/gelombang/{id}', 'Panitia\GelombangController@show')->name('gelombang.show');
        Route::get('/gelombang/{id}/edit', 'Panitia\GelombangController@edit')->name('gelombang.edit');
        Route::put('/gelombang/{id}', 'Panitia\GelombangController@update')->name('gelombang.update');
        Route::delete('/gelombang/{id}', 'Panitia\GelombangController@destroy')->name('gelombang.delete');

        //route soal
        Route::get('/soal/create', 'Panitia\SoalController@create')->name('soal.create');
        Route::post('/soal', 'Panitia\SoalController@store')->name('soal.store');
        Route::get('/test/soal/view', 'Panitia\SoalController@index')->name('soal.index');
        Route::get('/soal/{id}', 'Panitia\SoalController@show')->name('soal.show');
        Route::get('/soal/{id}/edit', 'Panitia\SoalController@edit')->name('soal.edit');
        Route::put('/soal/{id}', 'Panitia\SoalController@update')->name('soal.update');
        Route::delete('/soal/{id}', 'Panitia\SoalController@destroy')->name('soal.delete');

        //route jawaban
        Route::get('/jawaban/create', 'Panitia\JawabanController@create')->name('jawaban.create');
        Route::post('/jawaban', 'Panitia\JawabanController@store')->name('jawaban.store');
        Route::get('/test/jawaban/view', 'Panitia\JawabanController@index')->name('jawaban.index');
        Route::get('/jawaban/{id}', 'Panitia\JawabanController@show')->name('jawaban.show');
        Route::get('/jawaban/{id}/edit', 'Panitia\JawabanController@edit')->name('jawaban.edit');
        Route::put('/jawaban/{id}', 'Panitia\JawabanController@update')->name('jawaban.update');
        Route::delete('/jawaban/{id}', 'Panitia\JawabanController@destroy')->name('jawaban.delete');

        //route hasil
        Route::get('/test/hasil/view', 'Panitia\HasilController@index')->name('hasil.index');
        Route::get('/hasil/detail/{id}', 'Panitia\HasilController@detail')->name('hasil.detail');
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
        Route::delete('/profil/{id}', 'Admin\ProfilController@destroy')->name('profil.delete');
    });
    Route::group(['middleware' => ['cek_login:3']], function () {
        Route::get('/form/{id_gelombang}', 'Siswa\SiswaController@index')->name('siswa.index');
        Route::get('/test/{id_gelombang}', 'Siswa\SiswaController@testujian')->name('siswa.test');
        Route::post('/test', 'Siswa\SiswaController@formtest')->name('siswa.formtest');
        Route::post('/form', 'Siswa\SiswaController@formulir')->name('siswa.formulir');
        Route::get('/detailpendaftar', 'Siswa\SiswaController@detailpendaftar')->name('siswa.detail');
        Route::get('/pengumuman/{id_gelombang}', 'Siswa\SiswaController@pengumuman')->name('siswa.pengumuman');
        Route::get('/cetakformulir', 'Siswa\SiswaController@cetakformulir')->name('siswa.cetakformulir');


        Route::get('/ubahpassword', 'Siswa\SiswaController@ubahpassword')->name('siswa.ubahpassword');
        Route::post('/updateubahpassword', 'Siswa\SiswaController@updateubahpassword')->name('siswa.updateubahpassword');
    });
});



Route::get('/persyaratan', 'Siswa\SiswaController@persyaratan')->name('siswa.persyaratan');
Route::get('/profil', 'Siswa\SiswaController@profil')->name('siswa.profil');