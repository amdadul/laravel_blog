<?php

namespace App\Http\Controllers;

use App\PostTag;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Support\Str;
use Image;
use App\Post;

class PostController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:post.index|post.create|post.edit|post.delete', ['only' => ['index','show']]);
        $this->middleware('permission:post.create', ['only' => ['create','store']]);
        $this->middleware('permission:post.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:post.delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        /*if(!Auth::user()->can('post.index'))
        {
            abort('403','Unauthorized access');
        }*/
        $data['post'] = Post::orderBy('id','desc')->get();
        return view("post.manage",$data);
    }
    public function create()
    {
        $data["ctg"]= Category::orderBy('name','desc')->get();
        $data['tag'] = Tag::orderBy('name','asc')->get();
        return view('post.create',$data);
    }

    public function store(Request $req)
    {
        //dd($req->all());
        $post = new Post();
        $fnd = $post->where('url','=',Str::slug($req->url,'-'))->count();

        $req->validate([
                'title' => "required|min:20|max:200",
                'url' => "required",
                'tag'=> "required",
                'category' => "required|numeric|min:0|not_in:0",
                'description' => "required",
                'shortdescription' => "required",
                'image' => "mimes:jpg,png,webp,jpeg"
        ]);


        if($fnd!=0)
        {
            return redirect()->back()->with('urlError','URL EXIST ! Try another one');
        }
        else {

            if ($req->hasFile('image')) {
                $file = $req->file('image');

                $dpath = 'images/upload/thumbnail';
                $path = 'images/upload/post';

                $image_name = time() . rand(00, 99) . '.' . $file->getClientOriginalName();

                $resize_image = Image::make($file->getRealPath());
                $resize_image->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($dpath . '/' . $image_name);

                $file->move($path, $image_name);

                $post->image = $path . '/' . $image_name;
                $post->thumbimg = $dpath . '/' . $image_name;
            } else {
                $post->image = 'images/upload/post/noimage.png';
                $post->thumbimg = 'images/upload/thumbnail/noimage.png';
            }


            $post->title = $req->title;
            $post->url = Str::slug($req->url,'-');
            $post->category_id = $req->category;
            $post->user_id = Auth::id();
            $post->shortdesc = $req->shortdescription;
            $post->longdesc = $req->description;
            $post->status = $req->status;
            if(!isset($req->isfeatured))
            {
                $post->is_featured = 0;
            }
            else{
                $post->is_featured = $req->isfeatured;
            }
            $post->hit = 0;
            $post->updated_by = Auth::id();

            if ($post->save()) {
                //$post->id is last inserted id

                if($post->tags()->sync($req->tag))
                {
                    session()->flash('success', 'Post Save Successfully');
                }
                else{
                    session()->flash('warning', 'Error while inserting Tag');
                }

            } else {
                session()->flash('warning', 'Error Occurred');
            }
            return redirect()->back();
        }

    }

    public function edit(Post $post,$id)
    {
        $did = decrypt($id);
        $data["ctg"]= Category::orderBy('name','desc')->get();
        $data["post"] = $post->findOrFail($did);
        $data['tag'] = Tag::orderBy('name','desc')->get();
        $data['posttag'] = PostTag::where('post_id',$did)->get();
        return view('post.create',$data);
    }

    public function update(Request $req,$id)
    {
        $data = Post::findOrFail($id);
        $req->validate([
            'title' => "required|min:20|max:200",
            'category' => "required|numeric|min:0|not_in:0",
            'description' => "required",
            'image' => "mimes:jpg,png,webp,jpeg"
        ]);
        $value['title'] = $req->title;
        $value['category_id'] = $req->category;
        $value['shortdesc'] = $req->shortdescription;
        $value['longdesc'] = $req->description;
        $value['status'] = $req->status;
        $value['updated_by'] = Auth::id();

        if($req->hasFile('image'))
        {
            $file   = $req->file('image');

            $dpath   = 'images/upload/thumbnail';
            $path   = 'images/upload/post';

            $image_name = time().rand(00,99).'.'.$file->getClientOriginalName();

            $resize_image = Image::make($file->getRealPath());
            $resize_image->resize(150, 150, function($constraint){
                $constraint->aspectRatio();
            })->save($dpath . '/' . $image_name);

            $file->move($path,$image_name);

            $value['image'] = $path. '/' .$image_name;
            $value['thumbimg'] = $dpath . '/' . $image_name;
        }
        if (file_exists($data->image))
        {
            unlink($data->image);
        }

        if($data->update($value))
        {
            if($data->tags()->sync($req->tag))
            {
                session()->flash('success','Post Updated Successfully');
            }
            else{
                session()->flash('warning','Error Occurred');
            }
        }
        else{
            session()->flash('warning','Error Occurred');
        }
        return redirect(route('post.manage'));

    }

    public function destroy($id)
    {
        $post = new Post();
        if($post->destroy($id))
        {
            session()->flash('success','Post deleted Successfully!');
        }
        else{
            session()->flash('warning','Something went wrong!');
        }
        return redirect()->back();
    }
}
