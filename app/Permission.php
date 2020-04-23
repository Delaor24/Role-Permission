<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
class Permission extends Model
{
    protected $fillable = ['role_id','permission'];
    protected $casts = [
        'permission' => 'array',
    ];

    public function role(){
    	return $this->belongsTo(Role::class);
    }
}
