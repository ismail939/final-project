<?php

namespace App\Http\Controllers;

use App\Models\Orderproduct;
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
        if(!Session::get('user')){
            return redirect()->route('login');
        }
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
            $request->session()->put('cart', null);
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
        // dd(Session::get('cart'));
        $newCredit = $request->input('credit') + $user->credit;
        // dd($newCredit);
        $user=Session::get('user');
        $user['credit']=(float)$newCredit;
        $request->session()->put('user', $user);
        $user=User::find($user['id']);
        // dd($user);
        $newCredit=(float)$newCredit;
        $user->update([
            'credit'=>$newCredit,
        ]);
        // dd($user->credit);
        return view('user.addCredit');
    }
    public function checkoutFinish(Request $request, $id){
        // check if credit is less than cart total
        if(Session::get('user')['credit']<Session::get('cart')->totalPrice){
            return view('user.addCredit');
        }
        else{
            // create order with user id
            $total=Session::get('cart')->totalPrice;
            $id=Session::get('user')['id'];
            $order=Order::create(['user_id' => $id]);

            $keys=array_keys(Session::get('cart')->items);
            foreach($keys as $id){
                Orderproduct::create(['order_id'=>$order->id,'product_id'=>$id]);
            }
            $user=Session::get('user');
            $newCredit=Session::get('user')['credit']-Session::get('cart')->totalPrice;
            $user['credit']=(float)$newCredit;
            $request->session()->put('user', $user);
            $user=User::find($user['id']);
            // dd($user);
            $newCredit=(float)$newCredit;
            $user->update([
            'credit'=>$newCredit,
            ]);
            // dd($total);
            $order->update([
                'price'=>$total,
            ]);
            $request->session()->put('cart', null);
            return view('user.confirmation');
        }
    }
}
