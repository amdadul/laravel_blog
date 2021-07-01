<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:category.index|category.create|category.edit|category.delete', ['only' => ['index','show']]);
        $this->middleware('permission:category.create', ['only' => ['create','store']]);
        $this->middleware('permission:category.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category.delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $data['ctg'] = Category::all();
        return view('category.manage',$data);
    }

    public function create()
    {
        return view("category.create");
    }

    public function edit($id)
    {
        $did = $id;
        $data['ctg'] = Category::where('url','like',$did)->first();
        return view("category.create",$data);
    }

    public function store(Request $post)
    {
        $fnd = Category::where('url','=',Str::slug($post->url,'-'))->count();
        if($fnd==0) {
            $post->validate([
                'name' => 'required',
                'banner' => 'mimes:jpg,jpeg,png,webp',
            ]);
            $ctg = new Category();
            //Category::create($post->all()->except("status","image"));
            $ctg->name = $post->name;
            $ctg->description = $post->description;
            $ctg->url = Str::slug($post->url, '-');

            if ($post->hasFile('image')) {
                $file = $post->file('image');
                $path = 'images/upload/category';
                $file_name = time() . rand(00, 99) . '.' . $file->getClientOriginalName();
                $file->move($path, $file_name);
                $ctg->banner = $path . '/' . $file_name;
            } else {
                $ctg->banner = 'images/upload/category/noimage.png';
            }


            $ctg->status = "active";
            if ($ctg->save()) {
                session()->flash('success', 'Category Save Successfully');
            } else {
                session()->flash('warning', 'Error Ocured');
            }
        }
        else{
            session()->flash('warning', 'URL Exist! Please enter new one');
        }
        return redirect()->back();
    }

    public function update(Request $req,$id)
    {

        $fnd = Category::where('id','=',$id)->first();
        if(strcmp($fnd->url, $req->url) == 0)
        {

        }
        else
        {
            $fndnew = Category::where('url','=',Str::slug($req->url,'-'))->count();
            if($fndnew==0)
            {
                $ctgd['url'] = Str::slug($req->url,'-');
            }
        }


        $req->validate(
            [
                'name' => "required",
                'banner' => 'mimes:jpg,jpeg,png,webp',
            ]
        );

        $ctg = new Category();
        $data = $ctg->findOrFail($id);
        $ctgd['name'] = $req->name;
        $ctgd['description'] = $req->description;


        if($req->hasFile('image'))
        {
            $file   = $req->file('image');
            $path   = 'images/upload/category';
            $file_name = time().rand(00,99).'.'.$file->getClientOriginalName();
            $file->move($path,$file_name);
            $ctgd['banner'] = $path. '/' .$file_name;
            if(file_exists($data->banner))
            {
                unlink($data->banner);
            }
        }

        if($data->update($ctgd))
        {
            session()->flash('success','Category Updated Successfully');
        }
        else{
            session()->flash('warning','Error Ocured');
        }
        return redirect()->back();

    }

    public function destroy($id)
    {
        $ctg = new Category();
        if($ctg->destroy($id))
        {
            session()->flash('success','Category Delete Successfully');
        }
        else{
            session()->flash('warning','Error Ocured');
        }
        return redirect()->back();
    }
}
