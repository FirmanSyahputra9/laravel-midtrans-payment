<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::post('/payment/create', [PaymentController::class, 'createCharge'])
    ->name('payment.create');
