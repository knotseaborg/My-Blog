@extends('main')

@section('title', "| $category->name")

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $category->name }} Category <small>({{ $category->posts->count() }} Posts)</small></h2>
        </div>
        <div class="col-md-2">
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary pull-right btn-btn-space btn-block">Edit</a>
        </div>
        <div class="col-md-2">
            {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block btn-btn-space']) }}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 well">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category->posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                @foreach($post->tag as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs btn-block">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
