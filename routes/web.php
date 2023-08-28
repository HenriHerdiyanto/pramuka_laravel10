<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/member', [App\Http\Controllers\MemberController::class, 'index'])->name('member');
    // member create
    Route::get('/member/create', [App\Http\Controllers\MemberController::class, 'create'])->name('member.create');
    // member store
    Route::post('/member/store', [App\Http\Controllers\MemberController::class, 'store'])->name('member.store');
    // member edit
    Route::get('/member/edit/{id}', [App\Http\Controllers\MemberController::class, 'edit'])->name('member.edit');
    // member update
    Route::put('/member/update/{id}', [App\Http\Controllers\MemberController::class, 'update'])->name('member.update');
    // member delete
    Route::delete('/member/destroy/{id}', [App\Http\Controllers\MemberController::class, 'destroy'])->name('member.destroy');

    Route::get('/kategori', [App\Http\Controllers\KategoriMemberController::class, 'index'])->name('kategori.index');
    // kategori create
    Route::get('/kategori/create', [App\Http\Controllers\KategoriMemberController::class, 'create'])->name('kategori.create');
    // kategori store
    Route::post('/kategori/store', [App\Http\Controllers\KategoriMemberController::class, 'store'])->name('kategori.store');
    // kategori edit
    Route::get('/kategori/edit/{id}', [App\Http\Controllers\KategoriMemberController::class, 'edit'])->name('kategori.edit');
    // Route::get('/kategori/edit/{id}', [App\Http\Controllers\KategoriMemberController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/update/{id}', [App\Http\Controllers\KategoriMemberController::class, 'update'])->name('kategori.update');
    // kategori delete
    Route::delete('/kategori/destroy/{id}', [App\Http\Controllers\KategoriMemberController::class, 'destroy'])->name('kategori.destroy');

    // pengumuman
    Route::get('/pengumuman', [App\Http\Controllers\PengumumanController::class, 'index'])->name('pengumuman');
    // pengumuman create
    Route::get('/pengumuman/create', [App\Http\Controllers\PengumumanController::class, 'create'])->name('pengumuman.create');
    // pengumuman store
    Route::post('/pengumuman/store', [App\Http\Controllers\PengumumanController::class, 'store'])->name('pengumuman.store');
    // route menuju view folder pengumuman file edit
    Route::get('/pengumuman/edit/{id}', [App\Http\Controllers\PengumumanController::class, 'edit'])->name('pengumuman.edit');
    // pengumuman update
    Route::put('/pengumuman/update/{id}', [App\Http\Controllers\PengumumanController::class, 'update'])->name('pengumuman.update');
    // pengumuman delete
    Route::delete('/pengumuman/destroy/{id}', [App\Http\Controllers\PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

    // kegiatan
    Route::get('/kegiatan', [App\Http\Controllers\KegiatanController::class, 'index'])->name('kegiatan');
    // kegiatan create
    Route::get('/kegiatan/create', [App\Http\Controllers\KegiatanController::class, 'create'])->name('kegiatan.create');
    // kegiatan store
    Route::post('/kegiatan/store', [App\Http\Controllers\KegiatanController::class, 'store'])->name('kegiatan.store');
    // kegiatan edit
    Route::get('/kegiatan/edit/{id}', [App\Http\Controllers\KegiatanController::class, 'edit'])->name('kegiatan.edit');
    // kegiatan update
    Route::put('/kegiatan/update/{id}', [App\Http\Controllers\KegiatanController::class, 'update'])->name('kegiatan.update');
    // kegiatan delete
    Route::delete('/kegiatan/destroy/{id}', [App\Http\Controllers\KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

    // barang
    Route::get('/barang', [App\Http\Controllers\BarangController::class, 'index'])->name('barang');
    // barang create
    Route::get('/barang/create', [App\Http\Controllers\BarangController::class, 'create'])->name('barang.create');
    // barang store
    Route::post('/barang/store', [App\Http\Controllers\BarangController::class, 'store'])->name('barang.store');
    // barang edit
    Route::get('/barang/edit/{id}', [App\Http\Controllers\BarangController::class, 'edit'])->name('barang.edit');
    // barang update
    Route::put('/barang/update/{id}', [App\Http\Controllers\BarangController::class, 'update'])->name('barang.update');
    // barang delete
    Route::delete('/barang/destroy/{id}', [App\Http\Controllers\BarangController::class, 'destroy'])->name('barang.destroy');

    // news
    Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');
    // news create
    Route::get('/news/create', [App\Http\Controllers\NewsController::class, 'create'])->name('news.create');
    // news store
    Route::post('/news/store', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store');
    // news edit
    Route::get('/news/edit/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit');
    // news update
    Route::put('/news/update/{id}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
    // news delete
    Route::delete('/news/destroy/{id}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.destroy');
});
