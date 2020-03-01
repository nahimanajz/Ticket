@extends('layouts.pages')
@section('content')

<h1>welcome to {{$title}}</h1>
 @if($services > 0)
       <ul class="list-group">
       @foreach ($services as $service)
       <li class="list-group-item">{{ $service }}</li>
       @endforeach
    </ul>
 @endif

@endsection