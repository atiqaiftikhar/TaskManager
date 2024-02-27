<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','user_id','task_id','message','creation_date','due_date','is_read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
