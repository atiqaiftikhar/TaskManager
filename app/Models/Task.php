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

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($task) {
    //         $task->logActivity('Task created');
    //     });

    //     static::updated(function ($task) {
    //         $task->logActivity('Task updated');
    //     });

    //     static::deleted(function ($task) {
    //         $task->logActivity('Task deleted');
    //     });
    // }

    // public function activityLogs()
    // {
    //     return ActivityLog::class;
    // }

    // private function logActivity($activity)
    // {
    //     ActivityLog::create([
    //         'activity' => $activity,
    //         'user_id' => auth()->id(),
    //         'performed_at' => now(),
    //     ]);
    // }


    protected static function boot()
    {
        parent::boot();

        static::created(function ($task) {
            $task->logActivity('Task created', $task->id);
        });

        static::updated(function ($task) {
            $task->logActivity('Task updated', $task->id, $task->getChanges());
        });

        static::deleted(function ($task) {
            $task->logActivity('Task deleted', $task->id);
        });
    }

    // private function logActivity($activity, $taskId = null, $changes = null)
    // {
    //     $description = '';

    //     // if ($changes !== null) {
    //     //     foreach ($changes as $attribute => $value) {
    //     //         $originalValue = $this->getOriginal($attribute);
    //     //         $description .= "Old value: $originalValue, New value: $value. ";
    //     //     }
    //     if ($changes !== null) {
    //         foreach ($changes as $attribute => $value) {
    //             $originalValue = $this->getOriginal($attribute);
    //             $description .= "Attribute: $attribute, Old value: $originalValue, New value: $value. ";
    //         }
    //     }
    private function logActivity($activity, $taskId = null, $changes = null)
    {
        $description = '';

        if ($changes !== null) {
            foreach ($changes as $attribute => $value) {
                $originalValue = $this->getOriginal($attribute);
                $description .= "Attribute: $attribute, Old value: $originalValue, New value: $value. ";
            }
        }
        ActivityLog::create([
            'activity' => $activity,
            'user_id' => auth()->id(),
            'performed_at' => now(),
            'description' => $description,
            'task_id' => $taskId,
        ]);
    }

}
