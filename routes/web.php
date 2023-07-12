<?php

use App\Http\Livewire\Admin\Services\Services;
use App\Http\Livewire\Admin\Settings\Email;
use App\Http\Livewire\Admin\Settings\Settings;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Login;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\ShowPosts;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Login::class);
//Route::get('/dashboard', Dashboard::class);
Route::get('/dashboard',Dashboard::class)->name('admin.dashboard');
Route::group(['prefix'=>'settings'],function(){
    Route::get('/application',Settings::class)->name('admin.settings.application');
    Route::get('/email',Email::class)->name('admin.settings.email');
});
Route::get('/services',Services::class)->name('admin.services');