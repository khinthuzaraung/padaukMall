<?php
use App\Mail\Mail;
use Illuminate\Mail\Mailable;
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


Route::get('login',function(){
return view('login');
});

Route::get('reset',function(){
return view('reset');
});

Route::get('register', function () {
    return view('register');
});

Route::get('products', function () {
    return view('products');
});

Route::get('furniture', function () {
    return view('furniture');
});

Route::get('single', function () {
    return view('single');
});

Route::get('short-codes', function () {
    return view('short-codes');
});

Route::get('mail', function () {
    return view('mail');
});

Route::get('checkout', function () {
    return view('checkout');

});




Route::get('/register','Auth\RegisterController@formValidation');//Register Form Validation
Route::post('/register','Auth\RegisterController@formValidationPost');//Register Form Validation
Route::post('login',['as'=> 'login','uses'=>'LoginController@postLogin']);
Route::post('/login','Auth\LoginController@doLogin');
Route::post('login',['as'=> 'login','uses'=>'Auth\LoginController@doLogin']);
Route::get('welcome-mail',['as'=> 'welcome-mail','uses'=>'Auth\RegisterController@welcomeMail']);
//Password reset routes
//Route::get('reset',['as'=>'reset','uses'=>'Auth\ResetPasswordController@getPost']);
//Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('/reset', 'Auth\ResetPasswordController@postEmail');


