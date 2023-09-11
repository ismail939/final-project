<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

    }

    public function show($id)
    {
        $user = User::find($id);
        $products = Product::get();
        $order_id = -1;
        return view('user.userHome', compact('user', 'products', 'order_id'));
    }
    public function showL(Request $request)
    {

        $user = User::where('email', '=', $request->email)->where('password', '=', $request->password)->get();
        $id = $user->get(0);
        if ($user) {
            $request->session()->put('user', $id);
            return redirect()->route('userHome.show', $id);
        }

    }
    public function showP($id)
    {
        $user = User::find($id);
        return view('user.profile', compact('user'));
    }

    public function showWithOrder($id)
    {
        $user = User::find($id);
        $products = Product::get();
        $order = Order::create(['user_id' => $id]);
        $order_id = $order->id;
        return view('user.userHome', compact('user', 'products', 'order_id'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        try {
            $user = User::create($request->except(['_token', '_method']));
            $imageName = time() . '.' . $request->image->extension();


            $request->image->move(public_path('images'), $imageName);


            $user->update([
                'image' => $imageName,
            ]);
            return redirect()->route('userHome.show', $user->id);
        } catch (\Throwable $th) {
            return view('user.register');
        }

    }
    public function logout(Request $request)
    {
        $request->session()->put('user', null);
        $request->session()->put('cart', null);
        return view('user.login');
    }
    public function addCredit()
    {
        return view('user.addCredit');
    }
    public function addCreditFinish(Request $request, $id)
    {
        $user = User::find($id);
        $newCredit = $request->credit + $user->credit;
        $user->update(
            [
                'credit' => $newCredit,
            ]
        );
    }
}
