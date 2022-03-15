<?php

/**
 * Format the address into a fine Singapore format
 * There are 2 main formats: SHORT and FORMAL
 * SHORT:
 * | 123 Example Street, #12-34 Building Name, S(987654)
 * FORMAL:
 * | 123 Example Street
 * | #12-34 Building Name
 * | Singapore 987654
 * @param string $format the format of address, SHORT or FORMAL, default: FORMAL
 * @param string $street_address 123
 * @param string $street_name Example Street
 * @param string $postal_code 987654 (6-digit postal code)
 * @param string $unit_number (optional) #12-34, unit number usually starts with '#' sign
 * @param string $building_name (optional) The name of the building
 * @return string Formatted address
 */
function format_address_singapore (string $format, string $street_address, string $street_name, string $postal_code, string $unit_number = '', string $building_name = '')
{
    if (empty($street_address) || empty($street_name) || empty($postal_code))
    {
        return 'Missing street address or postal code';
    }
    $line1 = trim("{$street_address} {$street_name}");
    $line2 = trim("{$unit_number} {$building_name}");
    if ('SHORT' == $format)
    {
        return $line1 . (empty($line2) ? ', S(' : ", {$line2}, S(") . $postal_code . ')';
    } else
    {
        return $line1 . '<br>' . (empty($line2) ? '' : $line2 . '<br>') . "Singapore {$postal_code}";
    }
}