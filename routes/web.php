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
/*Route::get('/', function() {
        $categories = \App\sub_category::where('parent_id', null)->get();
        return view('pages.index', compact('category'));
    });*/

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
Route::get('register','Auth\RegisterController@GetGender');
Route::post('register','Auth\RegisterController@formValidationPost');

Route::post('register',['as'=>'register','uses'=>'Auth\RegisterController@DoRegister']);

//Route::post('login','Auth\LoginController@doLogin');
Route::post('login',['as'=>'login','uses'=>'Auth\LoginController@doLogin'] );

//Route::get('logout',  'Auth\LoginController@logout');
/*Route::post('login', 'Auth\LoginController@doLogin');

Route::get('logout',  'Auth\LoginController@doLogout');


//Route::get('pages/register','Auth\RegisterController@formValidation');//Register Form Validation
//Route::post('pages/register','Auth\RegisterController@formValidationPost');//Register Form Validation
//Route::post('login',['as'=> 'login','uses'=>'LoginController@postLogin']);
//Route::post('login','Auth\LoginController@doLogin');
//Route::post('login',['as'=> 'login','uses'=>'Auth\LoginController@doLogin']);

Route::get('register','Auth\RegisterController@GetGender');//Register Form Validation
Route::post('register','Auth\RegisterController@formValidationPost');//Register Form Validation
Route::post('register','Auth\RegisterController@DoRegister')
//Route::post('login',['as'=> 'login','uses'=>'LoginController@postLogin']);
//Route::post('login','Auth\LoginController@doLogin');
//Route::post('login',['as'=> 'login','uses'=>'Auth\LoginController@doLogin']);

/*Route::get('welcome-mail',['as'=> 'welcome-mail','uses'=>'Auth\RegisterController@welcomeMail']);
Route::get('forgotten',['as'=>'forgotten','uses'=>'Auth\ForgotPasswordController@getEmail']);
Route::post('forgotten', 'Auth\ForgotPasswordController@postEmail');
Route::get('getcode',['as'=> 'getcode','uses'=>'Auth\ForgotPasswordController@resetPassword']);
Route::get('pwdreset',['as'=>'pwdreset','uses'=>'Auth\ResetPasswordController@rightCode']);
Route::post('pwdreset',['as'=>'pwdreset','uses'=>'Auth\ResetPasswordController@typeCode']);
Route::post('changeresetpwd',['as'=>'changeresetpwd','uses'=>'Auth\ResetPasswordController@changePassword']);
Route::get('logout','Auth\LogoutController@doLogout');*/



