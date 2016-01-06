<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
{{Auth::user()}}
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="">Care</a>

        </div>
        <ul class="nav navbar-nav">
            <li><a href="/findcarehome">Find A Care Home</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @if(!Auth::check()) 
            <li><a href="/login">Sign In</a></li>
            <li><a href="/register">Register</a></li>
            @else
            <li><a href="/profile">Profile</a></li>
            <li><a href="/logout">Logout</a></li>
            @endif
        </ul>
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
@yield('content')
</div>
