@extends('master.layout')

@section('title')
        Login
@endsection


@section('content')
<div class="row">
   <div class="col-md-12"><br></div>
   <div class="col-md-12"><br></div>
   <div class="col-md-12"><br></div>
   <div class="col-md-12"><br></div>

</div>

<div class="jumbotron">
  <h1>Welcome!</h1>
  <p>Silahkan Login </p>
  
  @include('partials.notif')
   <div class="row">

      <form action = "{{route('guest.login')}}" method="post">
      <div class="form-group">
        <label >Username</label>
        <input type="text" class="form-control"  name="email" id="email" placeholder="Email">
      </div>
      <div class="form-group">
        <label >Password</label>
        <input type="password" class="form-control"  name="password" id="password" placeholder="Password">
      </div>
      
      <button type="submit" class="btn btn-default">Login</button>
      {{ csrf_field() }}
    </form>

  </div>
</div>
        
@endsection