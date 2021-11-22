@extends('master')
@section('productlist')
    <div class="row">
        <div class="col-5">
            <form action="/" method="POST">
                @csrf
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="Category">
                        <option value="All">All</option>
                        <option value="Dog Food">Dog Food</option>
                        <option value="Cat Food">Cat Food</option>
                        <option value="Accessory">Accessory</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
        </div>
    </div>
    <div style="padding:10px;" class="row">
        @foreach ($productlist as $product)
            <div class="col-3 productbox">
                <img src="{{ asset($product->PicturePath) }}" class="img-responsive">
                <div class="producttitle">{{ $product->ProductName }}</div>
                <div class="productprice">
                    <div class="pull-right"><a href={{ '/cart/' . $product->id }} class="btn btn-danger btn-sm"
                            role="button">BUY</a></div>
                    <div class="pricetext">{{ $product->Price }}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
