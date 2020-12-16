<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MvimController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\BottomController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
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

//進入網站的首頁
Route::get('/', function () {
    return view('home');
});

// 進入到admin頁面直接導到admin/title
Route::redirect('/admin', '/admin/title');

// 後台功能路由定義
Route::prefix('admin')->group(function () {
    // get
    Route::get('/title', [TitleController::class, 'index']);
    Route::get('/ad', [AdController::class, 'index']);
    Route::get('/image', [ImageController::class, 'index']);
    Route::get('/mvim', [MvimController::class, 'index']);
    Route::get('/total', [TotalController::class, 'index']);
    Route::get('/bottom', [BottomController::class, 'index']);
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/menu', [MenuController::class, 'index']);
    // post
    Route::post('/title', [TitleController::class, 'store']);
    Route::post('/ad', [AdController::class, 'store']);
    Route::post('/image', [ImageController::class, 'store']);
    Route::post('/mvim', [MvimController::class, 'store']);
    Route::post('/news', [NewsController::class, 'store']);
    Route::post('/admin', [AdminController::class, 'store']);
    Route::post('/menu', [MenuController::class, 'store']);

    // edit
    Route::patch('/title/{id}', [TitleController::class, 'update']);
});

// 後台功能的Modal彈跳視窗路由
Route::get('/modals/addTitle', [TitleController::class, 'create']);
Route::get('/modals/addAd', [AdController::class, 'create']);
Route::get('/modals/addImage', [ImageController::class, 'create']);
Route::view('/modals/addMvim', 'modals.base_modal', ['modal_header' => '新增動畫圖片']);
Route::view('/modals/addNews', 'modals.base_modal', ['modal_header' => '新增最新消息']);
Route::view('/modals/addAdmin', 'modals.base_modal', ['modal_header' => '新增管理者']);
Route::view('/modals/addMenu', 'modals.base_modal', ['modal_header' => '新增選單']);


//Edit使用
Route::get('/modals/title/{id}', [TitleController::class, 'edit']);
