@extends('main')

@section('title', '| Blog Index')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1 well">
            <h1>My Blog</h1>
            <hr>
            @foreach($posts as $post)
                <h3>{{ $post->title }}</h3>
                <p>Pulished: {{ date('M d,Y h:ma',strtotime($post->created_at)) }}</p>
                <p>{{ substr($post->body, 0, 250)}}{{ strlen($post->body) > 250 ? '...' : ''}}</p>
                <a class="btn btn-primary" href="{{ route('blog.single', $post->slug)}}">Read more</a>
                @if(!$loop->last)
                    <hr>
                @endif
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
