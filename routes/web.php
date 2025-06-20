<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

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

Route::get('/', function(){
    return view('home');
});

Route::get('/Category', [RecipeController::class, 'categories']);
Route::get('/Category/{category_name}', [RecipeController::class, 'category']);

Route::get('Meal/Random', [RecipeController::class, 'random']);
Route::get('/Meal/{meal_id}', [RecipeController::class, 'meal']);
