<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function frontend_index(){
        return view('frontend.index');
    }

    public function view_category_post(string $category_slug){
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category){
            $post = Post::where('category_id',$category->id)->where('status','0')->paginate(2);
            return view('frontend.post.index',compact('post','category'));
        }else{
            return redirect('/');
        }

    }


    public function view_post(string $category_slug, string $post_slug){
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if($category){
            $post = Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status','0')->first();
            $latest_post = Post::where('category_id',$category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(15);
            return view('frontend.post.view_post',compact('post','latest_post'));
        }else{
            return redirect('/');
        }
    }
}
