@extends('master.layout')
@section('title')
Search Page

@endsection
@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="row">
            @if (count($posts)>0)
            @foreach ($posts as $post )
                 <div class="col-md-4 mb-2">
                    <div class="card h-100">
                        <img height="200" width="300" src="{{ asset('uploads/'.$post->image)}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <h5 class="card-title text-red">{{$post->user?$post->user->name:null}}</h5>
                            <p class="card-text">{{Str::limit($post->body)}}</p>
                            <a href="{{route('posts.show',$post->slug)}}" class="btn btn-primary">Go</a>

                        </div>

                    </div>

                 </div>            
            @endforeach
            @else
            <p>No reuslts found</p>
            @endif
          
        

        </div>

    </div>
    <div class="text-center">
        {{$posts->links()}}
    </div>

</div>
@endsection