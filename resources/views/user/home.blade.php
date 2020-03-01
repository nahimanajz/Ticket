@extends('layouts.app')
@section('content')
<div class="container">
    @if(\Session::has('success'))
         <div class="alert alert-success">
         {{\Session::get('success')}}
         </div>
    @endif
    {{-- <div class="col-9 pt-5"> --}}
    <div><h1>{{ $title }}</h1></div> 
    {{-- <div><h1>    laravel Crud</h1></div>     --}}

        {{-- <div></div> --}}
    {{-- </div> --}}
    <div class="row">
     <a href="{{url('/create/ticket')}}" class="btn btn-success">Create Ticket</a>
    <a href="{{url('/tickets')}}" class="btn btn-default">All tickets</a>
    </div>
</div>
@endsection
