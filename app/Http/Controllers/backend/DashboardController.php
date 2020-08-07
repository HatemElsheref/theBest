<?php

namespace App\Http\Controllers\backend;

use App\backend\Admin;
use App\backend\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
//        dd(session('my_permissions'));
//        toast(__('dashboard.welcome_msg'),'success')->position(alertDirection());

        $data=[];
        $data['admins']=Admin::count();
        $data['roles']=Role::count();
        return view('backend.index',$data);
    }
}
