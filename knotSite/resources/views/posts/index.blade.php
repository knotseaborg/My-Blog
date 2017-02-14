@extends('main')

@section('title', '| Blog Index')

@section('content')
    <div class="row">
        <div class="row">
            <div class="col-md-10">
                <h1>All Posts</h1>
            </div>
            <div class="col-md-2 ">
                <a href="{{ route('posts.create') }}" class="btn btn-primary  btn-h1-space">Create Post</a>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Post Body</th>
                    <th>Created at</th>
                    <th></th>
                </thead>
                @foreach($posts as $post)
                <tbody>
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr($post->body, 0, 100) }}{{ strlen($post->body)>100 ? "..." : "" }}</td>
                        <td>{{ date( "M j, Y", strtotime($post->created_at)) }}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! Html::linkRoute('posts.show', 'View', array($post->id), array('class' => 'btn btn-default btn-block')) !!}

                                </div>
                                <div class="col-sm-6">
                                    {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-default btn-block')) !!}

                                <div>
                            </div>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div> <!--End row-->
    <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->links() }} <!--Create pagination links-->
        </div>
    </div>
@endsection
