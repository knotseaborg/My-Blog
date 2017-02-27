@extends('main')

@section('title', '| View Post')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="lead">{{ $post->title }}</h1>
            <p>
                {{ $post->body }}
            </p>
            <p><span class="h4">Category:</span> {{ isset($post->category->name) ? $post->category->name : 'None'}}</p>
            <div class="tags">
                @foreach ($post->tag as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>

        <div class="col-md-4 well">
            <div class="row">
                <div class="col-md-12">
                    <dl class="dl-horizontal">
                        <label>Url: </label><p><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
                        <label>Created:</label><p>{{ date("M t, Y h:i a",strtotime($post->created_at)) }}</p>
                        <label>Last updated:</label><p>{{ date("M t, Y h:i a",strtotime($post->updated_at)) }}</p>
                        <hr>
                    </dl>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                </div>

                <div class="col-md-6">
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE'] ) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                    {!! Form::close()!!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! Html::linkRoute('posts.index', 'All Posts', [], ['class' => 'btn-default btn btn-btn-space btn-block'])!!}
                </div>

            </div>
        </div>
    </div>

@endsection
