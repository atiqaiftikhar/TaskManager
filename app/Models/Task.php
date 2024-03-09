<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','project_id','assign_to','title','description','status','due_date','task_created_by','type','priority'];
    public function project()
{
    return $this->belongsTo(Project::class, 'project_id');
}
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'task_created_by');
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


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($task) {
    //         $task->logActivity('Task created', $task->id);
    //     });

    //     static::updated(function ($task) {
    //         $task->logActivity('Task updated', $task->id, $task->getChanges());
    //     });

    //     static::deleted(function ($task) {
    //         $task->logActivity('Task deleted', $task->id);
    //     });
    // }


    // private function logActivity($activity, $taskId = null, $changes = null)
    // {
    //     $detail = '';

    //     if ($changes !== null) {
    //         foreach ($changes as $attribute => $value) {
    //             $originalValue = $this->getOriginal($attribute);
    //             $detail .= "Attribute: $attribute, Old value: $originalValue, New value: $value. ";
    //         }
    //     }
    //     ActivityLog::create([
    //         'activity' => $activity,
    //         'user_id' => auth()->id(),
    //         'performed_at' => now(),
    //         'detail' => $detail,
    //         'task_id' => $taskId,
    //     ]);
    // }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($task) {
            $task->logActivity('Task created', $task->id);
        });

        static::updated(function ($task) {
            $changes = $task->getChanges();
            $oldValues = $task->getOriginal();

            $task->logActivity('Task updated', $task->id, $changes, $oldValues);
        });

        static::deleted(function ($task) {
            $task->logActivity('Task deleted', $task->id);
        });
    }

    private function logActivity($activity, $taskId, $changes = null, $oldValues = null)
    {
        $logData = [
            'activity' => $activity,
            'user_id' => auth()->id(),
            'performed_at' => now(),
            'task_id' => $taskId,
        ];

        if ($changes !== null || $oldValues !== null) {
            $logData['detail'] = json_encode([
                'new' => $changes,
                'old' => $oldValues,
            ]);
        }

        ActivityLog::create($logData);
    }





    // protected static function boot()
    // {
    //     parent::boot();

    //     static::updating(function ($task) {
    //         $task->updateOldValues();
    //     });

    //     static::updated(function ($task) {
    //         // $task->logUpdatedValues();
    //     });

    //     static::created(function ($task) {
    //         $task->logActivity('Task created', $task->id);
    //     });

    //     static::deleted(function ($task) {
    //         $task->logActivity('Task deleted', $task->id);
    //     });
    // }

    // private function updateOldValues()
    // {
    //     // No need to store old values separately, as getOriginal() is available
    // }

    // private function logUpdatedValues()
    // {
    //     $oldValues = $this->getOriginal();
    //     $newValues = $this->getAttributes();

    //     $changes = [];

    //     foreach ($newValues as $key => $value) {
    //         // Check if the value has changed
    //         if ($oldValues[$key] !== $value) {
    //             $changes[$key] = [
    //                 'old' => $oldValues[$key],
    //                 'new' => $value,
    //             ];
    //         }
    //     }

    //     $detail = json_encode($changes);

    //     // Create an activity log entry
    //     $this->logActivity('Task updated', $this->id, $detail);
    // }

    // private function logActivity($activity, $taskId = null, $detail = null)
    // {
    //     ActivityLog::create([
    //         'activity' => $activity,
    //         'user_id' => auth()->id(),
    //         'performed_at' => now(),
    //         'task_id' => $taskId,
    //         'detail' => $detail, // Store detail in the 'detail' attribute
    //     ]);
    // }




}
