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
            Create Slider
            <small>Developed by moslinsoft</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('slider.index')}}"><i class="fa fa-dashboard"></i> Slides</a></li>
            <li class="active">Create Slider</li>
        </ol>
    </section>

    <div class="row" style="margin: 5px;">
        <!-- left column -->
        <div class="col-md-12" >
            <!-- general form elements -->
            <div class="box box-primary" >


                <form action="{{isset($slide)?route('slider.update',$slide->id):route('slider.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="alt">Slide ALT</label>
                            <input type="text" class="form-control" name="alt" id="name" value="{{old('alt',isset($slide->alt) ? $slide->alt : null)}}" placeholder="Slide Alt Text">
                        </div>
                        <div class="form-group">
                            <label for="url">Slide URL</label>
                            <input type="text" class="form-control" name="url" id="url" value="{{old('url',isset($slide->url) ? $slide->url : null)}}" placeholder="Slide URL">
                        </div>
                        <div class="form-group">
                            <label for="position">Slide Position</label>
                            <input type="number" name="position" id="position" class="form-control">
                        </div>

                        <img id="imageview" src="{{old('image',isset($slide->image)?asset($slide->image):null)}}" alt="" width="100%">

                        <div class="form-group">
                            <label for="Image">Upload Slide Image</label>
                            <input type="file" name="image" onchange="document.getElementById('imageview').src = window.URL.createObjectURL(this.files[0])" id="image" >
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="save">
                            @if(isset($slide))
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
