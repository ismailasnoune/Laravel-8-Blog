<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">Laravel 8 Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        @if(auth()->check())
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('posts.create')}}">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('profile.show')}}">{{auth()->user()->name}}</a>
        </li>

        @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/register')}}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/login')}}">Login</a>
        </li>


        @endif
     
       
      
      </ul>
      <form class="d-flex" method="GET" action="{{ route('posts.search') }}">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{ request('query') }}" name="query">
        <button class="btn btn-outline-success" type="submit">Search</button>
        {{-- <form method="GET" action="{{ route('posts.search') }}">
          <input type="text" name="query" placeholder="Search posts..." value="{{ request('query') }}">
          <button type="submit">Search</button>
      </form> --}}
      
      </form>
    </div>
  </div>
</nav>