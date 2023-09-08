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
        return view('userHome', compact('user'));
    }
    public function showL(Request $request){
        $user=User::where('email','=',$request->email)->where('password','=',$request->password)->get();
        if($user){
            return redirect()->route('userHome.show', $user->get(0));
        }

    }
    public function showP($id){
        $user=User::find($id);
        return view('profile', compact('user'));
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();


        $request->image->move(public_path('images'), $imageName);

        $user = User::create($request->except(['_token', '_method']));
        $user->update([
            'image' => $imageName,
        ]);
        return redirect()->route('userHome.show', $user->id);

    }
}
