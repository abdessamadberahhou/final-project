<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\residentController;
use App\Http\Controllers\factureController;
use App\Http\Controllers\batimentController;
use App\Http\Controllers\operatorController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ameliorationController;
use App\Http\Controllers\paymentFactureController;
use App\Http\Controllers\profileController;
use \App\Http\Controllers\printController;
use \App\Http\Controllers\paymentOperateurController;
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

Route::get('/home', function () {
    if (Auth::user())
        return redirect('/dashboard');
    else
        return view('auth.login');
});
Route::get('/', function () {
    if (Auth::user())
        return redirect('/dashboard');
    else
        return redirect('/login');
});
Route::group(['prefix'=>'dashboard'],function (){
    Route::get('/',[dashboardController::class, 'index']);
});
Route::group(['prefix'=>'facture'],function (){
    Route::get('/',[factureController::class,'index']);
    Route::post('/',[factureController::class,'store']);
    Route::get('/create',[factureController::class,'create'])->name('live_search.action');
    Route::get('/search',[factureController::class,'search']);
    Route::get('/{id}',[factureController::class,'show']);
    Route::put('/{id}',[factureController::class,'update']);
    Route::get('/delete/{id}',[factureController::class,'destroy']);
    Route::get('/{id}/edit',[factureController::class,'edit']);
    Route::post('/create', [factureController::class, 'typeAdd']);
    Route::get('/{id}/pay', [factureController::class, 'pay'])->name('facture.pay');
    Route::get('/get_batiment', [factureController::class, 'setApt']);
});
Route::get('/f/createe', [factureController::class, 'addSecType']);

Route::get('/f/del_type/{id}',[factureController::class,'delType']);
Route::get('/f/del_type_sec/{id}',[factureController::class,'delSecType']);


Route::group(['prefix'=>'resident'],function (){
    Route::get('/',[residentController::class,'index']);
    Route::post('/',[residentController::class,'store']);
    Route::get('/create',[residentController::class,'create']);
    Route::get('/search',[residentController::class,'search']);
    Route::get('/{id}',[residentController::class,'show']);
    Route::put('/{id}',[residentController::class,'update']);
    Route::get('/delete/{id}',[residentController::class,'destroy']);
    Route::get('/{id}/edit',[residentController::class,'edit']);
});





Route::group(['prefix'=>'batiment'],function (){
    Route::get('/',[batimentController::class,'index']);
    Route::post('/',[batimentController::class,'store']);
    Route::get('/create',[batimentController::class,'create']);
    Route::get('/search',[batimentController::class,'search']);
    Route::get('/{id}',[batimentController::class,'show']);
    Route::put('/{id}',[batimentController::class,'update']);
    Route::get('/delete/{id}',[batimentController::class,'destroy']);
    Route::get('/{id}/edit',[batimentController::class,'edit']);
});




Route::group(['prefix'=>'operateur'],function (){
    Route::get('/',[operatorController::class,'index']);
    Route::post('/',[operatorController::class,'store']);
    Route::get('/create',[operatorController::class,'create']);
    Route::get('/search',[operatorController::class,'search']);
    Route::get('/{id}',[operatorController::class,'show']);
    Route::put('/{id}',[operatorController::class,'update']);
    Route::get('/delete/{id}',[operatorController::class,'destroy']);
    Route::get('/{id}/edit',[operatorController::class,'edit']);
});



Route::group(['prefix'=>'amelioration'],function (){
    Route::get('/',[ameliorationController::class,'index']);
    Route::post('/',[ameliorationController::class,'store']);
    Route::get('/create',[ameliorationController::class,'create']);
    Route::get('/search',[ameliorationController::class,'search']);
    Route::get('/{id}',[ameliorationController::class,'show']);
    Route::put('/{id}',[ameliorationController::class,'update']);
    Route::get('/delete/{id}',[ameliorationController::class,'destroy']);
    Route::get('/{id}/edit',[ameliorationController::class,'edit']);
});




Route::group(['prefix'=>'payment/facture'],function (){
    Route::get('/',[paymentFactureController::class,'index']);
    Route::post('/',[paymentFactureController::class,'store']);
    Route::get('/create',[paymentFactureController::class,'create']);
    Route::get('/search',[paymentFactureController::class,'search']);
    Route::get('/{id}',[paymentFactureController::class,'show']);
    Route::put('/{id}',[paymentFactureController::class,'update']);
    Route::get('/delete/{id}',[paymentFactureController::class,'destroy']);
    Route::get('/{id}/edit',[paymentFactureController::class,'edit']);
});



Route::group(['prefix'=>'payment/operateur'],function (){
    Route::get('/',[paymentOperateurController::class,'index']);
    Route::post('/',[paymentOperateurController::class,'store']);
    Route::get('/create',[paymentOperateurController::class,'create']);
    Route::get('/search',[paymentOperateurController::class,'search']);
    Route::get('/{id}',[paymentOperateurController::class,'show']);
    Route::put('/{id}',[paymentOperateurController::class,'update']);
    Route::get('/delete/{id}',[paymentOperateurController::class,'destroy']);
    Route::get('/{id}/edit',[paymentOperateurController::class,'edit']);
});




//Route::get('/pay/{id}/checkout',[checkoutController::class ,'pay']);
//Route::post('/pay/{id}/checkout',[checkoutController::class ,'confirm'])->name('checkout.confirm');


Route::group(['prefix'=>'print'], function (){
    Route::get('/fact/{id}',[printController::class, 'printFact']);
    Route::get('/fact',[printController::class, 'index']);
    Route::get('/search',[printController::class, 'search']);
});


Route::group(['prefix'=>'profile'],function (){
    Route::get('/',[profileController::class,'index']);
    Route::get('/edit',[profileController::class,'edit']);
    Route::put('/edit/{id}',[profileController::class,'update']);
    Route::get('/delete/{id}',[profileController::class,'destroy']);
    Route::get('/change_password',[profileController::class,'changePass'])->name('change_password');
    Route::post('/change_password',[profileController::class,'updatePass'])->name('change_password');
});

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/generate/facture',[factureController::class,'generate']);

Route::get('profile/admins',[profileController::class, 'admins']);
Route::get('profile/admins/delete/{id}',[profileController::class, 'deleteAdmin']);
Route::get('profile/admins/add',[profileController::class, 'addAdmin']);
Route::get('profile/admins/modify/{id}',[profileController::class, 'modifyAdmin']);
Route::post('profile/admins/update/{id}',[profileController::class, 'updateAdmin']);
Route::post('profile/admins/add/success',[profileController::class, 'storeAdmin']);
//Auth::routes();
Auth::routes(['register' => false]);


Route::get('selectApt',[residentController::class,'selectApt']);
Route::get('searchDashboardP',[dashboardController::class,'searchDashboardP']);
Route::get('searchDashboardNp',[dashboardController::class,'searchDashboardNp']);
Route::get('setBatimentR',[factureController::class,'setBatimentR']);
Route::get('setApt',[factureController::class,'setApt']);

