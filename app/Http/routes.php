
<?php
Route::get('/', 'TaskController@index'); //afisare lista sarcini pe pagina de start

Route::resource('tasks', 'TaskController');// Ruta de resurse va genera CRUD URI 
Route::resource('nerds', 'NerdController');
Route::get('nerds', [
 'as' => 'nerd',
 'uses' => 'NerdController@index'
]); 
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to |
and give it the controller to call when that URI is requested. |
*/
// Authentication routes...
//Route::auth();
Route::get('login', 'Front@login');
Route::post('login', 'Front@authenticate');
//Route::get('auth/logout', 'Front@logout');
// Registration routes...
//Route::post('/register', 'Front@register');
//Route::get('/', 'WelcomeController@index');
//Route::get('contact','WelcomeController@contact');
//Route::get('about','PagesController@about');
//Route::auth();
//Route::get('/home', 'HomeController@index');

//Route::resource('articles', 'ArticlesController');
//Route::get('articles','ArticlesController@index');
//Route::get('articles/create','ArticlesController@create');
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/{id}','ArticlesController@show');
//Route::resource('articles', 'ArticlesController@index');
Route::get('articles', [
 'as' => 'article',
 'uses' => 'ArticlesController@index'
]);
//Route::group(['middleware' => 'auth'], function () {
//Route::auth();
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister'); 
Route::auth(); 
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'HomeController@getLogout');
Route::resource('nerds', 'NerdController');
Route::get('nerds', [
 'as' => 'nerd',
 'uses' => 'NerdController@index'
]);
Route::get('/', 'TaskController@index');
Route::group(['middleware' => 'auth'], function(){
Route::resource('tasks', 'TaskController');
});
//} 
Route::group(['middleware' => 'auth'], function(){
Route::get('/about', 'AboutController@index');
 Route::get('/home', 'HomeController@index');
}); 