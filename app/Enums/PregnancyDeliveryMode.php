<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PregnancyDeliveryMode extends Enum
{
    const spontaneous = 1;
    const forceps = 2;
    const vacuum = 3;
    const section = 4;


    public static function getDescription(int $value): string
    {
        switch ($value) {
            case self::spontaneous:
                return 'Spontaneous Delivery';
            break;
            case self::forceps:
                return 'Forceps Extraction';
                break;
            case self::vacuum:
                return 'Vacuum Extraction';
                break;
            case self::section:
                return 'Caesarean Section';
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
