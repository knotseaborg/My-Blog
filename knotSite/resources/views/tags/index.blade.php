@extends('main')

@section('title', '| Tags Index')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 well">
            <h1>All Tags</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default btn-block btn-xs">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="well">
                <h1>Create Tag</h1>
                {!!Form::open(['route' => 'tags.store', 'method' => 'POST', 'data-parsley-validate' => ''])!!}
                    {{ Form::text('name', null, ['class' => 'form-control form-spacing-top', 'required' => '', 'maxlength' => '191']) }}
                    {{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-btn-space']) }}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
