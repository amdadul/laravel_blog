<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tag'] = Tag::all();
        return view('tag.manage',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'name' =>'required',
            'url' =>'required',
        ]
        );
        $isURL = Tag::where('url',Str::slug($request->url,'-'))->count();
        if($isURL==0)
        {
            $tag = new Tag();
            $tag->name = $request->name;
            $tag->url = Str::slug($request->url,'-');
            if($tag->save())
            {
                session()->flash('success', 'Tag Save Successfully');
            }
            else
            {
                ession()->flash('warning', 'Something went Wrong!');
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $data['tag'] = $tag;
        return view('tag.create',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate(
            [
                'name' =>'required',
                'url' =>'required',
            ]
        );


        $fnd = Tag::where('id','=',$tag->id)->first();
        if(strcmp($request->url, $fnd->url) == 0)
        {

        }
        else
        {
            $fndnew = Post::where('url','=',Str::slug($request->url,'-'))->count();
            if($fndnew==0) {
                $tags['url'] = Str::slug($request->url, '-');
            }
        }
        $tags['name'] = $request->name;

        if($tag->update($tags))
        {
            session()->flash('success', 'Tag Save Successfully');
        }
        else
        {
            ession()->flash('warning', 'Something went Wrong!');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag->destroy($tag->id))
        {
            session()->flash('success','Tag Delete Successfully');
        }
        else{
            session()->flash('warning','Something went Wrong!');
        }
        return redirect()->back();
    }
}
