<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permission;
use App\User;
class Role extends Model
{
    protected $fillable = ['roleName'];
    public function permission(){
        return $this->hasOne(Permission::class);
    }
     public function user(){
        return $this->hasOne(User::class);
    }
}
