<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function dashboard(){
        $users = User::where('id','!=',auth()->user()->id)->get();
        return view('dashboard',compact('users'));
    }

    public function index(){
        return view('chat');
    }
    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer'],
            'gender' => ['required', 'string'],
            'country' => ['required', 'string'],
        ]);

       $user = new User();
       $user->name = $request->name;
       $user->age = $request->age;
       $user->gender = $request->gender;
       $user->country = $request->country;
       $user->save();
       Auth::guard()->login($user);
        return redirect('/chat');
    }

    public function chat($id){
        dd($id);
    }
}
