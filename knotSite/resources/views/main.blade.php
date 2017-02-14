<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>
  <body>
    @include('partials._nav')
    <div class="container">
        @include('partials._messages')
        @yield('content')
    </div><!-- /.container -->
    @include('partials._foot')
    @include('partials._js')
  </body>
</html>
