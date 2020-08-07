<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';

    protected $fillable=['name','description'];

    public function roles(){
        return $this->belongsToMany('App\backend\Role','permission_role','permission_id','role_id');
    }
}
