<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         * Create Default Role With No Permissions
         * */
        \App\backend\Role::create([
            'type'=>'default',
            'name'=>'default',
            'description'=>'Default Role'
        ])->permissions()->attach([]);


        $models=config('permissions.models');
        $operations=config('permissions.map');
//        $roles=config('permissions.roles');

        $permissionsIds=[];
        foreach ($models as $modelName=>$modelOperations){
            foreach ($modelOperations as $operation){
                $permission=\App\backend\Permission::create([
                    'name'=>strtolower($operations[$operation].'_'.$modelName),
                    'description'=>ucfirst($operations[$operation]),
                ]);
                array_push($permissionsIds,$permission->id);
            }
        }

        $role=\App\backend\Role::create([
            'type'=>'main',
            'name'=>'super_admin',
            'description'=>'This Is The Main Role In System For System Owner Have All Permissions'
        ]);
        $role->permissions()->attach($permissionsIds);
        /*
        foreach ($roles as $role){
            $role=\App\backend\Role::create([
                'name'=>strtolower($role),
                'description'=>ucfirst($role)
            ]);
            $role->permissions()->attach($permissionsIds);
        }
      */





        $super_admin=App\backend\Admin::create(
            [
                'type'=>'admin',
                'first_name'=>'Hatem Mohammed',
                'last_name'=>'Elsheref',
                'email'=>'super_admin@app.com',
                'password'=>bcrypt(12345),
                'phone'=>'01090703457',
                'gender'=>'male',
                'photo'=>'default-user.png',
                'role_id'=>$role->id,
                'blocked'=>false,
                'online'=>true
            ]
        );




        auth('dashboard')->loginUsingId($super_admin->id);

    }
}
