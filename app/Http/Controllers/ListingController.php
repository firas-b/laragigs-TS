<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show listings
    public function index()
    {
        //dd(request()->tag);//oudd(request('tag'))
        return view(

            'listings.index',
            [
                // we can sue the get() function instaedc of paginate  to show all the listings without pagnition
                'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6),
            ]
        );
    }
    // show single listing 
    public function show(Listing $listing)
    {
        return view('listings.show', [

            'listing' => $listing,
        ]);
    }
    
    public function create()
    {

        return view('listings.create');
    }
   
       // Store Listing Data
       public function store(Request $request) {
      
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
             $formFields['logo'] = $request->file('logo')->store('logos', 'public');
         }

    //    $formFields['user_id'] = auth()->id();
         
       Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
}
