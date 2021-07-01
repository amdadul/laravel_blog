<!DOCTYPE html>
<html>
@include('sudb.master.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('sudb.master.menu')
    <!-- Left side column. contains the logo and sidebar -->
@include('sudb.master.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

@include('sudb.master.footer')



</div>
<!-- ./wrapper -->

@include('sudb.master.script')
@yield('script')
</body>
</html>
