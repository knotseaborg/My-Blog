@extends('main')

@section('title', "| {{ $category->name Edit}}")

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="well">
                {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
                    {{ Form::label('name', 'Name: ') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'required' => '']) }}
                    {{ Form::submit('Save changes', ['class' => 'btn btn-success btn-block btn-btn-space']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
