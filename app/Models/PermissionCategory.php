<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionCategory extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','name',];
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'per_category_id');
    }
}
