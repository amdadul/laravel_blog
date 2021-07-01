<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:slider.index|slider.create|slider.edit|slider.delete', ['only' => ['index','show']]);
        $this->middleware('permission:slider.create', ['only' => ['create','store']]);
        $this->middleware('permission:slider.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:slider.delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' =>'required|mimes:jpg,jpeg,png,webp',
            'position' => 'required'
        ]);
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $path = 'images/upload/slider';
            $file_name = time() . rand(00, 99) . '.' . $file->getClientOriginalName();
            $resize_image = Image::make($file->getRealPath());
            $resize_image->resize(640, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $file_name);

            $imgpath = $path . '/' . $file_name;
        }
        $slide = new Slider();
        $slide['url'] = $request->url;
        $slide['alt'] = $request->alt;
        $slide['position'] = $request->position;
        $slide['image'] = $imgpath;
        if($slide->save())
        {
            session()->flash('success', 'Slide Save Successfully');
        }
        else{
            session()->flash('warning', 'Something went wrong!');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
