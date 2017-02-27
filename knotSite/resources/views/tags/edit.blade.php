@extends('main')

@section('title', '| Tag Edit')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
                {{ Form::label('name', "Name: ") }}
                {{ Form::text('name', null, ['class' => 'form-control', 'required' => '']) }}
                {{ Form::submit('Edit Tag', ['class' => 'btn btn-success btn-block btn-btn-space']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
