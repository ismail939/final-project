<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Cart;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();


        $request->image->move(public_path('images'), $imageName);

        $product = Product::create($request->except(['_token', '_method']));
        $product->update([
            'image' => $imageName,
        ]);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
        $product = Product::find($id);

        if ($request->image !== null) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '.' . $request->image->extension();

            $oldImageName = $product->product_picture;
            $oldImagePath = public_path('images/') . $oldImageName;
            // echo $oldImagePath;
            if (File::exists($oldImagePath)) {
                // echo "deleted";
                File::delete($oldImagePath);
            }
            $request->image->move(public_path('images'), $imageName);

            $product->update($request->except('_method', '_token'));
            $product->update([
                'image' => $imageName,
            ]);
        } else {
            $product->update($request->except('_method', '_token'));
        }
        return redirect()->route('product.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatee($id)
    {
        $product = Product::find($id);
        return view('admin.updateProduct', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        // dd($product);
        $oldImageName = $product->product_picture;
        $oldImagePath = public_path('images/') . $oldImageName;
        // echo $oldImagePath;
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
        return redirect()->route('product.index');
    }
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('userHome.show', Session::get('user')['id']);
    }
    public function getCart(){
        if(!Session::has('cart')){
            $products=null;
            return view('shop.shoppingCart', compact('products'));
        }
        else{
            $oldCart=Session::get('cart');
            // dd($oldCart);
            $cart=new Cart($oldCart);
            return view('shop.shoppingCart', ['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
        }
    }
    public function getCheckout(){
        if(!Session::has('cart')){
            return view('shop.shoppingCart');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $total=$cart->totalPrice;
        return view('shop.checkout', compact('total'));
    }
    
}
