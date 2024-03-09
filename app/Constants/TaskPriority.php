<?php
namespace App\Constants;


class TaskPriority
{
    const HIGHEST = 'highest';
    const NORMAL = 'normal';
    const LOWEST = 'lowest';

    
    public static function getPriorityOptions()
    {
        return [
            self::HIGHEST => 'Highest',
            self::NORMAL => 'Normal',
            self::LOWEST => 'Lowest',
        ];
    }
}

?>
