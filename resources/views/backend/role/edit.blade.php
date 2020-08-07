
@extends('backend.shared.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('dashboard.roles')

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard_lbl')</a></li>
                <li class="active"><a href="{{route('role.index')}}"> @lang('dashboard.roles')</a></li>
                <li class="active">@lang('dashboard.edit_role')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Form column -->
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">@lang('dashboard.edit_role')</h3>
                        </div><!-- /.box-header -->

                    @include('backend.shared.error')

                    <!-- form start -->
                        <form role="form" method="post" action="{{route('role.update',$role->id)}}">
                          @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{$role->id}}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">@lang('dashboard.role_name')</label>
                                    <input type="text" class="form-control" name="name" placeholder="@lang('dashboard.enter') @lang('dashboard.role_name')" value="{{$role->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="first_name">@lang('dashboard.role_description')</label>
                                    <input type="text" class="form-control" name="description" placeholder="@lang('dashboard.enter') @lang('dashboard.role_description')" value="{{$role->description}}">
                                </div>


                                <div class="form-group">
                                    <label for="permissions">@lang('dashboard.permissions')</label>
                                </div>
                            </div><!-- /.box-body -->

                            {{--Permissions zone--}}

                            <div class="col-md-12">
                                <div class="nav-tabs-custom" >
                                    <ul class="nav nav-tabs  @if(app()->getLocale()=="ar") 'pull-right'@else '' @endif " >
                                        @php
                                         $models=config('permissions.models');
                                         $operations=config('permissions.map');
                                         @endphp


                                        @foreach($models as $key => $value)
                                            <li class=" @if($loop->index == 0) active @endif ">
                                                <a href="#{{$key}}" data-toggle="tab" >{{__('dashboard.'.$key)}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <span class="clearfix"></span>
                                    <div class="tab-content">
                                        @foreach($models as $key => $value)
                                            <div class="tab-pane  @if($loop->index == 0) active @endif " id="{{$key}}">
                                                <div style="margin-right: 0px;padding-right: 0px">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            @foreach($value as $crud_operation)
                                                                <div class="form-group pull-right" style="margin-left: 10px">
                                                                    <div class="checkbox-inline">

                                                                        <input type="checkbox" id="{{strtolower($operations[$crud_operation].'_'.$key)}}" value="{{strtolower($operations[$crud_operation].'_'.$key)}}" name="permissions[]"
                                                                            {{(in_array(strtolower($operations[$crud_operation].'_'.$key),$role->myPermissionsIds()))?'checked':''}}>
                                                                        <label for="{{strtolower($operations[$crud_operation].'_'.$key)}}">@lang('dashboard.'.$operations[$crud_operation]) {{--__('dashboard.'.$key)--}} </label>
                                                                    </div>
                                                                </div>
                                                            @endforeach





                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- /.tab-pane -->
                                        @endforeach

                                    </div><!-- /.tab-content -->
                                </div>
                            </div><!-- /.col -->






                            <div class="box-footer">
                                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>    @lang('dashboard.edit') </button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col (Form) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->

    </div>
@endsection

{{--@foreach(trans()->get('dashboard.sections') as $key => $value)--}}
{{--    <li class=" @if($loop->index == 0) active @endif "><a href="#{{$key}}" data-toggle="tab" class="{{($value==trans()->get('dashboard.admins'))?'active':''}}">{{$value}}</a></li>--}}
{{--    @endforeach--}}
{{--    </ul>--}}
{{--    <span class="clearfix"></span>--}}
{{--    <div class="tab-content">--}}
{{--        @foreach(trans()->get('dashboard.sections') as $key => $value)--}}
{{--            <div class="tab-pane  @if($loop->index == 0) active @endif " id="{{$key}}">--}}
{{--                <div style="margin-right: 0px;padding-right: 0px">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}

{{--                            @foreach(trans()->get('dashboard.crud_map') as $crud_key=>$crud_operation)--}}
{{--                                <div class="form-group pull-right" style="margin-left: 10px">--}}
{{--                                    <div class="checkbox-inline">--}}

{{--                                        <input type="checkbox" id="{{$crud_operation.$key}}" value="{{$crud_operation.$key}}" name="permissions[]"--}}
{{--                                            {{(in_array($crud_operation.$key,(array)old('permissions')))?'checked':''}}>--}}
{{--                                        <label for="{{$crud_operation.$key}}">@lang('dashboard.'.$crud_key) {{$value}} </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}





{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div><!-- /.tab-pane -->--}}
{{--@endforeach--}}



