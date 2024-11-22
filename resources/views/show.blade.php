@extends('master.layout')
@section('title')
Home Page

@endsection
@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="row">
            
                 <div class="col-md-4 mb-2">
                    <div class="card h-100">
                       
                        <img src="{{ asset('uploads/'.$post->image)}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->body}}</p>
                           <!-- if user has autorize to edit post  -->

                         
                           @if(auth()->check() && auth()->user()->isAdmin())
                           <a class="btn btn-warning" href="{{ route('posts.edit',$post->id)}}">Edit</a>
                           <form id={{$post->id}} method="POST" action='{{route('posts.destroy',$post->id)}}'>
                             @csrf
                             @method('delete')
                           </form>
                           <btn class="btn btn-danger"  type='submit'
                           onclick="event.preventDefault; if(confirm('Are Sure To Delete This Article'))document.getElementById('{{$post->id}}').submit()">Delete</btn>
                           @endif
                           @if(auth()->check())
                           @if(auth()->user()->id === $post->user_id)
                           <a class="btn btn-warning" href="{{ route('posts.edit',$post->id)}}">Edit</a>
                           <form id={{$post->id}} method="POST" action='{{route('posts.destroy',$post->id)}}'>
                             @csrf
                             @method('delete')
                           </form>
                           <btn class="btn btn-danger"  type='submit'
                           onclick="event.preventDefault; if(confirm('Are Sure To Delete This Article'))document.getElementById('{{$post->id}}').submit()">Delete</btn>
                           @endif
                           @endif
                           
                           
                         
                        </div>

                    </div>

                 </div>            
          

        </div>

    </div>
    

</div>
@endsection