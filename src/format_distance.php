<?php

/**
 * Convert distance - between kilometers (KM) and miles (MI)
 * @param float $from_distance Distance in the $from_unit
 * @param string $from_unit Unit of the distance, either KM or MI
 * @return array Distances in both kilometers and miles, empty array if error
 */
function convert_distance(float $from_distance, string $from_unit)
{
    $from_unit = strtoupper($from_unit);
    $from_distance = floatval($from_distance);
    if (is_float($from_distance) && 0.0 < $from_distance)
    {
        $km = 0.0;
        $mi = 0.0;
        if ('MI' == $from_unit)
        {
            $km = $from_distance * 1.609344;
            $mi = $from_distance;
        } else if ('KM' == $from_unit)
        {
            $km = $from_distance;
            $mi = $from_distance / 1.609344;
        } else
        {
            // $from_unit is invalid
            return [];
        }
        return [
            'KM' => $km,
            'MI' => $mi,
            'S' => [
                'KM' => format_distance($km, 'KM', 'S'),
                'MI' => format_distance($mi, 'MI', 'S')
            ],
            'L' => [
                'KM' => format_distance($km, 'KM', 'L'),
                'MI' => format_distance($mi, 'MI', 'L')
            ]
        ];
    }
    // $from_distance is invalid
    return [];
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