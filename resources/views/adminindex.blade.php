@extends('master')
@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Hanna Petshop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="{{url("")}}">Home<a>
        <a class="nav-item nav-link active" href="{{url("")}}">Spa Service</a>
        <a class="nav-item nav-link active" href="{{url("")}}">Spa Schedule</a>
        <a class="nav-item nav-link active" href="{{url("")}}">Cart</a>
        <a class="nav-item nav-link active" href="{{url("")}}">UserList</a>
        <a class="nav-item nav-link active" href="{{url("")}}">StaffList</a>
      </div>
    </div>
  </nav>
@endsection
