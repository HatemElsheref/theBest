
@extends('backend.shared.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @lang('dashboard.admins')

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard_lbl')</a></li>
                <li class="active"><a href="{{route('admin.index')}}"> @lang('dashboard.admins')</a></li>
                <li class="active">@lang('dashboard.add_admin')</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Form column -->
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">@lang('dashboard.add_admin')</h3>
                        </div><!-- /.box-header -->

                    @include('backend.shared.error')

                    <!-- form start -->
                        <form role="form" method="post" action="{{route('admin.store')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="first_name">@lang('dashboard.first_name')</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="@lang('dashboard.enter') @lang('dashboard.first_name')" value="{{old('first_name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">@lang('dashboard.last_name')</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="@lang('dashboard.enter') @lang('dashboard.last_name')" value="{{old('last_name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">@lang('dashboard.email')</label>
                                    <input type="email" class="form-control" name="email" placeholder="@lang('dashboard.enter') @lang('dashboard.email')" value="{{old('email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="avatar">@lang('dashboard.avatar')</label>
                                    <input type="file" class="form-control" name="photo" id="avatar">
                                    <img id="tmp_image" src="{{url(default_user_image)}}" class="img-circle" style="width: 40px;height: 40px;" onclick="document.getElementById('avatar').click()">
                                </div>
                                <div class="form-group">
                                    <label for="phone">@lang('dashboard.gender')</label>
                                    <div class="radio">

                                        <label>
                                            <input type="radio" name="gender" value="male" @if(old('gender')=='male') checked @endif>
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender"  value="female" @if(old('gender')=='female') checked @endif>
                                          Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">@lang('dashboard.phone')</label>
                                    <input type="text" class="form-control" name="phone" placeholder="@lang('dashboard.enter') @lang('dashboard.phone')" value="{{old('phone')}}">
                                </div>
                                <div class="form-group">
                                    <label for="password">@lang('dashboard.password')</label>
                                    <input type="password" class="form-control" name="password" placeholder="@lang('dashboard.enter') @lang('dashboard.password')">
                                </div>
                                <div class="form-group">
                                    <label for="confirmation_password">@lang('dashboard.password_confirmation')</label>
                                    <input type="password" id="confirmation_password" class="form-control" name="password_confirmation" placeholder="@lang('dashboard.password_confirmation')">
                                </div>
                                <div class="form-group">
                                    <label for="permissions">@lang('dashboard.role')</label>
                                    <select class="form-control" name="role_id">
                                        <option disabled selected>{{__('dashboard.select_role')}}</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($role->id==old('role_id')) selected @endif>{{$role->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.save')</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col (Form) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->

    </div>
@endsection


@push('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#tmp_image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#avatar").change(function() {
            readURL(this);
        });
    </script>
    @endpush
