@extends('layouts.pages')
@section('content')
<h1>Create Post</h1>

    {!! Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

    
    <div class="form-group">
        {{Form::label('title','Title')}}
        {{Form::text('title',$post->title, ['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
            {{Form::label('Body','body')}}
            {{Form::textarea('body',$post->body, ['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'this is post body'])}}
        </div>
        <div class="form-group">
                {{Form::label('cover Image','cover Image')}}
                {{Form::file('cover_image', ['class'=>'form-control'])}}
            </div>
        {{Form::hidden('__method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close()!!}
   
@endsection
