<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['featured'] = Post::where('is_featured','1')->where('status','publish')->limit(10)->get();
        $data['posts'] = Post::where('status','publish')->paginate(10);
        return view('frontend.home',$data);
    }

    public function post($id)
    {
        $data['post'] = Post::where('url',$id)->first();
        $ctg = Post::where('url',$id)->first();
        Post::find($ctg->id)->increment('hit');
        $data['relateds'] = Post::where('category_id',$ctg->category_id)->where('url','!=',$id)->orderBy('id','desc')->get();
        return view('frontend.single_post',$data);
    }

    public function tag($url)
    {

    }

    public function category($url)
    {

    }
}
