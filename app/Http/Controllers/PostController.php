<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Policies\postsPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

  public function __construct()
  {
      // Automatically applies policy for CRUD actions
      //$this->authorizeResource(posts::class, 'post');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->authorize('viewAny');
        $posts=posts::latest()->paginate(6);
        return view("home")->with(['posts'=> $posts]);
    }
    public function search(Request $request)
    {
      //$this->authorize('viewAny');
        $query = $request->input('query');
        
       

       
        // Apply search filter
        if ($query) {
           $posts=posts::where('title', 'like', "%$query%")->paginate(5);
        }
        

        return view('search',['posts'=> $posts]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create', posts::class);
      return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:3|max:1000',
            'body'=>'required|min:3|max:1000',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048'
        ]);
        //for image
        if($request->has('image')){
          $file=$request->image;
          $image_name=time().'_'.$file->getClientOriginalName();
          $file->move(public_path('/uploads'),$image_name);

        }

          posts::create(
            ['title' =>$request->title,
            'slug'=>Str::slug($request->title),
            'body'=>$request->body,
            'image'=>$image_name,
            'user_id'=>auth()->user()->id

            
            ]
            
          );
         return redirect()->route('home')->with(
            ['success'=>'Article added successfully']
          );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show( $slug)
    {
        //    $post=posts::find($id);
    $post=posts::where('slug','=',$slug)->first();
    

    return view('show')->with(['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       
        $post=posts::where('id','=',$id)->first();
        $this->authorize('update',$post);
      return view('edit')->with([
        'post'=>$post
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request,[
            'title'=>'required|min:3|max:1000',
            'body'=>'required|min:3|max:1000',
            'image'=>'mimes:png,jpg,jpeg|max:2048'
        ]);
        $post=posts::where('id','=',$id)->first();
        if($request->has('image')){
          $file=$request->image;
          $image_name=time().'_'.$file->getClientOriginalName();
          unlink(public_path('/uploads').'/'.$post->image);
    
          $file->move(public_path('/uploads'),$image_name);
          $post->image=$image_name;
    
    
        }
    
          $post->update(
            ['title' =>$request->title,
            'slug'=>Str::slug($request->title),
            'body'=>$request->body,
            'image'=>$post->image
    
            
            ]
            
          );
         return redirect()->route('home')->with(
            ['success'=>'Article Updated successfully']
          );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //if(file_exists(public_path('./uploads/').))
        $post=posts::where('id','=',$id);
      $post->delete();
      return redirect()->route('home')->with(
        ['success'=>'Article Deleted successfully']
      );
    }
    //this methode to delete posts trashed
    public function delete( $id)
    {
        //if(file_exists(public_path('./uploads/').))
        $post=posts::withTrashed()->where('id','=',$id);
      $post->forceDelete();
      return redirect()->route('home')->with(
        ['success'=>'Article Deleted utterly']
      );
    }
    public function restore( $id)
    {
        //if(file_exists(public_path('./uploads/').))
        $post=posts::withTrashed()->where('id','=',$id);
      $post->restore();
      return redirect()->route('home')->with(
        ['success'=>'Article Restored successfully']
      );
    }
}
