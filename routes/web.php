<?php

use App\Http\Livewire\Admin\Services\Services;
use App\Http\Livewire\Admin\Settings\Email;
use App\Http\Livewire\Admin\Settings\Settings;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Login;
use App\Http\Livewire\PaymentGateways\Flutterwave;
use App\Http\Livewire\PaymentGateways\Stripe;
use App\Http\Livewire\PaymentGateways\Paypal;
use App\Http\Livewire\PaymentGateways\Paystack;
use App\Http\Livewire\PaymentGateways\Razor;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BarcodeGenerator;
use App\Http\Livewire\ShowPosts;
use App\Http\Livewire\Success;
use App\Http\Livewire\BarcodePrintList;

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
Route::get('/barcode-generator', BarcodeGenerator::class);
Route::get('/barcode-print-list', BarcodePrintList::class);

Route::get('/', Login::class);
//Route::get('/dashboard', Dashboard::class);
Route::get('/dashboard',Dashboard::class)->name('admin.dashboard');
Route::group(['prefix'=>'settings'],function(){
    Route::get('/application',Settings::class)->name('admin.settings.application');
    Route::get('/email',Email::class)->name('admin.settings.email');
});
Route::group(['prefix'=>'payment-gateway'],function(){
    Route::get('razorpay',Razor::class)->name('admin.razor');
    Route::get('stripe',Stripe::class)->name('admin.stripe');
    Route::get('paypal',Paypal::class)->name('admin.paypal');
    Route::get('paystack',Paystack::class)->name('admin.paystack');
    Route::get('flutterwave',Flutterwave::class)->name('admin.flutterwave');
});
Route::get('/services',Services::class)->name('admin.services');

Route::get('/test',[Flutterwave::class,'Test'])->name('test');
Route::get('/success',[Flutterwave::class,'success'])->name('success');
Route::get('/success-page',Success::class)->name("success-page");