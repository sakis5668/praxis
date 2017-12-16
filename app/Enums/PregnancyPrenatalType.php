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


    public static function getDescription(int $value): string
    {
        switch ($value) {
            case self::CVS:
                return 'CVS';
                break;
            case self::Amniocentesis:
                return 'Amniocentesis';
                break;
            case self::NIPT:
                return 'NIPT';
                break;
            case self::NuchalTranslucency:
                return 'Nuchal Translucency';
                break;
            case self::FirstTrimesterScan:
                return 'First Trimester Scan';
                break;
            case self::SecondTrimesterScan:
                return 'Second Trimester Scan';
                break;
            case self::ThirdTrimesterScan:
                return 'Third Trimester Scan';
                break;
            case self::DopplerSonography:
                return 'Doppler Sonography';
                break;
            case self::RoutineScan:
                return 'Routine Scan';
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
