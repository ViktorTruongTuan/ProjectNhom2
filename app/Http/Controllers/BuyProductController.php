<?php

namespace App\Http\Controllers;

use App\ProductList;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BuyProductController extends Controller
{
    public function AddToCart(Request $request,$id,$quantity){
        $role = $request->session()->get('role');
        $user = $request->session()->get('user');
        // $request->session()->forget('cart');
        if(intval($quantity)==0){
            $quantity==1;
        }
        $product=ProductList::find($id);
        $productPrice=intval($product->Price);
        $total=$productPrice*intval($quantity);
        $cart = $request->session()->get('cart');
            $cart[$product->id]=array('ProductID'=>$product->id,'ProductName'=>$product->ProductName,'Total'=>$total,'Quantity'=>$quantity,'Price'=>$productPrice);
            $request->session()->put('cart',$cart);
        $products = $request->session()->get('cart');
        return redirect('/cartlist');
    }
    public function CartListPage(Request $request){
        $products = $request->session()->get('cart');
        $role = $request->session()->get('role');
        $user = $request->session()->get('user');
        return view('cartlist',['role'=>$role,'name'=>$user,'products'=>$products]);
    }
    public function DeleteCartItem(Request $request,$id){
        $cart = $request->session()->get('cart');
        unset($cart[$id]);
        $request->session()->put('cart',$cart);
        return redirect('/cartlist');
    }

}
