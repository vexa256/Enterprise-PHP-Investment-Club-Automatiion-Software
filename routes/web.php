<?php

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

require_once "hr.php";

require __DIR__ . '/auth.php';

Route::group([
    'prefix' => 'departments',
], function () {
    Route::get('/', 'DepartmentsController@index')
        ->name('departments.departments.index');
    Route::get('/create', 'DepartmentsController@create')
        ->name('departments.departments.create');
    Route::get('/show/{departments}', 'DepartmentsController@show')
        ->name('departments.departments.show');
    Route::get('/{departments}/edit', 'DepartmentsController@edit')
        ->name('departments.departments.edit');
    Route::post('/', 'DepartmentsController@store')
        ->name('departments.departments.store');
    Route::put('departments/{departments}', 'DepartmentsController@update')
        ->name('departments.departments.update');
    Route::delete('/departments/{departments}', 'DepartmentsController@destroy')
        ->name('departments.departments.destroy');
});
