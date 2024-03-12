<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [ 'id','role'];
    public function permissions()
    {
        // Define the many-to-many relationship with the custom pivot table name
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

}
