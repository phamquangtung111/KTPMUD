<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerAdmin;
use App\Http\Controllers\ControllerEmployee;
use App\Http\Controllers\ControllerTimeKeeping;
use App\Http\Controllers\ControllerSalary;
use App\Http\Controllers\ControllerStatistics;

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
Route::get('/', function () {
    return view('index');
});

Route::get('admin/login', function () {
    return view('login.adminlogin');
});
Route::post('admin/login',[ControllerLogin::class, 'Adminlogin'])->name('Adminlogin');
Route::get('logout',[ControllerLogin::class, 'logout']);

// group Admin
Route::prefix('admin')->group(function () {
    Route::get('home',[ControllerAdmin::class, 'index'])->name('home');

    //Account
    Route::get('account',[ControllerAdmin::class, 'AllUsers'])->name('AllUsers');
    Route::get('account/new',[ControllerAdmin::class, 'viewNewAccount'])->name('viewNewAccount');
    Route::post('account/new',[ControllerAdmin::class, 'saveAccount'])->name('SaveAccount');
    Route::post('account/edit',[ControllerAdmin::class, 'updateAccount'])->name('UpdateAccount');
    Route::get('account/edit_account/{id}',[ControllerAdmin::class, 'editAccount'])->name('ViewEditAccount');
    Route::get('delete/{key}/{id}',[ControllerAdmin::class, 'deleteByKey']);

    //Employee
    Route::get('employee',[ControllerEmployee::class, 'AllEmployees'])->name('AllEmployees');
    Route::get('employee/new',[ControllerEmployee::class, 'viewNewEmployee'])->name('viewNewEmployee');
    Route::post('employee/new',[ControllerEmployee::class, 'saveEmployee'])->name('SaveEmployee');
    Route::post('employee/edit',[ControllerEmployee::class, 'updateEmployee'])->name('UpdateEmployee');
    Route::get('employee/edit_employee/{id}',[ControllerEmployee::class, 'editEmployee'])->name('ViewEditEmployee');

    //timekeeping
    Route::get('timekeeping',[ControllerTimeKeeping::class, 'AllTimeKeeping'])->name('AllTimeKeeping');

    //salary
    Route::get('salary',[ControllerSalary::class, 'AllSalary'])->name('AllSalary');

    Route::get('statistics ',[ControllerStatistics::class, 'AllStatistics'])->name('AllStatistics');

});

Route::get('checkin',[ControllerTimeKeeping::class, 'checkin'])->name('checkin');
