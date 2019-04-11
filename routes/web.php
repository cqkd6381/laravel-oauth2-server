<?php

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
use Illuminate\Http\Request;

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('reg','Auth\RegisterController@reg')->name('reg');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/maketoken', function () {

    $user = App\User::find(1);

    $token = $user->createToken('Personal Test Client', ['check-status'])->accessToken;

    echo 'AccessToken：' . $token;
});

//检查任意作用域scope: 只要包含其中任意一个就通过
//检查所有作用域scopes: 必须包含全部的才能通过
Route::get('/user', function (Request $request) {

    //检查令牌实例上的作用域
    if ($request->user()->tokenCan('user')) {
        return $request->user();
    }
})->middleware('auth:api', 'scope:user');

Route::resource('users','UserController');
