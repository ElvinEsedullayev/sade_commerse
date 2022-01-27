<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype == 1){
            return view('admin.home');
        }else{
            $products = Product::paginate(3);
             $user = auth()->user();
            $count = Cart::where('phone',$user->phone)->count();
            return view('front.layouts.master',compact('products','count'));
        }
    }

    public function index()
    {
        if(Auth::id()){
            return redirect('redirect');
        }else{
            $products = Product::paginate(3);
            return view('front.layouts.master',compact('products'));
        }
        
    }


    public function search(Request $request)
    {
        $search = $request->search;
        if($search == ''){
            $products = Product::paginate(3);
            return view('front.layouts.master',compact('products'));
        }
        $products = Product::where('title','like','%'.$search.'%')->get();
        return view('front.layouts.master',compact('products'));
    }


    public function addCart(Request $request,$id)
    {
        if(Auth::id()){
            $user = auth()->user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->adress = $user->adress;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back()->with('success','Product has been added to cart');
        }else{
            return redirect()->route('login');
        }
    }


    public function showCart()
    {
        $user = auth()->user();
        $count = Cart::where('phone',$user->phone)->count();
        $carts = Cart::where('phone',$user->phone)->get();
        return view('front\layouts\showcart',compact('count','carts'));
    }


    public function cartDelete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success','Cart has been deleted successfully');
    }

    public function orderConfirm(Request $request)
    {
        //return $request->all();
        $user = auth()->user();
        $name=$user->name;
        $phone=$user->phone;
        $adress=$user->adress;

        foreach($request->productname as $key=>$productname){
            $order = new Order;
            $order->product_name = $request->productname[$key];
            $order->price = $request->productprice[$key];
            $order->quantity = $request->productquantity[$key];
            $order->name =$name;
            $order->phone = $phone;
            $order->adress = $adress;
            $order->status = 'not delivered';
            $order->save();
        }
        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('success','Product ordered successfully');
    }

}
