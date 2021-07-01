@extends('sudb.master')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('title')
    Roles Management
@endsection


@section('content')

    <section class="content-header">
        <h1>
            Manage Roles
            <small>Developed by moslinsoft</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Roles</li>
        </ol>
    </section>

@if(session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-success">{{ session('warning') }}</div>
@endif

<div class="row " style="margin: 5px;">
    <div class="col-xs-12">
        <a href="{{route('roles.create')}}" class="btn btn-primary" align="right">Create Role</a>
        <div class="box" style="padding: 10px;">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr><th>SL</th><th>Role</th><th>Permissions</th><th>Action</th> </tr>
        </thead>
        <tbody>
            @foreach($roles as $row)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->permissions}}</td>
                <td style="width: 100px;">

                    <a href="{{route('roles.edit',encrypt($row->id))}}">
                        <img src="{{asset('images/login/icon/pencil-square.svg')}}" alt="" width="25" >
                    </a>
                    <form action="{{route('roles.destroy',$row->id)}}" method="post" style="display: inline;">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you want to delete from database?');">
                        <img src="{{asset('images/login/icon/trash-fill.svg')}}" alt="" >
                    </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->
@endsection

@section('script')
    <script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
