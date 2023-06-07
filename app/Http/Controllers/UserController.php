<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //show registration form 

    public function create (){


        return view ('user.register');
    }


    public function store(request $request){ 

        $formFields=$request->validate([

            'name'=>'required|min:3' ,
            'email'=>'required|unique:users',
            'password' => 'required|min:6|confirmed',
          
        ]);

        //hash paswword
        $formFields['password'] = bcrypt( $formFields['password']);

        //
        //create th euser
      $user =User::create($formFields);
       //login 
       auth()->login($user);
       return redirect('/')->with('message', 'user created successfully');




    }

//logout
    public function logout(request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/')->with('message ', 'you have been logoed out');


    }



    //show login form 
    public function login (){
        return view('user.login');

    }
 // Authenticate User
 public function authenticate(Request $request) {
    $formFields = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
    ]);

    if(auth()->attempt($formFields)) {
        $request->session()->regenerate();

        return redirect('/')->with('message', 'You are now logged in!');
    }

    return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
}

}




