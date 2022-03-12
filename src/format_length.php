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
        if (0 == $cm)
        {
            return "{$m} m.";
        }
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
        if (0 == $in)
        {
            return "{$ft}’";
        }
        return "{$ft}’ {$in}”";
    }
    return "{$in}”";
}

/**
 * Convert length - between metric and imperial
 * @param float $from_length Length in the $from_unit
 * @param string $from_unit Unit of the length, either centimeter (CM), meter (M), foot (FT), or inch (IN)
 * @return array Length in the 4 units: centimeter (CM), meter (M), foot (FT), inch (IN), along with the metric (M/CM) and imperial (FT/IN) combinations
 */
function convert_length(float $from_length, string $from_unit)
{
    $from_unit = strtoupper($from_unit);
    $from_length = floatval($from_length);
    if (is_float($from_length) && 0.0 < $from_length)
    {
        $cm = 0.0;
        $mt = 0.0;
        $in = 0.0;
        $ft = 0.0;
        if ('CM' == $from_unit)
        {
            $cm = $from_length;
            $mt = $from_length / 100;
            $in = $from_length / 2.54;
            $ft = $from_length / 30.48;
        } else if ('M' == $from_unit)
        {
            $cm = $from_length * 100;
            $mt = $from_length;
            $in = $from_length / 39.37;
            $ft = $from_length * 3.281;
        } else if ('IN' == $from_unit)
        {
            $cm = $from_length * 2.54;
            $mt = $from_length / 39.37;
            $in = $from_length;
            $ft = $from_length / 12;
        } else if ('FT' == $from_unit)
        {
            $cm = $from_length * 30.48;
            $mt = $from_length / 3.281;
            $in = $from_length * 12;
            $ft = $from_length;
        } else
        {
            // $from_unit is invalid
            return [];
        }
        return [
            'CM' => $cm,
            'M' => $mt,
            'IN' => $in,
            'FT' => $ft,
            'FORMATTED' => [
                'METRIC' => format_length_metric($cm),
                'IMPERIAL' => format_length_imperial($in),
            ]
        ];
    }
    // $from_length is invalid
    return [];
}