<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        $posts=posts::latest()->paginate(6);
        return view("home")->with(['posts'=> $posts]);
    }
    public function show($slug){
    
    }
    public function create(){
     
    }
    public function store(Request $request){
        
    }
    public function edit($id){
      
    }
    public function update($id,Request $request){
     
    }
    public function delete($id){
     

    }
    


}
