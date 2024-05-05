<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\emailMailable;
use Illuminate\Support\Facades\Mail;
use Session;
class userController extends Controller
{
    public function register(){
        return view("register");

    }
    public function postForm(Request $request){
        $val = $request -> validate([
            'full_name' => 'required|string',
            'user_name' => 'required|unique:users,user_name',
            'birthdate' => 'required|date_format:Y-m-d',
            'phone' => 'required',
            'address' => 'required',
            // MyP@ssw0rd
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,}$/',
            'user_image' => 'required',
            'email' => 'required|email',
            ],);
        // Handle the image upload
        // $imageName = '';
        // if ($request->hasFile('user_image')) {
        //     $image = $request->file('user_image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $imageName);
        // }

        $user = new User();
        $user -> full_name = $request -> full_name;
        $user -> user_name = $request -> user_name;
        $user -> birthdate = $request -> birthdate;
        $user -> phone = $request -> phone;
        $user -> address = $request -> address;
        $user -> password = hash::make($request -> password);
        $user -> user_image = $request -> user_image;
        $user -> email = $request -> email;

        if ($user -> save()) {
            session()->flash('message', 'User added successfully!');
        }else{
            session()->flash('message', 'User not added');

        }

        Mail::to('2efd262b3d-e98679@inbox.mailtrap.io')->send(new emailMailable($user));
        return redirect("/register")->with('success', 'Registration successful!');
    }
}
