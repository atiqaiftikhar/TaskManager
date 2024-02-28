<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','project_id','assign_to','title','description','status','due_date'];
    public function project()
{
    return $this->belongsTo(Project::class, 'project_id');
}
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }
}
