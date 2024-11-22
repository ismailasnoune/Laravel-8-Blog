
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <!--table of posts -->
    <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
        <div>
            <h3 class="text-lg font-semibold text-slate-800">All Posts</h3>
            <p class="text-slate-500">Overview of the Posts</p>
        </div>
        <div class="ml-3">
            <div class="w-full max-w-sm min-w-[200px] relative">
            <div class="relative">
                <input
                class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                placeholder="Search for posts..."
                />
                <button
                class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                type="button"
                >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8 text-slate-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                </button>
            </div>
            </div>
        </div>
    </div>
     
    <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
      <table class="w-full text-left table-auto min-w-max">
        <thead>
          <tr>
            <th class="p-4 border-b border-slate-200 bg-slate-50">
              <p class="text-sm font-normal leading-none text-slate-500">
                Id Post
              </p>
            </th>
            <th class="p-4 border-b border-slate-200 bg-slate-50">
              <p class="text-sm font-normal leading-none text-slate-500">
                Title
              </p>
            </th>
            <th class="p-4 border-b border-slate-200 bg-slate-50">
              <p class="text-sm font-normal leading-none text-slate-500">
                Slug
              </p>
            </th>
            <th class="p-4 border-b border-slate-200 bg-slate-50">
              <p class="text-sm font-normal leading-none text-slate-500">
                body
              </p>
            </th>
            <th class="p-4 border-b border-slate-200 bg-slate-50">
              <p class="text-sm font-normal leading-none text-slate-500">
                Created at
              </p>
            </th>
            <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                  Operation
                </p>
              </th>
          </tr>
        </thead>
        <tbody>
               @php
               $posts = auth()->user()->isAdmin()
                ? \App\Models\posts::withTrashed()->get() // Fetch all posts for admin
                : auth()->user()->posts()->withTrashed()->get(); // Fetch user's posts
                @endphp
            @foreach($posts as $post)
            <tr class="hover:bg-slate-50 border-b border-slate-200">
                <td class="p-4 py-5">
                  <p class="block font-semibold text-sm text-slate-800">Post_{{$post->id}}</p>
                </td>
                <td class="p-4 py-5">
                  <p class="text-sm text-slate-500">{{$post->title}}</p>
                </td>
                <td class="p-4 py-5">
                  <p class="text-sm text-slate-500">{{$post->slug}}</p>
                </td>
                <td class="p-4 py-5">
                  <p class="text-sm text-slate-500">{{Str::limit($post->body)}}</p>
                </td>
                <td class="p-4 py-5">
                  <p class="text-sm text-slate-500">{{$post->created_at}}</p>
                </td>
                <td class="p-4 py-5">
                    <button class="bg-green-500 text-white font-bold w-32 h-12 rounded hover:bg-blue-700">
                        <a  href="{{ route('posts.edit',$post->id)}}">Edit</a>
                    </button>
                    
                   @if($post->trashed())
                   <button class="bg-green-500 text-white font-bold w-32 h-12 rounded hover:bg-blue-700">
                    <a  href="{{ route('posts.restore',$post->id)}}">Restore</a>
                </button>
                   <form id={{$post->id}} method="POST" action='{{route('posts.delete',$post->id)}}'>
                    @csrf
                    @method('delete')
                  </form>
                   @else
                   <form id={{$post->id}} method="POST" action='{{route('posts.destroy',$post->id)}}'>
                    @csrf
                    @method('delete')
                  </form>
                   @endif
                    
                    <button class="bg-red-500 text-white font-bold w-32 h-12 rounded hover:bg-blue-700"  type='submit'
                    onclick="event.preventDefault; if(confirm('Are Sure To Delete This Article'))document.getElementById('{{$post->id}}').submit()">
                    @if($post->trashed())   
                    Delete utterly
                    @else
                    Delete
                    @endif

                      </button>
                
                </td>
               
              </tr>

            @endforeach
        </tbody>
      </table>
     
      <div class="flex justify-between items-center px-4 py-3">
        <div class="text-sm text-slate-500">
          Showing <b>1-5</b> of 45
        </div>
        <div class="flex space-x-1">
          <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
            Prev
          </button>
          <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-white bg-slate-800 border border-slate-800 rounded hover:bg-slate-600 hover:border-slate-600 transition duration-200 ease">
            1
          </button>
          <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
            2
          </button>
          <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
            3
          </button>
          <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
            Next
          </button>
        </div>
      </div>
    </div>
     
    <!-- -->

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
