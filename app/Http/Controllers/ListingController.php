<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // show listings
    public function index()
    {
        return view(
            // this is the view 
            'listings',
            [
                'listings' => Listing::all()
            ]
        );
    }
// show single listing 
    public function show(Listing $listing ){
        return view('listing',[

            'listing'=>$listing,
       ]);        
    }





}

