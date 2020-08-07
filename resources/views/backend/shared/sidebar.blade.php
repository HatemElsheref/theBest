
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{auth('dashboard')->user()->image()}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p >{{substr(auth('dashboard')->user()->first_name,0,5)}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{__('dashboard.online')}}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"> {{__('dashboard.management_panel')}}</li>
            <!-- Optionally, you can add icons to the links -->


            <li class="active">
                <a href="{{route('dashboard.index')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>
                              {{__('dashboard.dashboard_lbl')}}
                    </span>
                </a>
            </li>

            <li class="">
                <a href="{{route('admin.index')}}">
                    <i class="fa fa-shield"></i>
                    <span>
                              {{__('dashboard.admins')}}
                    </span>
                </a>
            </li>
            <li >
                <a href="{{route('role.index')}}">
                    <i class="fa fa-tasks"></i>
                    <span>
                              {{__('dashboard.roles')}}
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-pencil"></i> <span> {{__('dashboard.blog')}}</span> <i class="fa fa-angle-left @if(LaravelLocalization::getCurrentLocaleDirection()=='rtl') pull-left @else pull-right @endif" @if(LaravelLocalization::getCurrentLocaleDirection()=='rtl') style="margin-top:0px!important;" @endif></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{__('dashboard.posts')}}</a></li>
                    <li><a href="#">{{__('dashboard.categories')}}</a></li>
                    <li><a href="#">{{__('dashboard.tags')}}</a></li>
                </ul>
            </li>


            <li class="">
                <a href="{{route('admin.index')}}">
                    <i class="fa fa-cogs"></i>
                    <span>
                              {{__('dashboard.settings')}}
                    </span>
                </a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

