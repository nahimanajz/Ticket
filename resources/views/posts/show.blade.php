@extends('layouts.pages')
@section('content')
<a href="/posts" class="btn btn-default">Go Back</a>
<h1>{{$post->title}}</h1>
<div>
    {{$post->body}}<br>
<img style="width:20%" src="/storage/cover_images/{{$post->cover_image}}">

    <hr>
<small>Written on {{$post->created_at}} </small><br>

<hr>
@if(!Auth::guest())
@if(Auth::user()->id == $post->user_id)

<div class="form-goup">
    <a href="{{$post->id}}/edit" class="btn btn-warning">Edit</a>
</div>

{!! Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST']) !!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
      
    {!!Form::close()!!}
    @endif
@endif
@endsection