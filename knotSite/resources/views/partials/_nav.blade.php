<!--Default-nav-bar-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">Laravel Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? 'active': ''}}"><a href="/laravel/knotSite/public">Home <span class="sr-only">(current)</span></a></li>
        <li class="{{ Request::is('blog') ? 'active': ''}}"><a href="/laravel/knotSite/public/blog">Blog</a></li>
        <li class="{{ Request::is('about') ? 'active': ''}}"><a href="/laravel/knotSite/public/about">About</a></li>
        <li class="{{ Request::is('contact') ? 'active': ''}}"><a href="/laravel/knotSite/public/contact">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            @if(Auth::check())
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{Auth::user()->name}} <span class="glyphicon glyphicon-triangle-bottom"></span></a>
            <ul class="dropdown-menu">
               <li><a href="{{ route('posts.index') }}">Posts</a></li>
               <li><a href="{{ route('categories.index') }}">Categories</a></li>
               <li><a href="{{ route('tags.index') }}">Tags</a></li>
               <li role="separator" class="divider"></li>
               <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                   Logout
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
               </form></li>
            </ul>
            @else
            <a href="{{ route('login') }}" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
            @endif
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
