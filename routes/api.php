<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//user
Route::get('magazine/users', 'userController@getUsers')->name('getUsers');
Route::get('magazine/users/{id}', 'userController@getUserId')->name('getUserId');
Route::post('magazine/users', 'userController@addUser')->name('addUser');
Route::put('magazine/users/{id}', 'userController@updateUsers')->name('updateUsers');
Route::delete('magazine/users/{id}', 'userController@deleteUser')->name('deleteUser');

//categorie
Route::get('magazine/categorie', 'categoriController@getAllCategories')->name('getAllCategories');
Route::get('magazine/categorie/{id}', 'categoriController@getCategorie')->name('getCategorie');
Route::post('magazine/categorie','categoriController@addCategorie')->name('addCategorie');
Route::put('magazine/categorie/{id}', 'categoriController@updateCategorie')->name('updateCategorie');
Route::delete('magazine/categorie/{id}', 'categoriController@deteteCategorie')->name('deleteCategorie');

//tag
Route::get('magazine/tag', 'tagsController@getAllTags')->name('getAllTags');
Route::get('magazine/tag/{id}', 'tagsController@getTag')->name('getTag');
Route::post('magazine/tag', 'tagsController@addTag')->name('addTag');
Route::put('magazine/tag/{id}', 'tagsController@updateTag')->name('updateTag');
Route::delete('magazine/tag/{id}', 'tagsController@deleteTag')->name('deleteTag');

//article
Route::get('magazine/article', 'articleController@getAllArticles')->name('getAllArticles');
Route::get('magazine/article/{id}', 'articleController@getArticle')->name('getArticle');
Route::post('magazine/article', 'articleController@addArticles')->name('addArticles');
Route::put('magazine/article/{id}', 'articleController@updateArticle')->name('updateArticle');
Route::delete('magazine/article/{id}', 'articleController@deleteArticles')->name('deleteArticles');

//image
Route::get('magazine/image', 'imagesController@getImages')->name('getImages');
Route::get('magazine/image/{id}', 'imagesController@getImage')->name('getImage');
Route::post('magazine/image', 'imagesController@addImage')->name('addImage');
Route::put('magazine/image/{id}', 'imagesController@updateImage')->name('updateImage');
Route::delete('magazine/image/{id}', 'imagesController@deleteImage')->name('deleteImage');