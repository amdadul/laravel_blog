@extends('sudb.master')
@section('title')
    Create Post
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-success">{{ session('warning') }}</div>
@endif

<section class="content-header">
    <h1>
        Create Post
        <small>Developed by moslinsoft</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('post.manage')}}"><i class="fa fa-dashboard"></i> Posts</a></li>
        <li class="active">Create Post</li>
    </ol>
</section>

<div class="row" style="margin: 5px;">
    <!-- left column -->
    <div class="col-md-12" >
        <!-- general form elements -->
        <div class="box box-primary" >


    <form action="{{isset($post)?route('post.update',$post->id):route('post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" class="form-control"  value="{{old('title',isset($post->title)?$post->title:null)}}" id="title" placeholder="Post Title">
                @error('title')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="url">Post URL</label>
                <input type="text" name="url" class="form-control"  value="{{old('url',isset($post->url)?$post->url:null)}}" id="url" placeholder="Post Url">
                @if(session()->has('warning'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="ctg">Post Category</label>
                    <select name="category" id="ctg" class="form-control select2" >
                        <option value="0">Select Category</option>
                        @foreach($ctg as $row)
                                <option @if(old('category',isset($post->category_id)?$post->category_id:null)==$row['id']) selected @endif value="{{$row['id']}}">{{$row['name']}}</option>
                        @endforeach
                    </select>
                @error('category')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tag">Post Tags</label>
                <select name="tag[]" id="tag" class="form-control select2" multiple="multiple">
                    <option value="0">Select Tags</option>
                    @foreach($tag as $row)
                        <option value="{{$row->id}}"
                            @if(isset($posttag))
                                @foreach($posttag as $pt)
                                    @if($pt->tag_id==$row->id)
                                    selected="selected"
                                    @endif
                                @endforeach
                            @endif
                            >{{$row['name']}}</option>
                    @endforeach
                </select>
                @error('tag')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="longdesc">Post Short Description</label>
                <textarea name="shortdescription" id="shortdesc" cols="50" rows="20">{{isset($post->longdesc)?$post->longdesc:null}}</textarea>
                @error('shortdescription')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="longdesc">Post Description</label>
                    <textarea name="description" id="longdesc" cols="50" rows="20">{{isset($post->longdesc)?$post->longdesc:null}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <img id="imageview" src="{{old('image',isset($post->image)?asset($post->image):null)}}" alt="" width="100">
            <div class="form-group">
                <label for="image">Post Image</label>
                <input type="file" name="image" onchange="document.getElementById('imageview').src = window.URL.createObjectURL(this.files[0])" id="image">

                @error('image')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Post Status</label>
                    <select name="status" id="status" class="form-control select2">
                        <option @if(old('status',isset($post->status)?$post->status:null)=='publish') selected @endif value="publish">Publish</option>
                        <option @if(old('status',isset($post->status)?$post->status:null)=='draft') selected @endif value="draft">Draft</option>
                    </select>
            </div>
            <div class="form-group">
                <U> <i style="font-size: 20px;"> Make your Post Featured!</i></U><br>
                <label>
                    <input type="checkbox" class="flat-red" value="1" name="isfeatured" @if(old('isfeatured',isset($post->is_featured)?$post->is_featured:null)==1) checked @endif >
                     Featured Post
                </label>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" id="save" class="btn btn-primary">
                @if(isset($post))
                    Update
                @else
                    Save
                @endif
            </button>
        </div>
    </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{asset('assets/bower_components/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {

            //Select option
            $('.select2').select2()
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('shortdesc')
            CKEDITOR.replace('longdesc')

            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection
