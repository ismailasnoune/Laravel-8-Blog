@extends('master.layout')
@section('title')
Create Post 

@endsection
@section('content')

    <div class="row my-4">
    
     <div class="col-md-8 mx-auto">
    <div class="card">
      <div class="card-header">
        <div class="cart-title">
          <h3>Cretae a Post</h3>
        </div>

      </div>
      <div class="card-body">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp">
                  <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->

           </div>
           <div class="mb-3">
                  <label for="body" class="form-label">Descripton</label>
                  <textarea name='body' type="text" class="form-control" id="body" ></textarea>

           </div>
           <div class="mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input name="image" type="file" class="form-control" id="image" >

           </div>
           <div class="mb-3">
                  
                  <input type="submit" class="btn btn-primary" value="Create">
                  

           </div>

           
          
        </form>
      </div>
    </div>
     </div>
        
    
           

    </div>
@endsection