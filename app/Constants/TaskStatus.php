<?php
namespace App\Constants;

class TaskStatus
{
    const TO_DO = 'To Do';
    const IN_PROGRESS = 'In Progress';
    const IN_REVIEW = 'In Review';
    const COMPLETED = 'Completed';
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
