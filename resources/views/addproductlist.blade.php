@extends('master')
@section('content')

<div class="col-6 offset-3">
    <p>{{$message}}</p>
    <form action="/addproduct" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1" >Product Name</label>
          <input type="text" class="form-control" name="productname" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" >Price</label>
            <input type="text" class="form-control" name="productprice" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1 ">Picture</label>
            <input type="file" class="form-control" name="picture" required>
          </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1" >Description</label>
          <textarea class="form-control" name="productdescription" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Are You Want To Add?')">Submit</button>
      </form>
</div>
@endsection
@section('footer')