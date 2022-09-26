<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;

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

Route::get('/',[categoryController::class,'index']);
Route::get('/category-create',[categoryController::class,'create']);

Route::post('/category-store',[categoryController::class,'store']);

Route::get('/category-edit/{id}',[categoryController::class,'edit']); ///category-edit/{id} its mean when we click on edit button then this url run and call the edit function and id pass to the edit function

Route::put('/category-update/{id}',[categoryController::class,'update']);

Route::get('/category-delete/{id}',[categoryController::class,'delete']);


// Route::get('/testing', function () {
//     return view('test');
// });
// // access file in a folder that is exist in view folder
// Route::get('/categories', function () {
//     return view('categories.list');
//     // folderName.fileName
// });