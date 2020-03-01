@extends('layouts.pages')
@section('content')
<h3>Posts</h3>
@if(count($posts) >= 1)
 @foreach ($posts as $post)
     <div class="well">
         <div class="col-md4 col-sm-4">
         <img style="width:100% padding:12%;margin:12%;" src="/storage/cover_images/{{$post->cover_image}}">
         </div>
     <h3><a href="/posts/{{$post->id}}">{{ $post->title}} </a></h3>
        <small>Written on {{ $post->created_at }} by {{$post->user->name}}</small>
     </div>
 @endforeach
 {{-- pagination links--}}
 {{$posts->links()}} 
@else
    <p>No posts Available</p>
@endif
@endsection