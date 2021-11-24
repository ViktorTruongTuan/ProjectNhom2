<?php

namespace App\Http\Controllers;

use App\orderdetail;
use App\orderinfor;
use App\ProductList;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class BuyProductController extends Controller
{
    public function AddToCart(Request $request,$id,$quantity){
        $role = $request->session()->get('role');
        $user = $request->session()->get('user');
        // $request->session()->forget('cart');
        $cart = $request->session()->get('cart');
        if(intval($quantity)==0){
            unset($cart[$id]);
            $request->session()->put('cart',$cart);
            return redirect('/cartlist');
        }
        $product=ProductList::find($id);
        $productPrice=intval($product->Price);
        $total=$productPrice*intval($quantity);
            $cart[$product->id]=array('ProductID'=>$product->id,'ProductName'=>$product->ProductName,'Total'=>$total,'Quantity'=>$quantity,'Price'=>$productPrice);
            $request->session()->put('cart',$cart);
        $total=0;
        $products = $request->session()->get('cart');
        foreach($products as $product){
            $price= intval($product['Total']);
            $total+=$price;
        }
        $request->session()->put('total',$total);
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
    //Create OrderInfor
    public function CreateOrderInforPage(Request $request){
        $role = $request->session()->get('role');
        $user = $request->session()->get('user');
        $email = $request->session()->get('email');
        $total=$request->session()->get('total');
        $userinfor=DB::table('userinfor')->where('email', $email)->first();
        return view('createorderinfor',['role'=>$role,'name'=>$user,'email'=>$email,
    'TotalPrice'=>$total,'address'=>$userinfor->Address,'telephone'=>$userinfor->Telephone]);
    }
    public function PostCreateOrderInfor(Request $request){
        $role = $request->session()->get('role');
        $user = $request->session()->get('user');
        $dt=Carbon::now('Asia/Ho_Chi_Minh');
         $total=$request->session()->get('total');
        $id=IdGenerator::generate(['table' => 'orderinfor', 'length' => 6, 'prefix' =>'OI']);
        $insert = $request->input();
        $insert['id']=$id;
        $insert['Date']=$dt->toDateString();
        $insert['TotalPrice']=$total;
        orderinfor::create($insert);
        $products = $request->session()->get('cart');
        foreach($products as $product){
            $product['OrderID']=$id;
            orderdetail::create($product);
        }
        $request->session()->forget('cart');
        return view('createorderSuccess',['role'=>$role,'name'=>$user]);
    }
}
