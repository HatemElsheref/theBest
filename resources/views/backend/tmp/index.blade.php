@extends('backend.shared.app')

@push('css')
    <style>
        .pagination{
            margin: 0px;
        }
    </style>
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <form method="post" action="" id="remove-element" data-url="{{route('admin.index')}}">
            @csrf
            @method('delete')
        </form>
        <section class="content-header">
            <h1>
                @lang('dashboard.admins')
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard_lbl')</a></li>
                <li class="active">@lang('dashboard.admins')</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">

                <div class="col-xs-12" style="margin-bottom:7px">
                    <a href="{{route('admin.create')}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                        {{__('dashboard.add_admin')}}</a>
                </div>
                <div class="col-xs-12" >
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">{{__('dashboard.admins_table')}}</h3>

                            <div class="box-tools">
                                <form method="get" action="{{route('admin.index')}}">
                                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                        <input type="text" name="search" class="form-control pull-right" placeholder="{{__('dashboard.search')}}">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>{{__('dashboard.id')}}</th>
                                    <th>{{__('dashboard.avatar')}}</th>
                                    <th>{{__('dashboard.name')}}</th>
                                    <th>{{__('dashboard.email')}}</th>
                                    <th>{{__('dashboard.phone')}}</th>
                                    <th>{{__('dashboard.role')}}</th>
                                    <th>{{__('dashboard.gender')}}</th>
                                    <th>{{__('dashboard.control')}}</th>
                                </tr>
                                @forelse($admins as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><img src="{{$item->image()}}" class="img-circle" style="width: 40px;height: 40px;"></td>
                                        <td>{{ucwords($item->first_name.' '.$item->last_name)}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{ucwords($item->role->name)}}</td>
                                        <td>{{ucfirst($item->gender)}}</td>
                                        <td>
{{--                                            @if(!($item->id==1 or $item->role_id==2))--}}
                                            @if($item->role_id==2)             {{-- is super admin--}}
                                                @if($item->id!=1)                        {{-- is not main super admin--}}
                                                    <button class="btn btn-sm btn-danger" onclick="removeElement('{{__('dashboard.sure_remove')}}','{{__('dashboard.sure')}}','{{__('dashboard.close')}}','{{$item->id}}')">
                                                        <i class="fa fa-trash"></i>
                                                        {{__('dashboard.delete')}}</button>
                                                    @else
                                                    <button class="btn btn-sm btn-danger" disabled>
                                                        <i class="fa fa-trash"></i>
                                                        {{__('dashboard.delete')}}</button>
                                                    @endif
                                                @else
                                                <button class="btn btn-sm btn-danger" onclick="removeElement('{{__('dashboard.sure_remove')}}','{{__('dashboard.sure')}}','{{__('dashboard.close')}}','{{$item->id}}')">
                                                    <i class="fa fa-trash"></i>
                                                    {{__('dashboard.delete')}}</button>

                                            @endif

                                                @if($item->role_id==2 )
                                                       @if(auth('dashboard')->user()->role_id==2)
                                                        <a href="{{route('admin.edit',$item->id)}}" class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                            {{__('dashboard.edit')}}</a>
                                                           @else
                                                        <button disabled class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                            {{__('dashboard.edit')}}</button>
                                                           @endif
                                                @else
                                                    <a href="{{route('admin.edit',$item->id)}}" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                        {{__('dashboard.edit')}}</a>
                                                    @endif


                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="8" class="text-center">@lang('dashboard.no_data_founded')</td>
                                @endforelse

                                </tbody></table>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {!! $admins->appends(['search'=>request()->query('search')])->links() !!}
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
    </div>
@endsection


@push('js')


@endpush
