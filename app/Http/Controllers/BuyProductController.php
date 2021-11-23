<?php

namespace App\Http\Controllers;

use App\ProductList;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BuyProductController extends Controller
{
    public function AddToCart(Request $request,$id,$quantity){
        $product=ProductList::find($id);
        $total=intval($product->Price)*intval($quantity);
        $cart = $request->session()->get('cart');
            $cart[$product->id]=array('ProductID'=>$product->id,'ProductName'=>$product->ProductName,'Total'=>$total);
            $request->session()->put('cart',$cart);
        $items = $request->session()->get('cart');
        return view('test',['Product'=>$items]);
    }
}
