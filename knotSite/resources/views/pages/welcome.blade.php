@extends('main')

@section('title', '| Home')

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="well jumbotron">
            <h1>Welcome to my Blog!</h1>
            <p><lead>Thank you for visiting. This is my new Blog. Please read my popular post!</lead></p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
          </div>
        </div><!-- /.jumbotron -->
      </div><!-- /.row -->

      <div class="row">
          <div class="col-md-8">
              <div class="well">
              @foreach($posts as $post)
                    <h2>{{ $post->title }}</h2>
                    <p>{{ strlen($post->body)>365 ? substr($post->body, 0, 365)."..." : $post->body }}</p>
                    <a href="{{ route('blog.single', [$post->slug]) }}" class="btn btn-primary">Read more</a>
                    @if(!$post == last($posts))
                        <hr>
                    @endif
              @endforeach
              </div>
          </div>
          <div class="col-md-4">
              <div class="well">
                  <h2>Side bar<h2>
              </div>
          </div>
      </div>
@endsection
