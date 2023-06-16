<?php

/**
 * Return the numbers in various numeral systems, e.g. Arabic, Burmese.
 * Currently, it supports:
 * - ARABIC
 * - BURMESE
 * - CHINESE
 * - KHMER
 * - LAO
 * - THAI
 * @return array[] The array of numbers in various systems
 */
function get_numeral_system_config (): array
{
    return [
        'ARABIC'  => ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'],
        'BURMESE' => ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'],
        'CHINESE' => ['〇', '一', '二', '三', '四', '五', '六', '七', '八', '九'],
        'KHMER'   => ['០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩'],
        'LAO'     => ['໐', '໑', '໒', '໓', '໔', '໕', '໖', '໗', '໘', '໙'],
        'THAI'    => ['๐', '๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙'],
    ];
}

/**
 * Return the number in the new numeral system
 * @param string $number The number (in string) to format
 * @param string $system The numeral system
 * @return string The number in the numeral system specified by $system, empty string if error
 */
function format_other_numeral_systems (string $number, string $system): string
{
    $numbers = get_numeral_system_config();
    if (isset($numbers[$system]))
    {
        return str_replace(['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'], $numbers[$system], $number);
    }
    return $number;
}

/**
 * Return the list of supported numeral systems
 * @return array The list of supported numeral systems
 */
function retrieve_available_numeral_systems (): array
{
    $systems = get_numeral_system_config();
    return array_keys($systems);
}

/**
 * Return the number in Indian numeral system, e.g. 12,34,567.89
 * @param string $number number to be formatted
 * @param int $decimal_places number of decimal places to be formatted
 * @return string Formatted number
 */
function format_number_india (string $number, int $decimal_places): string
{
    $parts = explode('.', $number);
    $integer_part = $parts[0];
    $decimal_part = @$parts[1];
    // Add thousand-separators to the integer part
    $formatted_integer_part = '';
    $length                 = strlen($integer_part);
    $num_digits             = 0;
    $first_group            = TRUE;
    for ($i = $length - 1; $i >= 0; $i--) {
        $formatted_integer_part = $integer_part[$i] . $formatted_integer_part;
        $num_digits++;
        if ($first_group && 3 === $num_digits) {
            $formatted_integer_part = ',' . $formatted_integer_part;
            $first_group            = FALSE;
            $num_digits             = 0;
        } else if (! $first_group && $num_digits == 2 && $i != 0) {
            $formatted_integer_part = ',' . $formatted_integer_part;
            $num_digits             = 0;
        }
    }
    $format = "%0{$decimal_places}d";
    $zeros  = sprintf($format, 0);
    if (! empty($decimal_part)) {
        return $formatted_integer_part . '.' . substr($decimal_part . $zeros, 0, $decimal_places);
    }
    return $formatted_integer_part . '.' . $zeros;
}