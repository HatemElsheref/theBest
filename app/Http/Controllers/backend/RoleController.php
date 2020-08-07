<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backend\Role;


class RoleController extends Controller
{
    public function __construct() {
        $this->middleware('permission:read_roles')->only(['index']);
        $this->middleware('permission:delete_roles')->only(['destroy']);
        $this->middleware('permission:create_roles')->only(['create','store']);
        $this->middleware('permission:update_roles')->only(['edit','roles']);
    }

    public function index(Request $request)
    {
        $query=Role::query();
//        $query->with('permissions')->whereNotIn('id',[1,2])->orderByDesc('created_at')->where(function ($qu) use ($request){
        $query->with('permissions')->orderByDesc('id')->where(function ($qu) use ($request){

           return $qu->when(!empty($request->search),function ($q) use ($request){

               return $q->where('description','like','%'.$request->search.'%')
                   ->orWhere('name','like','%'.$request->search.'%')
                   ->orderBy('created_at','desc');
           });
        });

        $roles=$query->paginate(pagination);
       return view('backend.role.index',compact('roles'));
    }

    public function create()
    {
        return view('backend.role.create');
    }

    public function store(Request $request)
    {
       $request->validate([
           'name'=>'required|string|max:191',
           'description'=>'required|string|max:191',
           'permissions'=>'required|array|min:1'
       ]);
       $role=Role::create([
           'name'=>$request->name,
           'description'=>$request->description
       ]);
       if ($role){
           $role->permissions()->attach(getPermissionsIds($request->permissions));
           toast(__('dashboard.success_create'),'success')->position(alertDirection());
           return redirect()->route('role.index');
       }else{
           toast(__('dashboard.fail_create'),'error')->position(alertDirection());
           return redirect()->route('role.index');
       }

    }

    public function edit($id)
    {
        $role=Role::findOrFail($id);
        return view('backend.role.edit',compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role=Role::findOrFail($id);

        $request->validate([
            'name'=>'required|string|max:191',
            'description'=>'required|string|max:191',
            'permissions'=>'required|array|min:1',
            'id'=>'required|numeric'
        ]);
        if ($request->id!=$role->id){
             toast(__('dashboard.can_not_do_that'),'error')->position(alertDirection());
            return redirect()->route('role.index');
        }else{
            $result=$role->update([
                'name'=>$request->name,
                'description'=>$request->description
            ]);
            if ($result){
                if($role->type!='main'){
                     $role->permissions()->sync(getPermissionsIds($request->permissions));
                }
                toast(__('dashboard.success_update'),'success')->position(alertDirection());
                return redirect()->route('role.index');
            }else{
                toast(__('dashboard.fail_update'),'error')->position(alertDirection());
                return redirect()->route('role.index');
            }

        }

    }

    public function destroy($id)
    {
        $role=Role::findOrFail($id);
        if ($role->type=='normal') {
            $role->permissions()->detach();
            $admins = $role->admins;
            foreach ($admins as $admin) {
                $admin->role_id = Role::where('name', 'default')->first()->id;
                $admin->save();
            }
            $role->delete();
            toast(__('dashboard.success_delete'), 'success')->position(alertDirection());
            return redirect()->route('role.index');
        }else{
            toast(__('dashboard.can_not_do_that'), 'info')->position(alertDirection());
            return redirect()->route('role.index');
        }
    }
}
