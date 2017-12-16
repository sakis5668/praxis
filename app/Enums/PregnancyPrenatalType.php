<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PregnancyPrenatalType extends Enum
{
    const CVS = 0;
    const Amniocentesis = 1;
    const NIPT = 2;
    const NuchalTranslucency = 3;
    const FirstTrimesterScan = 4;
    const SecondTrimesterScan = 5;
    const ThirdTrimesterScan = 6;
    const DopplerSonography = 7;
    const RoutineScan = 8;

    /**
     * Get the description for an enum value
     *
     * @param  int $value
     * @return string
     */
    public static function getDescription(int $value): string
    {
        switch ($value) {
            case self::OptionOne:
                return 'Option one';
                break;
            default:
                return self::getKey($value);
        }
    }
}
