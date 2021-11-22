@extends('master')
@section('productlist')
  <div style="padding:10px;" class="row">
    @foreach ($productlist as $product )
    <div class="col-3 productbox">
        <img src="{{asset($product->PicturePath)}}" class="img-responsive">
        <div class="producttitle">{{$product->ProductName}}</div>
        <div class="row"><button class="btn btn-default" onclick=decrease("{{$product->id}}")>-</button><input type="text" id="{{$product->id}}" value="1"><button class="btn btn-default" onclick=increase("{{$product->id}}")>+</button></div>
        <div class="productprice"><div class="pull-right"><a onclick=buyproduct("{{$product->id}}") class="btn btn-danger btn-sm {{$product->id}}" role="button">BUY</a></div><div class="pricetext">{{$product->Price}}</div></div>
    </div>
    @endforeach</div>
@endsection
@push('styles')
<script src="{{asset('js/JS.js')}}"></script>
@endpush


