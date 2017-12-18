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
                return __('selectlist.pregnancy.delivery.mode.spontaneous');
            break;
            case self::forceps:
                return __('selectlist.pregnancy.delivery.mode.forceps');
                break;
            case self::vacuum:
                return __('selectlist.pregnancy.delivery.mode.vacuum');
                break;
            case self::section:
                return __('selectlist.pregnancy.delivery.mode.csection');
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
