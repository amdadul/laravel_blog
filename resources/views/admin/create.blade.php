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
            <li><a href="{{route('admins.index')}}"><i class="fa fa-dashboard"></i>Admins List</a></li>
            <li class="active">Create Category</li>
        </ol>
    </section>

    <div class="row" style="margin: 5px;">
        <!-- left column -->
        <div class="col-md-12" >
            <!-- general form elements -->
            <div class="box box-primary" >


                <form action="{{isset($admin)?route('admins.update',$admin->id):route('admins.store')}}" method="post" enctype="multipart/form-data">

                    @if(isset($admin))
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Admin Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name',isset($admin->name) ? $admin->name : null)}}" placeholder="Admin Name">
                        </div>
                        <div class="form-group">
                            <label for="url">Admin Email</label>
                            <input type="email" class="form-control" name="email" id="url" value="{{old('email',isset($admin->email) ? $admin->email : null)}}" placeholder="Admin Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>

                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple>
                                <option value="0">Select Roles</option>
                                @foreach($roles as $row)
                                    <option  value="{{$row['name']}}" {{$admin->hasRole($row->name)?'selected':''}}>{{$row['name']}}</option>
                                @endforeach
                            </select>
                            @error('roles')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="save">
                            @if(isset($admin))
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
    <script src="{{asset('assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Select option
            $('.select2').select2()
        })
    </script>
    </script>
@endsection
