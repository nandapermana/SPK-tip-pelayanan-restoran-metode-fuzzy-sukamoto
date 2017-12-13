<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" >SPK</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        </li>
       
      </ul>


  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
    <ul class="nav navbar-nav navbar-right">

        @if(Auth::check()) 
      
        <li><a><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Auth::user()->name }} </a></li>
        <li><a href="{{route('user.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a></li>
        
        @else
        <ul class="nav navbar-nav navbar-right">
        <li><a href=""><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
       @endif
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
    </div>
  </div>
</nav>

