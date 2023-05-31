<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/




Route::get('/', function () {
    return view(
       // this is the view 
        'listings',

        [
            'header' => 'latest listings ',

            'listings' =>Listing::all()
            
            /* on a envoyer ceci au Model Listing::all() method 
            [
                [
                    'id' => 1,
                    'title' => 'listing one',
                    'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
                ],
                [
                    'id' => 2,
                    'title' => 'listing two',
                    'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
                ]
            ]
            */
        ]

    );
});

Route::get('listing/{listing}', function(Listing $listing){
   
   return view('listing',[

        'listing'=>$listing
   ]);
    }
);

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
