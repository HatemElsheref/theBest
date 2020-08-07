<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    protected $fillable=['name','description','type'];

    public function permissions(){
        return $this->belongsToMany('App\backend\Permission','permission_role','role_id','permission_id');
    }
    public function admins(){
        return $this->hasMany('App\backend\Admin','role_id','id');
    }
    public function myPermissionsIds(){
        return $this->permissions->pluck('name')->toArray();
    }
}
