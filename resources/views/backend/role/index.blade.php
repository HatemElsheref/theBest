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
        @_can('delete_roles')
        <form method="post" action="" id="remove-element" data-url="{{route('role.index')}}">
            @csrf
            @method('delete')
        </form>
        @_cant
        <section class="content-header">
            <h1>
                @lang('dashboard.roles')

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard_lbl')</a></li>
                <li class="active">@lang('dashboard.roles')</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">

                <div class="col-xs-12" style="margin-bottom:7px">
                    @_can('create_roles')
                    <a href="{{route('role.create')}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i>
                         {{__('dashboard.add_role')}}
                    </a>
                        @_cant
                </div>
                    <div class="col-xs-12" >
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">{{__('dashboard.role_table')}}</h3>

                            <div class="box-tools">
                                <form method="get" action="{{route('role.index')}}">
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
                                    <th>{{__('dashboard.name')}}</th>
                                    <th>{{__('dashboard.description')}}</th>
                                    <th>{{__('dashboard.date')}}</th>
                                    <th>{{__('dashboard.permissions')}}</th>
                                    <th>{{__('dashboard.control')}}</th>
                                </tr>
                                @forelse($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->description}}</td>
                                        <td>{{$role->created_at->format('Y/m/d')}}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-permissions-{{$role->id}}">
                                                <i class="fa fa-eye"></i>
                                               {{__('dashboard.view').' '.__('dashboard.permissions')}}
                                            </button>
                                            <div class="modal fade" id="modal-permissions-{{$role->id}}" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">{{__('dashboard.permissions')}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            @forelse($role->permissions as $permission)
                                                                <span class="label label-success" style="display: inline-block;margin-top: 8px">{{__('dashboard.'.strtolower(explode('_',$permission->name)[0])).' '.__('dashboard.'.strtolower(explode('_',$permission->name)[1]))}}</span>
                                                            @empty
                                                            @lang('dashboard.no_permissions_founded')
                                                            @endforelse
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">

                                                                {{__('dashboard.close')}}</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                        </td>
                                        <td>
                                               @_can('delete_roles')
                                         @if($role->type=='normal')
                                                <button class="btn btn-sm btn-danger" onclick="removeElement('{{__('dashboard.sure_remove')}}','{{__('dashboard.sure')}}','{{__('dashboard.close')}}','{{$role->id}}')">
                                                    <i class="fa fa-trash"></i>
                                                    {{__('dashboard.delete')}}</button>
                                             @else
                                                <button class="btn btn-sm btn-danger" disabled>
                                                    <i class="fa fa-trash"></i>
                                                    {{__('dashboard.delete')}}</button>
                                         @endif
                                            @_cant
                                            @_can('update_roles')
                                            <a href="{{route('role.edit',$role->id)}}" class="btn btn-sm btn-success">
                                                <i class="fa fa-edit"></i>
                                                {{__('dashboard.edit')}}
                                            </a>
                                            @_cant
                                        </td>
                                    </tr>
                                    @empty
                                    <td colspan="7" class="text-center">@lang('dashboard.no_data_founded')</td>
                                    @endforelse

                                </tbody></table>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {!! $roles->appends(['search'=>request()->query('search')])->links() !!}
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
