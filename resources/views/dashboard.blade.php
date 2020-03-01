@extends('layouts.pages')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="card-title"> <h3> Your Posts </h3></div>
                    <a href="{{'/posts/create'}}" class="btn btn-primary">Create new Post</a><br />
                    @if(count($posts) > 0)
                    <h3>Your Blog posts</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                             @foreach ($posts as $post)
                        <td>{{$post->title}}</td>
                        <td> <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></td>
                    <td> 
                            {!! Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                              
                            {!!Form::close()!!}
                    </td>
                </tr>
                             @endforeach                        
                        

                    </table>
                    @else
                      <p>You have no post</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
