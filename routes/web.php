<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    	$response = Array(
		"message"=> "Welcome to seejn101maharjan's APIs",
	);
	return response() -> json($response);
});

Route::get('/users', function(){
	return User::all();
});
Route::get('/user/{id}', function($id){
	return response() -> json(
		User::find($id)
		?
		:
		["message"=>"No User Found"]
	);		
});
Route::get('/deleteuser/{id}',[UserController::class, 'delete']);

Route::get('/createuser',[UserController::class, 'create']);