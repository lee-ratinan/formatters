<?php

/**
 * Format the length in centimeters into # m. ## cm. format
 * @param float|int $cm The length in centimeters
 * @return string The formatted length
 */
function format_length_metric (float $cm)
{
    $cm = round($cm);
    $m = floor($cm / 100);
    $cm = $cm % 100;
    if (0 < $m)
    {
        return "{$m} m. {$cm} cm.";
    }
    return "{$cm} cm.";
}

/**
 * Format the length in inches into ##’ ##” format
 * @param float|int $in The length in inches
 * @return string The formatted length
 */
function format_length_imperial (float $in)
{
    $in = round($in);
    $ft = floor($in / 12);
    $in = $in % 12;
    if (0 < $ft)
    {
        return "{$ft}’ {$in}”";
    }
    return "{$in}”";
}

/**
 * Convert length - between metric and imperial
 * @param string $from_unit Unit of the length, either centimeter (CM), meter (M), foot (FT), or inch (IN)
 * @param float $from_length Length in the $from_unit
 * @return array Length in the 4 units: centimeter (CM), meter (M), foot (FT), inch (IN), along with the metric (M/CM) and imperial (FT/IN) combinations
 */
function convert_length(string $from_unit, float $from_length)
{
    $from_unit = strtoupper($from_unit);
    $from_length = floatval($from_length);
    if (in_array($from_unit, ['CM', 'M']))
    {
        if ('M' == $from_unit)
        {
            $from_length *= 100;
        }
        return [
            'CM' => number_format($from_length, 2, '.', ''),
            'M' => number_format($from_length / 100, 4, '.', ''),
            'IN' => number_format($from_length / 2.54, 4, '.', ''),
            'FT' => number_format($from_length / 30.48, 4, '.', ''),
            'METRIC' => format_length_metric($from_length),
            'IMPERIAL' => format_length_imperial($from_length / 2.54)
        ];
    } else if (in_array($from_unit, ['FT', 'IN']))
    {
        if ('FT' == $from_unit)
        {
            $from_length *= 12;
        }
        return [
            'CM' => number_format($from_length * 2.54, 2, '.', ''),
            'M' => number_format($from_length / 39.37, 4, '.', ''),
            'IN' => number_format($from_length, 4, '.', ''),
            'FT' => number_format($from_length / 12, 4, '.', ''),
            'METRIC' => format_length_metric($from_length * 2.54),
            'IMPERIAL' => format_length_imperial($from_length)
        ];
    }
    return [];
}