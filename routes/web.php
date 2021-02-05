<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
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
    return view('welcome');
});
Route::get('/index.php/hello', function () {
    return view('hello');
});
Route::get('/world', function () {
    return view('world');
});
Route::get('/dboperations', function () {
    return view('dboperations');
});
Route::post('/operation',[App\Http\Controllers\DBoperationsController::class, 'operations']);
//Route::post('/postworld', [App\Http\Controllers\DemoController::class, 'demo_get']);
//Route::post('/calcrandom', [App\Http\Controllers\RandomController::class, 'calculate_random']);
Route::get('/calcrandom',function () {
    $output=(Str::random($_POST['input']));
    $msg="Random String: ".$output;
    echo "<script>alert('$msg');</script>";
    return redirect('/random');
} );

Route::get('/random', function () {
    return view('random');
});


Route::get('/get/demo/{project?}', function ($project='') {
    if ($project=='yes'){
        return view('projectcreated');
    }
    else{
        return view('noproject');
    }    
});
Route::get('/redirectTest', [App\Http\Controllers\RedirectController::class, 'redirect']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
