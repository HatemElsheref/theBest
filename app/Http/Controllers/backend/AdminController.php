<?php

namespace App\Http\Controllers\backend;

use App\backend\Admin;
use App\backend\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('permission:read_admins')->only(['index']);
        $this->middleware('permission:delete_admins')->only(['destroy']);
        $this->middleware('permission:create_admins')->only(['create','store']);
        $this->middleware('permission:update_admins')->only(['edit','roles']);
    }


    public function index(Request $request)
    {
        $query=Admin::query();
        $query->with('role')->orderByDesc('id')->where(function ($query1) use ($request){
           return    $query1->when($request->search,function ($query2) use ($request){
              return $query2->where('first_name','like','%'.$request->search.'%')
                                      ->orWhere('last_name','like','%'.$request->search.'%')
                                      ->orWhere('email','like','%'.$request->search.'%')
                                      ->orWhere('gender','like','%'.$request->search.'%');
           });
        });

        $admins=$query->paginate(pagination);
        return view('backend.admin.index',compact('admins'));
    }

    public function create()
    {
        $roles=Role::all();
        return view('backend.admin.create')->with('roles',$roles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required|string|max:191',
            'last_name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:admins,email',
            'role_id'=>'required|numeric|exists:roles,id',
            'gender'=>'required|in:male,female',
            'phone'=>'required|numeric|unique:admins,phone',
            'photo'=>'image|mimes:jpg,png,jpeg,webp',
            'password'=>'required|min:5|confirmed'
        ]);
        $validated_data=$request->except(['password','password_confirmation','photo']);
        if ($request->hasFile('photo')){
            $path=$request->file('photo')->store(admin_path);
        }else{
            $path=default_user_image;
        }
        $validated_data['photo']=$path;
        $validated_data['password']=bcrypt($request->password);
        $admin=Admin::create($validated_data);
        if ($admin){
            toast(__('dashboard.success_create'),'success')->position(alertDirection());
        }else{
            toast(__('dashboard.fail_create'),'error')->position(alertDirection());
        }
           return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $admin=Admin::findOrFail($id);
        $roles=Role::all();
        return view('backend.admin.edit',compact('admin'))->with('roles',$roles);
    }

    public function update(Request $request, $id)
    {
        $admin=Admin::findOrFail($id);
             if ($admin->type=='admin'){
                 toast(__('dashboard.can_not_do_that'), 'info')->position(alertDirection());
                 return redirect()->route('admin.index');
             }
        $request->validate([
            'id'=>'required|numeric',
            'first_name'=>'required|string|max:191',
            'last_name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:admins,email,'.$admin->id,
            'role_id'=>'required|numeric|exists:roles,id',
            'gender'=>'required|in:male,female',
            'phone'=>'required|numeric|unique:admins,phone,'.$admin->id,
            'photo'=>'image|mimes:jpg,png,jpeg,webp',
        ]);

            if ($request->id!=$id){
            toast(__('dashboard.can_not_do_that'), 'info')->position(alertDirection());
            return redirect()->route('admin.index');
        }

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
            toast(__('dashboard.success_update'),'success')->position(alertDirection());
        }else{
            toast(__('dashboard.fail_update'),'error')->position(alertDirection());
        }
        return redirect()->route('admin.index');

    }

    public function destroy($id)
    {
        $admin=Admin::findOrFail($id);
                 if ($admin->type=='moderator'){
                        if ($admin->photo!=default_user_image){
                            Storage::disk('uploads')->delete($admin->photo);
                        }
                        $admin->delete();
                     toast(__('dashboard.success_delete'), 'success')->position(alertDirection());
                     return redirect()->route('admin.index');
                 }else{
                     toast(__('dashboard.can_not_do_that'), 'info')->position(alertDirection());
                     return redirect()->route('admin.index');
                 }
    }
}
