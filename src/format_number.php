<?php

function get_numeral_system_config ()
{
    return [
        //        'ARABIC' => ['', '', '', '', '', '', '', '', '', ''],
        'ARABIC'  => ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'],
        'BURMESE' => ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'],
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
function format_other_numeral_systems (string $number, string $system)
{
    $numbers = get_numeral_system_config();
    if (isset($numbers[$system]))
    {
        return str_replace(['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'], $numbers[$system], $number);
    }
    return '';
}

/**
 * Return the list of supported numeral systems
 * @return array The list of supported numeral systems
 */
function retrieve_available_numeral_systems ()
{
    $systems = get_numeral_system_config();
    return array_keys($systems);
}