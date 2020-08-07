<?php

namespace App\backend;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin  extends Authenticatable
{
    use Notifiable;

    protected $table='admins';

    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'online',
        'phone',
        'photo',
        'blocked',
        'role_id'
    ];
    public function role(){
        return $this->belongsTo('App\backend\Role','role_id','id');
    }
    public function image(){
        if ($this->photo==default_user_image){
            return url(default_user_image);
        }else{
            return url('/'.uploads_folder.'/'.$this->photo);
        }
    }
}
