<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Card API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your card. These routes
| are loaded by the ServiceProvider of your card. You're free to add
| as many additional routes to this file as your card may require.
|
*/

Route::get('/statusTestEndpoint', function (Request $request) {

    $arrStatus=array('pass','fail','other','unknown');

    return response([
        'status'=> $arrStatus[array_rand($arrStatus)],
        'message'=> 'This is a Test Message'
    ]);
});