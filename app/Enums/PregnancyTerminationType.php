<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PregnancyTerminationType extends Enum
{
    const active = 1;
    const delivered = 2;
    const aborted = 3;
    const other = 4;

    /**
     * Get the description for an enum value
     *
     * @param  int $value
     * @return string
     */
    public static function getDescription(int $value): string
    {
        switch ($value) {
            case self::active:
                return __('selectlist.pregnancy.termination.type.active');
                break;
            case self::delivered:
                return __('selectlist.pregnancy.termination.type.delivered');
                break;
            case self::aborted:
                return __('selectlist.pregnancy.termination.type.aborted');
                break;
            case self::other:
                return __('selectlist.pregnancy.termination.type.other');
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
