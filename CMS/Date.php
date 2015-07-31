<?php

namespace CMS;

class Date
{
    const NULL_DATE = '0000-00-00';

    public static function getDateFromDatetime($date)
    {
        if (strstr($date, ' ')) {
            $parts = explode(' ', $date);

            $date = $parts[0];
        }

        return $date;
    }

    public static function getTimeFromDatetime($date)
    {
        if (strstr($date, ' ')) {
            $parts = explode(' ', $date);

            return $parts[1];
        }

        return NULL;
    }

    public static function isDate($date)
    {
        if (is_array($date)) {
            return false;
        } else if (strstr($date, '-')) {
            return self::isDatabaseDate($date);
        } else if (!strstr($date, '/')) {
            return false;
        }

        $date = self::getDateFromDatetime($date);

        $dateParts = explode('/', $date);
        if (count($dateParts) != 3) {
            return NULL;
        }

        return checkdate($dateParts[1], $dateParts[0], $dateParts[2]);
    }

    public static function isDatabaseDate($date)
    {
        $date = self::getDateFromDatetime($date);

        $dateParts = explode('-', $date);
        if (count($dateParts) != 3) {
            return NULL;
        }

        return checkdate($dateParts[1], $dateParts[2], $dateParts[1]);
    }

    public static function toDbFormat($date)
    {
        if (!self::isDate($date)) {
            return NULL;
        }

        if (self::isDatabaseDate($date)) {
            return $date;
        }

        $time = self::getTimeFromDatetime($date);

        $dateParts = explode('/', $date);

        return $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0]
                . (($time) ? ' ' . $time : '');
    }

    public static function toPrintFormat($date, $destFormat = 'd/m/Y')
    {
        if (! $date) {
            return NULL;
        }

        if ($date === self::NULL_DATE) {
            return NULL;
        }

        $time = self::getTimeFromDatetime($date);

        return date($destFormat, strtotime($date))
                . (($time) ? ' ' . $time : '');
    }

    public static function humanFormat($date = NULL, $destFormat = 'l j \d\e F')
    {
        if (! $date) {
            $date = date('Y-m-d');
        }

        $days = array(
            'monday' => 'lunes',
            'tuesday' => 'martes',
            'wednesday' => 'miércoles',
            'thursday' => 'jueves',
            'friday' => 'viernes',
            'saturday' => 'sábado',
            'sunday' => 'domingo'
            );

        $months = array(
            'january' => 'enero',
            'february' => 'febrero',
            'march' => 'marzo',
            'april' => 'abril',
            'may' => 'mayo',
            'june' => 'junio',
            'july' => 'julio',
            'august' => 'agosto',
            'september' => 'septiembre',
            'october' => 'octubre',
            'november' => 'noviembre',
            'december' => 'diciembre',
        );

        $string = date($destFormat, strtotime($date));

        foreach (array($days, $months) as $array)
        {
            foreach ($array as $key => $value)
            {
                $string = str_replace($key, $value, $string);
                $string = str_replace(ucfirst($key), ucfirst($value), $string);
            }
        }

        return $string;
    }

    public static function toTimeDifference($date)
    {
        if ($date === self::NULL_DATE) {
            return NULL;
        }

        $timeDifference = time() - strtotime($date);

        if ($timeDifference < 60) {
            return $timeDifference . ' segundos';
        }

        if ($timeDifference < 3600) {
            return ceil($timeDifference / 60) . ' minutos';
        }

        if ($timeDifference < 86400) {
            return ceil($timeDifference / 3600) . ' horas';
        }

        if ($timeDifference < 2592000) {
            return ceil($timeDifference / 86400) . ' días';
        }

        if ($timeDifference < 31536000) {
            return ceil($timeDifference / 2592000) . ' meses';
        }

        return ceil($timeDifference / 31536000) . ' años';
    }

}
