<?php
namespace App\Constants;

class TaskStatus
{
    const TO_DO = 'to_do';
    const IN_PROGRESS = 'in_progress';
    const IN_REVIEW = 'in_review';
    const COMPLETED = 'completed';
    public static function getStatusOptions()
    {
        return [
            self::TO_DO => 'To Do',
            self::IN_PROGRESS => 'In Progress',
            self::IN_REVIEW => 'In Review',
            self::COMPLETED => 'Completed',
        ];
    }
}

?>
