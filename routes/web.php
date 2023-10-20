<?php

use Illuminate\Support\Facades\Route;

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
	$data = Array(
		"name"=>"seejn",
		"addr"=>"Kathmandu",	
	);
    	$response = Array(
		"data"=>$data,
		"message"=> "API call success",
	);
	return response() -> json($response);
});
