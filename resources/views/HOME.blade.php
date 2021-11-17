@extends('master')
@section('productlist')
  <div style="padding:10px;" class="row">
    @foreach ($productlist as $product )
    <div class="col-3 productbox">
        <img src="{{asset($product->PicturePath)}}" class="img-responsive">
        <div class="producttitle">{{$product->ProductName}}</div>
        <div class="productprice"><div class="pull-right"><a href={{'/cart/'.$product->id}} class="btn btn-danger btn-sm" role="button">BUY</a></div><div class="pricetext">{{$product->Price}}</div></div>
    </div>
    @endforeach</div>
@endsection


