<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');
    }

    

    /**
     * Show the form for editing the specified resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(){
        
        //return view('pages/my-profile')->with('user',auth()->user());
    }
  
    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Resource $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->id()],
            'password' => ['sometimes','nullable', 'string', 'min:8', 'confirmed'],
        ]);
        $user = auth()->user();
        $input = $request->except('password','password_confirmation');
        if(! $request->filled('password')){
            $user->fill($input)->save();
            return back()->with('success_message', 'profile not update');
        }
        $user->password = bcrypt($request->password);
        $user->fill($input)->save();
        return back()->with('success_message', 'profile and password updated successfully');
       
    }
}
