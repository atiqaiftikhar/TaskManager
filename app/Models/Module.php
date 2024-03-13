<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','task_id','name','module_created_by','project_id'];
    // public function task()
    // {
    //     return $this->belongsTo(Task::class);
    // }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'module_created_by');
    }

}
