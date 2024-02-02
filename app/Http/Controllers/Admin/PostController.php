<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function posts(){
        $posts = Post::all();
        return view('admin.posts.posts',compact('posts'));
    }

    public function add_posts(){
        $category = Category::where('status','0')->get();
        return view('admin.posts.add_post', compact('category'));
    }

    public function store_posts(PostFormRequest $request){
        $data = $request->validated();

        $post = new Post;
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']); ;
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];

        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->mete_keyword = $data['mete_keyword'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;
        $post->save();

        return redirect()->route('posts')->with('message', 'Posts Added Successfully!');
    }

    public function edit_posts($id){
        $category = Category::where('status','0')->get();
        $post = Post::find($id);
        return view('admin.posts.edit_post',compact('post','category'));
    }

    public function update_posts(PostFormRequest $request, $id){
        $data = $request->validated();

        $post = Post::find($id);
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];

        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->mete_keyword = $data['mete_keyword'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;
        $post->update();

        return redirect()->route('posts')->with('message', 'Posts Updated Successfully!');
    }

    public function delete_posts($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts')->with('message', 'Post Deleted Successfully!');
    }
}
