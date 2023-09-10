<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users=User::get();

    }

    public function show($id){
        $user=User::find($id);
        return view('user.userHome', compact('user'));
    }
    public function showL(Request $request){
        $user=User::where('email','=',$request->email)->where('password','=',$request->password)->get();
        $id=$user->get(0);
        if($user){
            return redirect()->route('userHome.show', $id);
        }

    }
    public function showP($id){
        $user=User::find($id);
        return view('user.profile', compact('user'));
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=> 'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        try{
        $user = User::create($request->except(['_token', '_method']));
        $imageName = time() . '.' . $request->image->extension();


        $request->image->move(public_path('images'), $imageName);


        $user->update([
            'image' => $imageName,
        ]);
        return redirect()->route('userHome.show', $user->id);
    }catch(\Throwable $th){
        return view('user.register');
    }

    }
    public function logout(){

        return view('user.login');
    }
}
