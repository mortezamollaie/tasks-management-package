<?php

namespace Mortezamollaie\TasksManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mortezamollaie\TasksManagement\database\factories\PermissionFactory;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected static function boot()
    {
        parent::boot();

        static::created(function ($permission) {
            $adminRole = Role::where('name', 'admin')->first();

            if ($adminRole) {
                $adminRole->permissions()->attach([$permission->id]);
            }
        });
    }

    protected static function newFactory()
    {
        return PermissionFactory::new();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
