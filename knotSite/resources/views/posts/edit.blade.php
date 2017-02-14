@extends('main')

@section('title', '| Edit Blog Post')

@section('content')
<div class="row">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!} <!--Method needs to be specified for PUT-->
            <div class="col-md-8">
            {{ Form::text('title', null, array('class' => 'form-control input-lg')) }}
            {{ Form::textarea('body', null, array('class' => 'form-control form-spacing-top')) }}
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
