<?php

/**
 * Convert distance - between kilometers (KM) and miles (MI)
 * @param string $from_unit Unit of the distance, either KM or MI
 * @param string $to_unit Unit of the distance to convert to, either KM or MI
 * @param float $from_distance Distance in the $from_unit
 * @return float Distance in the $to_unit, -1 if error
 */
function convert_distance(string $from_unit, string $to_unit, float $from_distance)
{
    $from_unit = strtoupper($from_unit);
    $to_unit = strtoupper($to_unit);
    $from_distance = floatval($from_distance);
    if ('MI' == $from_unit && 'KM' == $to_unit)
    {
        return $from_distance * 1.609344;
    } else
    {
        if ('KM' == $from_unit && 'MI' == $to_unit)
        {
            return $from_distance / 1.609344;
        } else
        {
            if ($from_unit == $to_unit)
            {
                return $from_distance;
            }
        }
    }
    return -1;
}

/**
 * Format the distance
 * @param float $distance The distance to format
 * @param string $unit The unit of the distance, either KM or MI
 * @param string $mode The mode of the unit, either S (short) or L (long)
 * @return string The formatted distance, empty string if error
 */
function format_distance(float $distance, string $unit, string $mode = 'S')
{
    $distance = floatval($distance);
    $unit = strtoupper($unit);
    $mode = strtoupper($mode);
    $units = [
        'MI' => [
            'S' => ' mi.',
            'L' => ' miles'
        ],
        'KM' => [
            'S' => ' km',
            'L' => ' kilometers'
        ]
    ];
    if (isset($units[$unit][$mode]))
    {
        return number_format($distance, 2, '.', ',') . $units[$unit][$mode];
    }
    return '';
}