<?php

namespace Mortezamollaie\TasksManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mortezamollaie\TasksManagement\database\factories\RoleFactory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'display_name',
    ];

    protected static function newFactory()
    {
        return RoleFactory::new();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
