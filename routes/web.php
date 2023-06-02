<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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


//all listings
Route::get('/', [ListingController::class,'index']);

// single listing
Route::get('listing/{listing}',[ListingController::class,'show']);



































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
