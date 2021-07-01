@extends('sudb.master')
@section('title')
    Create Tag
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
            <li><a href="{{route('tag.index')}}"><i class="fa fa-dashboard"></i> Tags</a></li>
            <li class="active">Create Tag</li>
        </ol>
    </section>

    <div class="row" style="margin: 5px;">
        <!-- left column -->
        <div class="col-md-12" >
            <!-- general form elements -->
            <div class="box box-primary" >


                <form action="{{isset($tag)?route('tag.update',$tag->id):route('tag.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(isset($tag))
                        @method('put')
                    @endif
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Tag Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name',isset($tag->name) ? $tag->name : null)}}" placeholder="Tag Name">
                        </div>
                        <div class="form-group">
                            <label for="url">Tag URL</label>
                            <input type="text" class="form-control" name="url" id="url" value="{{old('url',isset($tag->url) ? $tag->url : null)}}" placeholder="tag URL">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="save">
                            @if(isset($tag))
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
