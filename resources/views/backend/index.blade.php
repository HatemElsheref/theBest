@extends('backend.shared.app')


@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{__('dashboard.statistics')}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <div class="row">
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <!-- small box -->--}}
{{--                    <div class="small-box bg-aqua">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>150</h3>--}}
{{--                            <p>New Orders</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="fa fa-shopping-cart"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">--}}
{{--                            More info <i class="fa fa-arrow-circle-right"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div><!-- ./col -->--}}
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <!-- small box -->--}}
{{--                    <div class="small-box bg-green">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>53<sup style="font-size: 20px">%</sup></h3>--}}
{{--                            <p>Bounce Rate</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-stats-bars"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">--}}
{{--                            More info <i class="fa fa-arrow-circle-right"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div><!-- ./col -->--}}
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$admins}}</h3>
                            <p>{{__('dashboard.admins')}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="{{route('admin.index')}}" class="small-box-footer">

                            {{__('dashboard.more')}}
                            <i class="fa fa-arrow-circle-left"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$roles}}</h3>
                            <p>{{__('dashboard.roles')}}</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-list"></i>
                        </div>
                        <a href="{{route('role.index')}}" class="small-box-footer">

                            {{__('dashboard.more')}}
                            <i class="fa fa-arrow-circle-left"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <!-- small box -->--}}
{{--                    <div class="small-box bg-red">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>65</h3>--}}
{{--                            <p>Unique Visitors</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-pie-graph"></i>--}}
{{--                        </div>--}}
{{--                        <a href="#" class="small-box-footer">--}}
{{--                            More info <i class="fa fa-arrow-circle-right"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div><!-- ./col -->--}}
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
