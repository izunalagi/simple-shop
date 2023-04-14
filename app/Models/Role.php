<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $guarded = ['id'];

    public function fkUserRole()
    {
        return $this->hasMany(UserRole::class,'role_id','id');
    }
}
