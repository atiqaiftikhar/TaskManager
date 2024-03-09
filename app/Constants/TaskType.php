<?php
namespace App\Constants;


class TaskType
{
    const NORMAL = 'normal';
    const IMPROVEMENT = 'improvement';
    const BUG = 'bug';



    public static function getTypeOptions()
    {
        return [
            self::NORMAL => 'Normal',
            self::IMPROVEMENT => 'Improvement',
            self::BUG => 'Bug',
        ];
    }
}

?>
