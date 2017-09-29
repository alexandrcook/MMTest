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

Route::get('/', 'IndexController@index')->name('main');

Route::resource('/category', 'CategoryController', [
    'names' => [
        'index' => 'category',
        'show' => 'category.show',
        'edit' => 'category.edit',
        'update' => 'category.upd',
        'destroy' => 'category.del'
    ]
]);

Route::resource('/post', 'PostController', [
    'names' => [
        'index' => 'post',
        'show' => 'post.show',
        'edit' => 'post.edit',
        'update' => 'post.upd',
        'destroy' => 'post.del'
    ]
]);

Route::resource('/comment', 'CommentController', [
    'names' => [
        'index' => 'comment',
        'show' => 'comment.show',
        'edit' => 'comment.edit',
        'update' => 'comment.upd',
        'destroy' => 'comment.del'
]
]);

Route::resource('/session', 'SessionController');
