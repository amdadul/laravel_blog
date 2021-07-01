@extends('sudb.master')
@section('title')
    Create Category
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
        Create Category
        <small>Developed by moslinsoft</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('category.manage')}}"><i class="fa fa-dashboard"></i> Categories</a></li>
        <li class="active">Create Category</li>
    </ol>
</section>

<div class="row" style="margin: 5px;">
    <!-- left column -->
    <div class="col-md-12" >
        <!-- general form elements -->
        <div class="box box-primary" >


    <form action="{{isset($ctg)?route('category.update',$ctg->id):route('category.store')}}" method="post" enctype="multipart/form-data">
    @csrf
     <div class="box-body">
         <div class="form-group">
             <label for="name">Category Name</label>
             <input type="text" class="form-control" name="name" id="name" value="{{old('name',isset($ctg->name) ? $ctg->name : null)}}" placeholder="Category Name">
         </div>
         <div class="form-group">
             <label for="url">Category URL</label>
             <input type="text" class="form-control" name="url" id="url" value="{{old('url',isset($ctg->url) ? $ctg->url : null)}}" placeholder="Category URL">
         </div>
         <div class="form-group">
             <label for="editor1">Category Description</label>
             <textarea name="description" id="editor1" cols="30" rows="10">{{old('description',isset($ctg->description)?$ctg->description:'Enter Category Description')}}</textarea>
         </div>

        <img id="imageview" src="{{old('image',isset($ctg->banner)?asset($ctg->banner):null)}}" alt="" width="100">

         <div class="form-group">
             <label for="Image">Upload Category Image</label>
             <input type="file" name="image" onchange="document.getElementById('imageview').src = window.URL.createObjectURL(this.files[0])" id="image" >
         </div>
     </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary" id="save">
            @if(isset($ctg))
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
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection
