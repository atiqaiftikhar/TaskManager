<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','title','permission','per_category_id' ];
    protected $appends = ['depend'];
    public function category()
    {
        return $this->belongsTo(PermissionCategory::class, 'per_category_id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }

    public function getDependAttribute(){

        $dependent = [
            'user.index',
            'project.index',
            'module.index',
            'task.index',
        ];
        return in_array($this->permission, $dependent);
        // return $product->name;
    }

}
