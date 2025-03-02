<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\NilaiController;


//default routing
Route::get('/', function () {
   return view('welcome');
});

route::post('submit', function(){
  return 'data berhasil ditambahkan';
});

Route::put('update/{id}', function($id) {
  return 'update data for id:' . $id;
});

Route::delete('delete/{id}',function($id){
return 'delete data for id:' . $id;
});


Route::get('/profile', function () {
   echo '<h1>Profile</h1>';
   return '<p> Jurusan teknologi informasi-Politeknik Negeri Padang</p>';
});


Route::get('mahasiswa/ti/latifa', function () {
   echo "<p style='font-size:40;color:orange'>Jurusan Teknologi Informasi";
   echo "<h1> Selamat Datang Latifa...</h1>";
   echo "<hr>";
   echo "<p> lorem .........................</p>";
});


//route with parameter
Route::get('mahasiswa/{nama}', function ($nama) {
   return '<p> Nama mahasiswa RPL : <b>' . $nama . '</b></p>';
});


Route::get('hitungusia/{nama}/{tahunlahir}',function($nama,$tahun_lahir){
$usia = date('Y') - $tahun_lahir;
return "<p>Hai <b>". $nama . "</b><br> usia anda sekarang adalah <b>". $usia ."</b> tahun.</p>";
});

//aaaaa


//route with optional parameter
Route::get('mahasiswa/{nama?}', function ($nama='tidak ada') {
   return '<p> Nama mahasiswa RPL : <b>' . $nama . '</b></p>';
});


Route::get('hitungusia/{nama?}/{tahunlahir?}',function($nama="tidak ada",$tahun_lahir="2025"){
   $usia = date('Y') - $tahun_lahir;
   return "<p>Hai <b>". $nama . "</b><br> usia anda sekarang adalah <b>". $usia ."</b> tahun.</p>";
   });


//route with regular expression
Route::get('user/{id}',function($id){
return '<p> user admin memiliki id <b>'. $id . '</b></p>';
})->where('id','[0-9]+');


//route redirect
Route::redirect('public','mahasiswa');


//route group
Route::prefix('login')->group(function(){
   route::get('mahasiswa',function(){
       return '<h2> login sebagai mahasiswa</h2>';
   });
   route::get('dosen',function(){
       return '<h2> login sebagai dosen</h2>';
   });
   route::get('admin',function(){
       return '<h2> login sebagai admin</h2>';
   });
 
});


//tugas1:
Route::patch('patch/{id}',function($id){
   return 'patch data for id:' . $id;
});

Route::get('/nilai', [NilaiController::class, 'index']);
Route::post('/hitung-nilai', [NilaiController::class, 'hitungNilai']);

Route::resource('nilai', NilaiController::class);

Route::get('mahasiswa/pnp/nauval', function () {
   echo "<p style='font-size:40;color:orange'>Politeknik Negeri Padang";
   echo "<h1> Selamat Datang Nauval...</h1>";
   echo "<hr>";
   echo "<p> Jurusan Teknologi Informasi terbaik!</p>";
});

// Authentication routes
Route::get('/login', function() {
  return view('Tugas1.auth.login');
});

Route::get('/register', function() {
  return view('Tugas1.auth.register');
});

Route::get('/dashboard', function() {
  return view('Tugas1.auth.dashboard');
});


// Profile management routes
Route::get('/profile/edit', function() {
  return view('Tugas1.profile.edit');
});

Route::put('/profile/update', function() {
  return 'Profile updated successfully';
});

// API documentation route
Route::get('/docs', function() {
  return view('Tugas1.api.documentation');
});

// Contact form routes
Route::get('/contact', function() {
  return view('Tugas1.contact');
});

Route::post('/contact/send', function() {
  return 'Message sent successfully';
});

// Blog routes
Route::prefix('blog')->group(function() {
  Route::get('/', function() {
      return 'Blog index';
  });
  
  Route::get('/{slug}', function($slug) {
      return 'Blog post: ' . $slug;
  });
  
  Route::get('/category/{category}', function($category) {
      return 'Posts in category: ' . $category;
  });
});

// Admin panel routes
Route::prefix('admin')->group(function() {
  Route::get('/users', function() {
      return 'Profil pengguna';
  });
  
  Route::get('/settings', function() {
      return 'Setting';
  });
  
  Route::get('/reports', function() {
      return 'Analisis laporan';
  });
});

//route fallback
Route::fallback(function(){
   return "<h2> Mohon maaf, halaman yang anda cari <b>tidak ditemukan</b>";
});
