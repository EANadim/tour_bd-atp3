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

Route::get('/', function () {
    return redirect()->route('home.index');
});

Route::get('/home','HomeController@index')->name('home.index');
Route::get('/login','LoginController@index')->name('login.index');
Route::get('/article','ArticleController@index')->name('article.index');

Route::post('/article','ArticleController@store');
Route::get('/article/show/{article_id}','ArticleController@show')->name('article.show');
Route::post('/article/show/{article_id}','ArticleController@showCommentStore');

Route::get('/article/myArticlesShow','ArticleController@myArticlesShow')->name('article.myArticlesShow');

Route::get('/article/myArticlesShow/edit/{article_id}','ArticleController@edit')->name('article.edit');
Route::post('/article/myArticlesShow/edit/{article_id}','ArticleController@update');

Route::get('/article/myArticlesShow/delete/{article_id}','ArticleController@delete')->name('article.delete');

Route::get('/logout','LogoutController@index')->name('logout.index');