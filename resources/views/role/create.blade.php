@extends('sudb.master')
@section('title')
    Create new role
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
            Create new role
            <small>Developed by moslinsoft</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('roles.index')}}"><i class="fa fa-dashboard"></i> Roles</a></li>
            <li class="active">Create new role</li>
        </ol>
    </section>

    <div class="row" style="margin: 5px;">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">


                <form action="{{isset($roles)?route('roles.update',$roles->id):route('roles.store')}}" method="post"
                      enctype="multipart/form-data">
                    @if(isset($roles))
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{old('name',isset($roles->name)?$roles->name:null)}}" id="name"
                                   placeholder="Role Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong style="color: #9e0505;">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <i style="font-size: 20px;">Assign Permissions</i>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="all" value="1">
                                <label class="form-check-label" for="all">
                                    All
                                </label>

                            </div>
                            @php
                                $group = $groupname="";
                                $hr =1;
                            @endphp
                            @foreach($permissions as $permission)
                                @php
                                    $values = explode(".",$permission->name);
                                    if (!strcmp($group,$values[0])) {
                                        $hr =0;
                                        $groupname="";
                                    } else {
                                        $group = "";
                                    }
                                    if($group=="") {
                                        $groupname = $values[0];
                                        $group = $values[0];
                                        $hr =1;
                                    }
                                @endphp
                                @if($hr==1)
                                    <hr>
                                @endif
                                <div class="row" id="{{$group}}row">
                                    @if($hr==1)
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="{{$groupname}}"
                                                       value="{{$groupname}}"
                                                       onclick="checkbygroup('{{$group}}row',this)">
                                                <label class="form-check-label" for="{{$groupname}}">
                                                    {{ucfirst($groupname)}}
                                                </label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-3">
                                        </div>
                                    @endif
                                    <div class="col-md-9">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input checkbox"
                                                   id="{{$permission->name}}"
                                                   name="perm[]"
                                                   value="{{$permission->name}}" {{isset($roles)?($roles->hasPermissionTo($permission->name)?'checked':null):null}} >
                                            <label class="form-check-label" for="{{$permission->name}}">
                                                {{$permission->name}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" id="save" class="btn btn-primary">
                            @if(isset($roles))
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
        $("#all").click(function () {
            if ($(this).is(':checked')) {
                $('input[type=checkbox]').prop('checked', true);
            } else {
                $('input[type=checkbox]').prop('checked', false);
            }
        });

        function checkbygroup(idname, checkthis) {
            const groupid = $("#" + checkthis.id);
            const rowid = $("#" + idname + " input");

            if (groupid.is(':checked')) {
                rowid.prop('checked', true);
            } else {
                rowid.prop('checked', false);
            }
        }
        

        $(function () {

            //Select option
            $('.select2').select2()
            // Replace the <textarea id="editor1"> with a CKEditor

        })
    </script>
@endsection
