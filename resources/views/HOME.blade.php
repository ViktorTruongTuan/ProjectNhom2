@extends('master')
@section('navbar')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Hanna Petshop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="{{url("/")}}">Home<a>
        <a class="nav-item nav-link active" href="{{url("")}}">Spa Service</a>
        <a class="nav-item nav-link active" href="{{url("")}}">About Us</a>
        @if($name==null)
        <a class="nav-item nav-link active" href="{{url("/login")}}">Login</a>
        @endif
       @if ($name!=null && $role=="Admin")
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">UserList</a>
          <a class="dropdown-item" href="#">Staff Info</a>
          <a class="dropdown-item" href="#">Products Management</a>
        </div>
      </li>
      <a class="nav-item nav-link active" href="{{url("/logout")}}">Logout</a>
      @elseif ($name!=null && $role=="User")
        <a class="nav-item nav-link active" href="{{url("/")}}">User Info<a>
        <a class="nav-item nav-link active" href="{{url("")}}">Spa Schedule</a>
        <a class="nav-item nav-link active" href="{{url("/logout")}}">Logout</a>
       @endif
      </div>

    </div>
  </nav>
@endsection


