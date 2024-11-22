@extends('master.layout')
@section('title')
Home Page

@endsection
@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="row">
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

        </div>

    </div>
    <div >
        {{$posts->links()}}
    </div>

</div>
@endsection