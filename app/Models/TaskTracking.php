<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTracking extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','user_id','task_id','start_time','end_time','duration'];
}
