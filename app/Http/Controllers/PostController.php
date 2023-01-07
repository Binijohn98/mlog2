<?php

namespace App\Http\Controllers;
use App\Models\Post;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index(){
        $posts= Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }

    public function show(Post $post){

        return view('blog-post',['post'=>$post]);
    }

    public function create(Post $post){

        return view('admin.posts.create');
    }

    public function store(Request $request){

       $inputs= request()->validate([
            'title'=> 'required|min:2|max:255',
            'post_image'=> 'file',
            'body'=>'required'
        ]);
       if(request(key:'post_image')){
        $input['post_image']= request('post_image')->store('images');
               }
              auth()->user()->posts()->create($inputs);
              return back();
    }

    public function destroy(Post $post){

        $post->delete();

        Session::flash('message','Post was deleted');

        return back();
    }


}
 