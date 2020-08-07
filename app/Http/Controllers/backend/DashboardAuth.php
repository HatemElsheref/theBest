<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAuth extends Controller
{
    use Authenticatable;
    public function showLoginForm(){
        return view('backend.auth.login');
    }

    public function login(Request $request){
      $request->validate([
          'password'=>'required',
          'email'=>'required',
      ]) ;
      $remember_me=$request->has('remember')?true:false;
      if(Auth::guard('dashboard')->attempt(['email'=>$request->email,'password'=>$request->password],$remember_me)){
        $admin=\auth('dashboard')->user();
        if ($admin->blocked){
            \auth('dashboard')->logout();
            return redirect()->back()->withErrors(['email'=>__('dashboard.blocked_admin')]);
        }
        $admin->online=true;
        if ($admin->lang!=null){
            $url=\LaravelLocalization::getLocalizedURL($admin->lang, 'dashboard');
        }else{
            $url=route('dashboard.index');
        }
        $admin->lang=app()->getLocale();
        $admin->save();
        \auth('dashboard')->loginUsingId($admin->id);
          if(session()->has('my_permissions')){
              session()->forget('my_permissions');
          }
        session()->put('my_permissions',$admin->role->permissions->pluck('name')->toArray());
          toast(__('dashboard.welcome_msg'),'success')->position(alertDirection());
          return redirect($url);
      }else{
          return redirect()->back()->withInput()->withErrors(['email'=>__('dashboard.invalid_login')]);
      }

    }

    public function logout(){
        $admin=\auth('dashboard')->user();
        $admin->online=false;
        $admin->lang=app()->getLocale();
        $admin->save();
      \auth('dashboard')->logout();
      if(session()->has('my_permissions')){
          session()->forget('my_permissions');
      }
      return redirect()->route('dashboard.index');
    }

    /*
     * forget password function
     * reset password function
     * */
}
