<?php

namespace App\Http\Controllers;

use App\ProductList;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function ProductListPage(Request $request){
        $user = $request->session()->get('user');
        $role = $request->session()->get('role');
        $products=ProductList::all();
        return view('productlist',['name'=>$user,'message'=>$products,'role'=>$role]);


    }
    public function AddProductListPage(Request $request){
        $user = $request->session()->get('user');
        $role = $request->session()->get('role');
        return view('addproductlist',['name'=>$user,'message'=>'','role'=>$role]);
    }
    public function PostAddProductListPage(Request $request){
        $user = $request->session()->get('user');
        $role = $request->session()->get('role');
        $productName=$request->input('productname');
        $productPrice=intval($request->input('productprice'));
        $productDescription=$request->input('productdescription');
        $fileName=$request->file('picture')->getClientOriginalName();
        $store=$request->file('picture')->storeAs('public/product',$fileName);
        $path='storage/product/'.$fileName;
        $id=IdGenerator::generate(['table' => 'productinfor', 'length' => 6, 'prefix' =>'P']);
        $product = new ProductList;
        $product->id=$id;
        $product->ProductName=$productName;
        $product->Price=$productPrice;
        $product->Description=$productDescription;
        $product->PicturePath=$path;
        $product->save();
        return view('addproductlist',['name'=>$user,'role'=>$role,'message'=>'Add success']);
    }

    public function UpdateProductPage(Request $request,$id){
        $user = $request->session()->get('user');
        $role = $request->session()->get('role');
        $request->session()->put(['productId'=>$id]);
        $product=ProductList::where('id',$id)->first();
        $productName=$product->ProductName;
        $productDesc=$product->Description;
        $productPrice=$product->Price;
        $productPicture=$product->PicturePath;
        return view('updateproduct',['message'=>'','name'=>$user,'role'=>$role,'productName'=>$productName,
    'productPrice'=>$productPrice,'productDesc'=>$productDesc,'productPicture'=>$productPicture]);
    }

    public function PostUpdateProduct(Request $request){
        $user = $request->session()->get('user');
        $role = $request->session()->get('role');
        $id   = $request->session()->get('productId');
        $productName=$request->input('productname');
        $productPrice=intval($request->input('productprice'));
        $productDescription=$request->input('productdescription');
        $product=ProductList::where('id',$id)->first();
        $product->ProductName=$productName;
        $product->Description=$productDescription;
        $product->Price=$productPrice;
        if($request->file('picture')){
            $fileName=$request->file('picture')->getClientOriginalName();
            $store=$request->file('picture')->storeAs('public/producr',$fileName);
            $path='storage/product/'.$fileName;
            $product->PicturePath=$path;
        }
        $product->save();
        return redirect('/productlist');


    }

    public function DeleteProduct($id){
        ProductList::where('id',$id)->delete();
        return redirect('/productlist');
    }
}
