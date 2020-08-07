<?php

namespace App\Http\Controllers\backend;


use App\backend\Admin;
use App\backend\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{

    public function index(){
        $admin=auth('dashboard')->user();
        $roles=Role::all();
        return view('backend.admin.profile.index',compact('admin'))->with('roles',$roles);
    }

    public function update(Request $request){
        $id=auth('dashboard')->user()->id;
        $admin=Admin::findOrFail($id);
        $request->validate([
            'first_name'=>'required|string|max:191',
            'last_name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:admins,email,'.$admin->id,
            'role_id'=>'required|numeric|exists:roles,id',
            'gender'=>'required|in:male,female',
            'phone'=>'required|numeric|unique:admins,phone,'.$admin->id,
            'photo'=>'image|mimes:jpg,png,jpeg,webp',
        ]);

        $validated_data=$request->except(['password','password_confirmation','photo']);
        if ($request->hasFile('photo')){
            if ($admin->photo!=default_user_image){
                Storage::disk('uploads')->delete($admin->photo);
            }
            $path=$request->file('photo')->store(admin_path);
        }else{
            $path=$admin->photo;
        }
        $validated_data['photo']=$path;
        if ($request->has('password') and !empty($request->password)){
            $request->validate([
                'password'=>'min:5|confirmed'
            ]);
            $validated_data['password']=bcrypt($request->password);
        } else{
            $validated_data['password']=$admin->password;
        }


        if ($admin->update($validated_data)){
            auth('dashboard')->loginUsingId($id);
            toast(__('dashboard.success_update'),'success')->position(alertDirection());
        }else{
            toast(__('dashboard.fail_update'),'error')->position(alertDirection());
        }

        return redirect()->route('admin.index');
    }
}
