<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LostPassword;
use App\Http\Controllers\Auth\RedirectController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

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

/*########## [ Begin frontEnd route] ##########*/
Route::get('/',[CountryController::class,'homepage'])->name('homepage');;
Route::get('/country-{country_id}',[CountryController::class,'country'])->name('country');
Route::get('/city-{id}',[CityController::class,'city'])->name('city');
/*########## [ End frontEnd route] ##########*/


/*##########  [ Begin helper ]  ########## */
/*
  Utilisation :
  ------------
    return redirect(route('redirect'))->with([
            'message'=> 'Your message here',
            'title'  => 'Title of page',
            'url'    => route( __ name of your route here__ )]);
*/
Route::get('redirect',[RedirectController::class,'redirect'])->name('redirect');
/*##########  [ end helper ]  ########## */



/*########## [ Begin admin route] ##########*/
Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function () {
    Route::view('/', 'admin.dashboard.index')->name('dashboard.index');
    Route::resource('info'     , InfoController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('cities'   , CityController::class);
});
/*########## [ End admin route] ##########*/



/*########## [ Begin auth route] ##########*/
Route::get('register',[RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->name('register.user');
Route::get('login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('login',[LoginController::class,'authenticate'])->name('authenticate');
Route::get('logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');
Route::get('password/reset',[LostPassword::class,'index'])->name('lostpassword')->middleware('guest');
Route::post('password/reset',[LostPassword::class,'reset'])->name('lostpassword.sendemail');
Route::get('password/reset/{token}',[LostPassword::class,'showResetForm'])->name('lostpassword.newpassword');
Route::post('password/update',[LostPassword::class,'updatePassword'])->name('password.update');


// route for password reset Route::get('password/reser/')
/*########## [ end auth route] ##########*/

Route::get('mail', function(){
    return view('mails.mail');
});
