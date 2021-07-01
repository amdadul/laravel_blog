@extends('sudb.master')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection


@section('title')
    Slider Management
@endsection


@section('content')

    <section class="content-header">
        <h1>
            Manage Slider
            <small>Developed by moslinsoft</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Slider</li>
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
            <a href="{{route('slider.create')}}" class="btn btn-primary" align="right">Create Slider</a>
            <div class="box" style="padding: 10px;">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr><th>SL</th><th>ALT Text</th><th>URL</th><th>Priority</th><th>Slider</th><th>Action</th> </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $row)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$row->alt}}</td>
                            <td>{{$row->url}}</td>
                            <td>{{$row->position}}</td>
                            <td><img src="{{asset($row->image)}}"></td>
                            <td style="width: 100px;">

                                <a href="{{route('slider.edit',encrypt($row->id))}}">
                                    <img src="{{asset('images/login/icon/pencil-square.svg')}}" alt="" width="25" >
                                </a>
                                <form action="{{route('slider.destroy',$row->id)}}" method="post" style="display: inline;">
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
