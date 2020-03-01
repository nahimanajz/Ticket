@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-striped">
   <thead>
   <tr>
    <td> ID</td>
    <td>Title</td>
    <td>Desciption</td>
    <td colspan="2">Action</td>
     </tr>
     </thead>
     <tbody>
     @foreach($tickets as $ticket)
     <tr>
     <td>{{ $ticket->id }}</td>
     <td>{{ $ticket->title }}</td>
     <td>{{ $ticket->description }}</td>
     <td>
    <a class ="btn btn-primary" href="{{action('TicketsController@edit',$ticket->id)}}">Edit</a>
     </td>
     <td>
     <form action="{{action('TicketsController@destroy',$ticket->id)}}" method="post">
      {{csrf_field()}}
      <input name="_method" type="hidden" value="Delete">
     <button class="btn btn-danger" type="submit">Delete</button>
     </form>
     </td>
     </tr>
     @endforeach
     <tbody>
     </table>
     </div>
     @endsection