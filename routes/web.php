<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\HTTP\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\HTTP\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\HTTP\Middleware\Authenticate;
use App\HTTP\Middleware\Autentikasi;
use App\Models\Pengaduan;
use Dompdf\Dompdf;
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
    return view('welcome');
});

Route::get('/pengaduanadmin', [PengaduanController::class, 'pengaduanadmin'])->middleware('admin');
Route::get('/historyadmin', [PengaduanController::class, 'historyadmin'])->middleware('admin');

Route::get('/pengaduanpetugas', [PengaduanController::class, 'pengaduanpetugas'])->middleware('petugas');
Route::resource('/pengaduan', PengaduanController::class);

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::get('/ngadu', [PengaduanController::class, 'create'])->middleware('masyarakat');
Route::resource('/tanggapan', TanggapanController::class);
Route::resource('/pengaduanadmin', PengaduanController::class)->middleware('admin');

Route::get('/pengaduanpetugas', [PengaduanController::class, 'pengaduanpetugas'])->middleware('petugas');
Route::get('/tanggapanpetugas', [TanggapanController::class, 'tanggapanpetugas'])->middleware('petugas');

Route::resource('/tanggapanadmin', TanggapanController::class)->middleware('admin');
Route::resource('/tanggapan', TanggapanController::class);
Route::get('/petugas', [PetugasController::class, 'index'])->middleware('petugas');




Route::get('pengaduan.approval', [PengaduanController::class, 'approval'])->name('pengaduan.approval');


Route::get('/register', [UserController::class, 'register']);

// route untuk memberikan function store dari RegisterController kepada /register yang mana methodnya POST
Route::post('/register', [UserController::class, 'userstore']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authanticate']);
Route::get('logout', [LoginController::class,'logout']);

Route::resource('/akun', UserController::class)->middleware('admin');
Route::get('/akunmasyarakat', [UserController::class, 'akunmasyarakat'])->name('akunmasyarakat')->middleware('admin');


Route::get('/generateLaporan', function () {
    $history = Pengaduan::all();
    $dompdf = new Dompdf();
    $html = view('admin.pdf', compact('history'))->render();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    return $dompdf->stream('Laporan Pembayaran.pdf');
})->middleware('admin');

Route::put('/approve/{id}', [PengaduanController::class, 'approve'])->name('approve')->middleware('admin');