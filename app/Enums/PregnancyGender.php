<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PregnancyGender extends Enum
{
    const male = 1;
    const female = 2;


    public static function getDescription(int $value): string
    {
        switch ($value) {
            case self::male:
                return 'male';
                break;
            case self::female:
                return 'female';
                break;
            default:
                return self::getKey($value);
        }
    }


    public static function getDescriptions()
    {
        $descriptions = [];
        $values = self::getValues();
        foreach ($values as $value) {
            $description = self::getDescription($value);
            $descriptions[$value] = $description;
        }
        return $descriptions;
    }
}
