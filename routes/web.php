<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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



// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  



/******   listings   ******/

//all listings
Route::get('/', [ListingController::class,'index']);
// Show Create Form
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');
// Store Listing Data
Route::post('/listings',[ListingController::class,'store'])->middleware('auth');
//show edit form 
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');
//update a listing
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');
//delete  a listing
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

// single listing always this kind of routes must be in the last to do not interuupt the others
Route::get('/listing/{listing}',[ListingController::class,'show']);




/******   user   ******/
//show registration form
Route ::get('/register',[UserController::class,'create'])->middleware('guest');
// store new user
Route::post('/user',[UserController::class,'store'])->middleware('guest');
// logout
Route::post ('/logout',[UserController::class ,'logout'])->middleware('auth'); 
//show login form
Route::get('/login' ,[UserController::class, 'login'])->name('login')->middleware('guest');
// login user
Route::post('/users/authenticate',[UserController::class,'authenticate'])->middleware('guest');
































/*  learning purpose
//******************************************************************

Route::get('/hello', function ( ) {
    return response('<h1>Hello World</h1>', 200);
       // ->header('Content-Type', 'text/plain')
        //->header('foo', 'bar');
    }); 


Route::get( '/posts/{id}', function ($id){
    
    return response('Post '.$id);
    })->where('id','[0-9]+');



Route::get('/search', function(Request $request){
    //example  use : http://127.0.0.1:8000/search?name=firas&city=soliman
    // dd() function means die & dump  dd($request) ;
    dd($request->name .' '.$request->city);
    });

    *******************************************************************
    */
