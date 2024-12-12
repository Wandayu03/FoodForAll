<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    // untuk show regist form

    //@return \Illuminate\View\View

    public function showRegistForm(){
        return view('register');
    }

    //untuk handle user regist
    // @param \Illuminate\Http\Request $request
    // @return \Illuminate\Http\RedirectResponse

    public function register(Request $request){
        //validate inpur form 

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|string|min:8|same:conPassword', //nyesuain dengan 'name="conPassword"' di register.blade.php
        ]); 

        //kalo gagal validasinya
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        try{
            //buat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //redirect atau ngelakuin aksi lain setelah berhasil
            return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
        } catch(\Exception $e){
            //handle kalo terjadi error
            return back()->with('error', 'Registration failed, please try again.');
        }
    }
}
