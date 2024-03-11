<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','title','permission','per_category_id' ];
    public function category()
    {
        return $this->belongsTo(PermissionCategory::class);
    }

}
