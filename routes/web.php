<?php

use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect('/login');
});

Route::view('/login', 'login')->name('login');

Route::post('/login', function(){
    $credentials = request()->only('email', 'password');

    if( Auth::attempt( $credentials ))
    {
        request()->session()->regenerate(); //para regenerar la sesion del usuario y evitar vulnerabilidad (session fixation)
        return redirect('vouchers');
    }
    return redirect('login')
            ->with(['menssage'=>'El usuario y/o contraseña no coinciden. Inténtelo nuevamente']);
});

Route::get('/vouchers', [VoucherController::class, 'index'])->middleware('auth');
Route::post('/vouchers', [VoucherController::class, 'search'])->middleware('auth');
Route::get('/vouchers/excel', [VoucherController::class, 'excelExport'])->middleware('auth');
