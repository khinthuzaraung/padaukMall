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
return view('pages.index');
});


Route::get('login',function(){
return view('pages.login');
});

Route::get('forgot',function(){
return view('pages.forgot');
});

Route::get('passwordreset',function(){
return view('pages.passwordreset');
});

Route::get('code', function () {
return view('pages.code');

});

Route::get('register', function () {
return view('pages.register');
});

Route::get('products', function () {
return view('pages.products');
});

Route::get('furniture', function () {
return view('pages.furniture');
});

Route::get('single', function () {
return view('pages.single');
});

Route::get('short-codes', function () {
return view('pages.short-codes');
});

Route::get('contact', function () {
return view('pages.contact');
});

Route::get('checkout', function () {
return view('pages.checkout');
});

// route to process the form

Route::post('login', 'Auth\LoginController@doLogin');

Route::get('logout',  'Auth\LoginController@doLogout');

Route::get('pages/register','Auth\RegisterController@formValidation');//Register Form Validation
Route::post('pages/register','Auth\RegisterController@formValidationPost');//Register Form Validation
//Route::post('login',['as'=> 'login','uses'=>'LoginController@postLogin']);
//Route::post('login','Auth\LoginController@doLogin');
//Route::post('login',['as'=> 'login','uses'=>'Auth\LoginController@doLogin']);
Route::get('welcome-mail',['as'=> 'welcome-mail','uses'=>'Auth\RegisterController@welcomeMail']);
//Password reset routes
//Route::get('reset',['as'=>'reset','uses'=>'Auth\ResetPasswordController@getPost']);
//Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

Route::get('forgot',['as'=>'forgot','uses'=>'Auth\ForgotPasswordController@getEmail']);
Route::post('forgot', 'Auth\ForgotPasswordController@postEmail');
Route::get('code',['as'=> 'code','uses'=>'Auth\ForgotPasswordController@resetPassword']);
Route::post('passwordreset',['as'=>'passwordreset','uses'=>'Auth\ResetPasswordController@typeCode']);
Route::post('changeresetpwd',['as'=>'changeresetpwd','uses'=>'Auth\ResetPasswordController@changePassword']);


