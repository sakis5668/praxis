<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PregnancyPrenatalType extends Enum
{
    const CVS = 1;
    const Amniocentesis = 2;
    const NIPT = 3;
    const NuchalTranslucency = 4;
    const FirstTrimesterScan = 5;
    const SecondTrimesterScan = 6;
    const ThirdTrimesterScan = 7;
    const DopplerSonography = 8;
    const RoutineScan = 9;


    public static function getDescription(int $value): string
    {
        switch ($value) {
            case self::CVS:
                return __('selectlist.pregnancy.prenatal.cvs');
                break;
            case self::Amniocentesis:
                return __('selectlist.pregnancy.prenatal.amniocentesis');
                break;
            case self::NIPT:
                return __('selectlist.pregnancy.prenatal.nipt');
                break;
            case self::NuchalTranslucency:
                return __('selectlist.pregnancy.prenatal.nt');
                break;
            case self::FirstTrimesterScan:
                return __('selectlist.pregnancy.prenatal.firsttrimester');
                break;
            case self::SecondTrimesterScan:
                return __('selectlist.pregnancy.prenatal.secondtrimester');
                break;
            case self::ThirdTrimesterScan:
                return __('selectlist.pregnancy.prenatal.thirdtrimester');
                break;
            case self::DopplerSonography:
                return __('selectlist.pregnancy.prenatal.doppler');
                break;
            case self::RoutineScan:
                return __('selectlist.pregnancy.prenatal.routine');
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
