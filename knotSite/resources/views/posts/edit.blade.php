@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
<div class="row">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!} <!--Method needs to be specified for PUT-->
            <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control input-lg', 'required' => '')) }}
            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null, array('class' => 'form-control ', 'required' => '', 'minlength' => 5, 'maxlength' => 191)) }}
            {{ Form::label('category_id', 'Category:') }}
            {{ Form::select('category_id', $categories, null,['class' => 'form-control']) }}
            {{ Form::label('tags', 'Tag:') }}
            {{ Form::select('tags[]', $tags, null,['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
            {{ Form::label('body', 'Blog Body:') }}
            {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}
            </div>
            <div class="col-md-4 well">
                <div class="row">
                    <div class="col-md-12">
                        <dl class="dl-horizontal">
                            <dt>Created:</dt><dd>{{ date("M t, Y h:i a",strtotime($post->created_at)) }}</dd>
                            <dt>Last updated:</dt><dd>{{ date("M t, Y h:i a",strtotime($post->updated_at)) }}</dd>
                            <hr>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>

                    <div class="col-md-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
</div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $(".select2-multi").select2();
        $(".select2-multi").val({{ $tagsForThisPost }}).trigger("change");
    </script>
@endsection
