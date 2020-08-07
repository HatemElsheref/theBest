
<header class="main-header">
    <!-- Logo -->
    <a href="{{route('dashboard.index')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>{{env('APP_NAME')}}</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{{env('APP_NAME')}}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
{{--        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">--}}
{{--            <span class="sr-only">Toggle navigation</span>--}}
{{--        </a>--}}
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications Menu -->
{{--                <li class="dropdown notifications-menu">--}}
{{--                    <!-- Menu toggle button -->--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-bell-o"></i>--}}
{{--                        <span class="label label-warning">10</span>--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li class="header">You have 10 notifications</li>--}}
{{--                        <li>--}}
{{--                            <!-- Inner Menu: contains the notifications -->--}}
{{--                            <ul class="menu">--}}
{{--                                <li><!-- start notification -->--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <!-- end notification -->--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="footer"><a href="#">View all</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <!-- Language Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-language"></i>
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <!-- Inner menu: contains the languages -->
                            <ul class="menu">

                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" class="text-black" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                                <!-- end language item -->
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{auth('dashboard')->user()->image()}}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{auth('dashboard')->user()->first_name.' '.auth('dashboard')->user()->last_name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{auth('dashboard')->user()->image()}}" class="img-circle" alt="User Image">

                            <p>
                                {{auth('dashboard')->user()->first_name.' '.auth('dashboard')->user()->last_name}}
                                <small>{{auth('dashboard')->user()->role->name}}</small>
                                <small>{{auth('dashboard')->user()->created_at->format('Y/m/d')}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{route('account.index')}}" class="btn btn-default btn-flat">{{__('dashboard.account')}}</a>
                            </div>
                            <div @if(app()->getLocale() == 'ar') class="pull-right"  @else style="float: right" @endif>
                                <a href="" onclick="document.getElementById('logout-form').submit();return false" class="btn btn-default btn-flat">{{__('dashboard.logout')}}</a>
                                <form method="post" id="logout-form" action="{{route('dashboard.logout')}}">
                                           @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>


