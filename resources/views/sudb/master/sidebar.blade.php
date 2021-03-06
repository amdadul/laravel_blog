<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="height: 60px;">
            <div class="pull-left image">
                <img src="{{asset(auth()->user()->image)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    {{auth()->user()->name}}
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{route('admin.home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Posts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('post.manage')}}"><i class="fa fa-circle-o"></i> Manage Posts</a></li>
                    <li><a href="{{route('post.create')}}"><i class="fa fa-circle-o"></i> Create Post</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Category</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.manage')}}"><i class="fa fa-circle-o"></i> Manage Categories</a></li>
                    <li><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i> Create Category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Slider</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('slider.index')}}"><i class="fa fa-circle-o"></i> Manage Sliders</a></li>
                    <li><a href="{{route('slider.create')}}"><i class="fa fa-circle-o"></i> Create Slider</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('comments')}}">
                    <i class="fa fa-comments" ></i>
                    <span>Comments</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
