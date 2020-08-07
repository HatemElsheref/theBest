<?php


define('AUTHOR','Hatem Mohammed');
define('AUTHOR_URL','https://www.facebook.com/hatem.elsheref.73');
define('AUTHOR_JOB','backend developer (Laravel)');
define('DS',DIRECTORY_SEPARATOR);
define('uploads_folder','uploads');
define('default_user_image','default-user.png');
define('admin_path','admins');

define('pagination',5);

if (!function_exists('dashboardAssets')){
    function dashboardAssets($path){
        return asset('dashboard/assets/'.$path);
    }
}

if (!function_exists('alertDirection')){
    function alertDirection(){
        if (app()->getLocale()=='ar'){
            return 'top-start';
        }else{
            return 'top-end';
        }
    }
}

if (!function_exists('getPermissionsIds')){
function getPermissionsIds(array $permissions){
   $ids=\App\backend\Permission::whereIn('name',$permissions)->get();
   return $ids->pluck('id')->toArray();
}
}
if (!function_exists('image')){
    function image($path){
        return url(uploads_folder.'/'.$path);
    }
}

if (!function_exists('hasThisPermission')) {
    function hasThisPermission($permission)
    {
        if (session()->has('my_permissions')) {
                 return (in_array($permission,session()->get('my_permissions')))?true:false;
            }else{
                return false;
            }
    }
}



