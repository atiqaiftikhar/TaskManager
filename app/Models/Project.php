<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','name','created_by',];
    public function users()
    {
        return $this->belongsToMany(User::class,'project_users');
    }
    public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}
public function tasks()
{
    return $this->hasMany(Task::class);
}
}
