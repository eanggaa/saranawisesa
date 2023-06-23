<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\EprocController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ComproController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DireksiController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\KomisarisController;
use App\Http\Controllers\NewComproController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\JadwalLelangController;
use App\Http\Controllers\Pengadaan0002Controller;
use App\Http\Controllers\JenisPengadaanController;
use App\Http\Controllers\ProdukDanLayananController;
use App\Http\Controllers\TandaDaftarUsahaController;
use App\Http\Controllers\ProfilePerusahaanController;
use App\Http\Controllers\PengurusBadanUsahaController;
use App\Http\Controllers\PenunjukanLangsungController;
use App\Http\Controllers\SubprodukDanLayananController;
use App\Http\Controllers\Pages\EprocController as Eproc;
use App\Http\Controllers\Pages\ComproController as Compro;
use App\Http\Controllers\AktaPendirianPerusahaanController;
use App\Http\Controllers\DataPersonaliaController;
use App\Http\Controllers\SusunanKepemilikanSahamController;

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

Route::get('/bM2cA4MsdHD5pkzdVEg6', function(){
  Artisan::call('migrate:fresh');
});

Route::get('/pnmGhdBEHaBxhPzh6cA4', function(){
  Artisan::call('db:seed');
});

Route::get('/', [ComproController::class, 'index'])->name('index');
Route::get('/profile-perusahaan', [ComproController::class, 'profile_perusahaan'])->name('profile-perusahaan');
Route::get('/produk-dan-layanans', [ComproController::class, 'produk_dan_layanans'])->name('produk-dan-layanans');
Route::get('/produk-dan-layanan/{id}', [ComproController::class, 'produk_dan_layanan'])->name('produk-dan-layanan');
Route::get('/portofolios', [ComproController::class, 'portofolios'])->name('portofolios');
Route::get('/portofolio/{id}', [ComproController::class, 'portofolio'])->name('portofolio');
Route::get('/artikels', [ComproController::class, 'artikels'])->name('artikels');
Route::get('/artikel/{id}', [ComproController::class, 'artikel'])->name('artikel');

Route::prefix('compro')->name('compro.')->group(function(){
  Route::middleware(['web'])->group(function(){
    Route::middleware(['logged_in'])->group(function(){
      Route::get('/login', [ComproController::class, 'login'])->name('login');
      Route::post('/postlogin', [ComproController::class, 'postlogin'])->name('postlogin');
    });
    Route::get('/logout', [ComproController::class, 'logout'])->name('logout');
  });

  Route::prefix('superadmin')->name('superadmin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'compro', 'superadmin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('akun', AkunController::class);
      Route::get('profile-perusahaan', [ProfilePerusahaanController::class, 'index'])->name('profile-perusahaan.index');
      Route::get('profile-perusahaan/{id}/edit', [ProfilePerusahaanController::class, 'edit'])->name('profile-perusahaan.edit');
      Route::put('profile-perusahaan/{id}', [ProfilePerusahaanController::class, 'update'])->name('profile-perusahaan.update');
      Route::resource('portofolio', PortofolioController::class);
      Route::resource('artikel', ArtikelController::class);
      Route::get('export', [ArtikelController::class, 'export'])->name('export');
      Route::post('import', [ArtikelController::class, 'import'])->name('import');
      Route::get('pdf', [ArtikelController::class, 'pdf'])->name('pdf');
      Route::resource('direksi', DireksiController::class);
      Route::resource('komisaris', KomisarisController::class);
      Route::resource('setting', SettingController::class);
      Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
      Route::get('survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      Route::resource('produk-dan-layanan', ProdukDanLayananController::class);
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan', [SubprodukDanLayananController::class, 'index'])->name('subproduk-dan-layanan.index');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/create', [SubprodukDanLayananController::class, 'create'])->name('subproduk-dan-layanan.create');
      Route::post('{produk_dan_layanan_id}/subproduk-dan-layanan/store', [SubprodukDanLayananController::class, 'store'])->name('subproduk-dan-layanan.store');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'show'])->name('subproduk-dan-layanan.show');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}/edit', [SubprodukDanLayananController::class, 'edit'])->name('subproduk-dan-layanan.edit');
      Route::put('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'update'])->name('subproduk-dan-layanan.update');
      Route::delete('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'destroy'])->name('subproduk-dan-layanan.destroy');
    });
  });

  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'compro', 'admin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::get('profile-perusahaan', [ProfilePerusahaanController::class, 'index'])->name('profile-perusahaan.index');
      Route::get('profile-perusahaan/{id}/edit', [ProfilePerusahaanController::class, 'edit'])->name('profile-perusahaan.edit');
      Route::put('profile-perusahaan/{id}', [ProfilePerusahaanController::class, 'update'])->name('profile-perusahaan.update');
      Route::resource('portofolio', PortofolioController::class);
      Route::resource('artikel', ArtikelController::class);
      Route::get('export', [ArtikelController::class, 'export'])->name('export');
      Route::post('import', [ArtikelController::class, 'import'])->name('import');
      Route::get('pdf', [ArtikelController::class, 'pdf'])->name('pdf');
      Route::resource('direksi', DireksiController::class);
      Route::resource('komisaris', KomisarisController::class);
      Route::resource('setting', SettingController::class);
      Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
      Route::get('survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      Route::resource('produk-dan-layanan', ProdukDanLayananController::class);
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan', [SubprodukDanLayananController::class, 'index'])->name('subproduk-dan-layanan.index');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/create', [SubprodukDanLayananController::class, 'create'])->name('subproduk-dan-layanan.create');
      Route::post('{produk_dan_layanan_id}/subproduk-dan-layanan/store', [SubprodukDanLayananController::class, 'store'])->name('subproduk-dan-layanan.store');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'show'])->name('subproduk-dan-layanan.show');
      Route::get('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}/edit', [SubprodukDanLayananController::class, 'edit'])->name('subproduk-dan-layanan.edit');
      Route::put('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'update'])->name('subproduk-dan-layanan.update');
      Route::delete('{produk_dan_layanan_id}/subproduk-dan-layanan/{id}', [SubprodukDanLayananController::class, 'destroy'])->name('subproduk-dan-layanan.destroy');
    });
  });

  Route::prefix('creator')->name('creator.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'compro', 'creator'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('artikel', ArtikelController::class);
      Route::get('export', [ArtikelController::class, 'export'])->name('export');
      Route::post('import', [ArtikelController::class, 'import'])->name('import');
      Route::get('pdf', [ArtikelController::class, 'pdf'])->name('pdf');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
    });
  });

  Route::prefix('helpdesk')->name('helpdesk.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'compro', 'helpdesk'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
      Route::get('survey/{id}', [SurveyController::class, 'show'])->name('survey.show');
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
    });
  });
});

Route::prefix('eproc')->name('eproc.')->group(function(){

  Route::middleware(['web'])->group(function(){
    Route::middleware(['logged_in'])->group(function(){
      Route::get('/login', [EprocController::class, 'login'])->name('login');
      Route::post('/post-login', [EprocController::class, 'postLogin'])->name('post-login');
    });
    Route::get('/logout', [EprocController::class, 'logout'])->name('logout');
    Route::get('/register', [EprocController::class, 'register'])->name('register');
    Route::post('/post-register', [EprocController::class, 'postRegister'])->name('post-register');
    Route::get('/verifikasi', [EprocController::class, 'verifikasi'])->name('verifikasi');

    Route::get('/index', [EprocController::class, 'index'])->name('index');
    Route::get('/pengadaan', [EprocController::class, 'pengadaan'])->name('pengadaan');
    Route::get('/pengadaan/{id}', [EprocController::class, 'pengadaan2'])->name('pengadaan2');
    Route::get('/ikuti-pengadaan/{id}', [EprocController::class, 'ikutiPengadaan'])->name('ikuti-pengadaan');
    Route::post('/post-lampiran', [EprocController::class, 'postLampiran'])->name('post-lampiran');
    Route::get('/berita-tentang-pengadaan', [EprocController::class, 'berita_tentang_pengadaan'])->name('berita-tentang-pengadaan');
    Route::get('/berita-tentang-pengadaan/{id}', [EprocController::class, 'berita_tentang_pengadaan2'])->name('berita-tentang-pengadaan2');
    Route::get('/kontak', [EprocController::class, 'kontak'])->name('kontak');
  });

  Route::prefix('superadmin')->name('superadmin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'superadmin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('perusahaan', PerusahaanController::class);
      Route::resource('akun', AkunController::class);
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      Route::resource('berita', BeritaController::class);
      Route::get('export', [BeritaController::class, 'export'])->name('export');
      Route::post('import', [BeritaController::class, 'import'])->name('import');
      Route::get('pdf', [BeritaController::class, 'pdf'])->name('pdf');
      Route::resource('lelang', LelangController::class);
      Route::resource('jenis-pengadaan', JenisPengadaanController::class);
      Route::resource('penunjukan-langsung', PenunjukanLangsungController::class);
      Route::get('{lelang_id}/jadwal-lelang', [JadwalLelangController::class, 'index'])->name('jadwal-lelang.index');
      Route::get('{lelang_id}/jadwal-lelang/create', [JadwalLelangController::class, 'create'])->name('jadwal-lelang.create');
      Route::post('{lelang_id}/jadwal-lelang/store', [JadwalLelangController::class, 'store'])->name('jadwal-lelang.store');
      Route::get('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'show'])->name('jadwal-lelang.show');
      Route::get('{lelang_id}/jadwal-lelang/{id}/edit', [JadwalLelangController::class, 'edit'])->name('jadwal-lelang.edit');
      Route::put('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'update'])->name('jadwal-lelang.update');
      Route::delete('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'destroy'])->name('jadwal-lelang.destroy');
      Route::get('{lelang_id}/peserta', [PesertaController::class, 'index'])->name('peserta.index');
      Route::get('{lelang_id}/peserta/{id}', [PesertaController::class, 'show'])->name('peserta.show');
      Route::put('{lelang_id}/peserta/{id}', [PesertaController::class, 'pemenang'])->name('peserta.pemenang');
    });
  });

  Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'admin'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('perusahaan', PerusahaanController::class);
      Route::get('profile', [Controller::class, 'profile'])->name('profile');
      Route::put('postprofile', [Controller::class, 'postprofile'])->name('postprofile');
      Route::resource('berita', BeritaController::class);
      Route::get('export', [BeritaController::class, 'export'])->name('export');
      Route::post('import', [BeritaController::class, 'import'])->name('import');
      Route::get('pdf', [BeritaController::class, 'pdf'])->name('pdf');
      Route::resource('lelang', LelangController::class);
      Route::get('/perusahaan', [Eproc::class, 'index'])->name('perusahaan.index');
      Route::get('/perusahaan/{id}', [Eproc::class, 'show'])->name('perusahaan.show');
      Route::resource('jenis-pengadaan', JenisPengadaanController::class);
      Route::resource('penunjukan-langsung', PenunjukanLangsungController::class);
      Route::get('{lelang_id}/jadwal-lelang', [JadwalLelangController::class, 'index'])->name('jadwal-lelang.index');
      Route::get('{lelang_id}/jadwal-lelang/create', [JadwalLelangController::class, 'create'])->name('jadwal-lelang.create');
      Route::post('{lelang_id}/jadwal-lelang/store', [JadwalLelangController::class, 'store'])->name('jadwal-lelang.store');
      Route::get('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'show'])->name('jadwal-lelang.show');
      Route::get('{lelang_id}/jadwal-lelang/{id}/edit', [JadwalLelangController::class, 'edit'])->name('jadwal-lelang.edit');
      Route::put('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'update'])->name('jadwal-lelang.update');
      Route::delete('{lelang_id}/jadwal-lelang/{id}', [JadwalLelangController::class, 'destroy'])->name('jadwal-lelang.destroy');
      Route::get('{lelang_id}/peserta', [PesertaController::class, 'index'])->name('peserta.index');
      Route::get('{lelang_id}/peserta/{id}', [PesertaController::class, 'show'])->name('peserta.show');
      Route::put('{lelang_id}/peserta/{id}', [PesertaController::class, 'pemenang'])->name('peserta.pemenang');
    });
  });

  Route::prefix('perusahaan')->name('perusahaan.')->group(function(){
    Route::middleware(['auth:web', 'disable_back_button', 'eproc', 'perusahaan'])->group(function(){
      Route::get('/dashboard', function(){return view('pages.dashboard');})->name('dashboard');
      Route::resource('pengadaan', Pengadaan0002Controller::class);

      Route::get('{user_id}/administrasi/edit', [AdministrasiController::class, 'edit'])->name('administrasi.edit');
      Route::put('{user_id}/administrasi', [AdministrasiController::class, 'update'])->name('administrasi.update');

      Route::get('{user_id}/akta-pendirian-perusahaan/', [AktaPendirianPerusahaanController::class, 'index'])->name('akta-pendirian-perusahaan.index');
      Route::get('{user_id}/akta-pendirian-perusahaan/create', [AktaPendirianPerusahaanController::class, 'create'])->name('akta-pendirian-perusahaan.create');
      Route::post('{user_id}/akta-pendirian-perusahaan/store', [AktaPendirianPerusahaanController::class, 'store'])->name('akta-pendirian-perusahaan.store');
      Route::get('{user_id}/akta-pendirian-perusahaan/{id}', [AktaPendirianPerusahaanController::class, 'show'])->name('akta-pendirian-perusahaan.show');
      Route::get('{user_id}/akta-pendirian-perusahaan/{id}/edit', [AktaPendirianPerusahaanController::class, 'edit'])->name('akta-pendirian-perusahaan.edit');
      Route::put('{user_id}/akta-pendirian-perusahaan/{id}', [AktaPendirianPerusahaanController::class, 'update'])->name('akta-pendirian-perusahaan.update');
      Route::delete('{user_id}/akta-pendirian-perusahaan/{id}', [AktaPendirianPerusahaanController::class, 'destroy'])->name('akta-pendirian-perusahaan.destroy');

      Route::get('{user_id}/pengurus-badan-usaha/', [PengurusBadanUsahaController::class, 'index'])->name('pengurus-badan-usaha.index');
      Route::get('{user_id}/pengurus-badan-usaha/create', [PengurusBadanUsahaController::class, 'create'])->name('pengurus-badan-usaha.create');
      Route::post('{user_id}/pengurus-badan-usaha/store', [PengurusBadanUsahaController::class, 'store'])->name('pengurus-badan-usaha.store');
      Route::get('{user_id}/pengurus-badan-usaha/{id}', [PengurusBadanUsahaController::class, 'show'])->name('pengurus-badan-usaha.show');
      Route::get('{user_id}/pengurus-badan-usaha/{id}/edit', [PengurusBadanUsahaController::class, 'edit'])->name('pengurus-badan-usaha.edit');
      Route::put('{user_id}/pengurus-badan-usaha/{id}', [PengurusBadanUsahaController::class, 'update'])->name('pengurus-badan-usaha.update');
      Route::delete('{user_id}/pengurus-badan-usaha/{id}', [PengurusBadanUsahaController::class, 'destroy'])->name('pengurus-badan-usaha.destroy');

      Route::get('{user_id}/tanda-daftar-usaha/edit', [TandaDaftarUsahaController::class, 'edit'])->name('tanda-daftar-usaha.edit');
      Route::put('{user_id}/tanda-daftar-usaha', [TandaDaftarUsahaController::class, 'update'])->name('tanda-daftar-usaha.update');

      Route::get('{user_id}/susunan-kepemilikan-saham/', [SusunanKepemilikanSahamController::class, 'index'])->name('susunan-kepemilikan-saham.index');
      Route::get('{user_id}/susunan-kepemilikan-saham/create', [SusunanKepemilikanSahamController::class, 'create'])->name('susunan-kepemilikan-saham.create');
      Route::post('{user_id}/susunan-kepemilikan-saham/store', [SusunanKepemilikanSahamController::class, 'store'])->name('susunan-kepemilikan-saham.store');
      Route::get('{user_id}/susunan-kepemilikan-saham/{id}', [SusunanKepemilikanSahamController::class, 'show'])->name('susunan-kepemilikan-saham.show');
      Route::get('{user_id}/susunan-kepemilikan-saham/{id}/edit', [SusunanKepemilikanSahamController::class, 'edit'])->name('susunan-kepemilikan-saham.edit');
      Route::put('{user_id}/susunan-kepemilikan-saham/{id}', [SusunanKepemilikanSahamController::class, 'update'])->name('susunan-kepemilikan-saham.update');
      Route::delete('{user_id}/susunan-kepemilikan-saham/{id}', [SusunanKepemilikanSahamController::class, 'destroy'])->name('susunan-kepemilikan-saham.destroy');

      Route::get('{user_id}/data-personalia/', [DataPersonaliaController::class, 'index'])->name('data-personalia.index');
      Route::get('{user_id}/data-personalia/create', [DataPersonaliaController::class, 'create'])->name('data-personalia.create');
      Route::post('{user_id}/data-personalia/store', [DataPersonaliaController::class, 'store'])->name('data-personalia.store');
      Route::get('{user_id}/data-personalia/{id}', [DataPersonaliaController::class, 'show'])->name('data-personalia.show');
      Route::get('{user_id}/data-personalia/{id}/edit', [DataPersonaliaController::class, 'edit'])->name('data-personalia.edit');
      Route::put('{user_id}/data-personalia/{id}', [DataPersonaliaController::class, 'update'])->name('data-personalia.update');
      Route::delete('{user_id}/data-personalia/{id}', [DataPersonaliaController::class, 'destroy'])->name('data-personalia.destroy');
    });
  });
});