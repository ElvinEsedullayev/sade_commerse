<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }
    public function store()
    {
        return view('admin.product.create');
    }

    public function create(Request $request)
    {
        $product = new Product;
        $img = $request->file('img');
        $imgName = time(). '.' .$img->Extension();
        $request->img->move('productimg',$imgName);
        $product->img = $imgName;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->save();
        return redirect()->back()->with('success','Product has been added successfully');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.update',compact('product'));
    }

    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        if($request->hasFile('img')){
        $img = $request->file('img');
        $imgName = time(). '.' .$img->Extension();
        $request->img->move('productimg',$imgName);
        $product->img = $imgName;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->save();
        }else{
            $product->title = $request->title;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->save();
        }
        return redirect()->back()->with('success','Product has been updated successfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success','Product has been deleted successfully');
    }

     public function order()
    {
        $orders = Order::all();
        return view('admin.order.index',compact('orders'));
    }

    public function orderupdate($id)
    {
        $order = Order::find($id);
        $order->status = 'delivered';
        $order->save();
        return redirect()->back()->with('success','Order delivered successfully');

    }
}
