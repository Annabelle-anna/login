<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validator;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    function index(){
        return view('auth/login');
    }
    function checkLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
           ]);
      
           $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
           );
      
           if(Auth::attempt($user_data))
           {
            return redirect('main/successlogin');
           }
           else
           {
            return back()->with('error', 'Wrong Login Details');
           }
      
          }
      
          function successlogin()
          {
           return view('auth/successlogin');
          }
      
          function logout()
          {
           Auth::logout();
           return redirect('main');
    }
}
