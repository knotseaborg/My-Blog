@extends('main')

@section('title', '| All Categories')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 well">
            <h1>All Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{Html::link( route('categories.show', $category->id),'View', ['class' => 'btn btn-default btn-xs btn-block'])}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="well">
                {!!Form::open(['route' => 'categories.store', 'method' => 'POST', 'data-parsley-validate' => ''])!!}
                    <h1>Create Category</h1>
                    {{Form::text('name', null, ['required' => '', 'maxlength' => '191', 'class' => 'form-spacing-top'])}}
                    {{Form::submit('Create New Category', ['class' => 'btn-primary btn btn-btn-space btn-block'])}}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
