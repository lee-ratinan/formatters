<?php

/**
 * Format Singapore address, e.g.
 * 123 Example Street
 * #01-23 Building Name
 * Singapore 123456
 * @param string $street_number
 * @param string $street_name
 * @param string $postal_code
 * @param string $floor (optional)
 * @param string $unit_number (optional)
 * @param string $building_name (optional)
 * @return string Formatted address
 */
function format_address_sg (string $street_number, string $street_name, string $postal_code, string $floor = '', string $unit_number = '', string $building_name = '') :string
{
    // VALIDATE
    if ( ! preg_match('/^\d+([A-Z])?$/', $street_number)
        || empty($street_name)
        || ! preg_match('/^\d{6}$/', $postal_code)
        || ( ! empty($floor) && ! preg_match('/^([B]?\d+|(G|M))$/', $floor))
        || ( ! empty($unit_number) && ! preg_match('/^\d+([A-Z])?$/', $unit_number)))
    {
        return "";
    }
    $street_name    = trim($street_name);
    $building_name  = trim($building_name);
    // FORMAT
    $address_line_1 = "{$street_number} {$street_name}<br>";
    $address_line_2 = "";
    if ( ! empty($floor) && ! empty($unit_number))
    {
        $address_line_2 = trim("#{$floor}-{$unit_number} {$building_name}") . "<br>";
    }
    $address_line_3 = "Singapore {$postal_code}";
    return "{$address_line_1}{$address_line_2}{$address_line_3}";
}

/**
 * Format USA address, e.g.
 * 300 Main St.
 * Apartment #3
 * Cincinnati, OH 45202
 * @param string $street_number
 * @param string $street_name
 * @param string $city_name
 * @param string $state
 * @param string $postal_code
 * @param string $apartment_name (optional)
 * @param string $unit_number (optional)
 * @return string
 */
function format_address_us (string $street_number, string $street_name, string $city_name, string $state, string $postal_code, string $apartment_name = '', string $unit_number = ''): string
{
    $state = strtoupper($state);
    if ( ! preg_match('/^[A-Z]{2}$/', $state)
        || ! preg_match('/^\d{5}(\-\d{4})?$/', $postal_code))
    {
        return "";
    }
    $street_number  = trim($street_number);
    $street_name    = trim($street_name);
    $city_name      = trim($city_name);
    $apartment_name = trim($apartment_name);
    $unit_number    = trim($unit_number);
    $address_line_1 = "{$street_number} {$street_name}<br>";
    $address_line_2 = "";
    if (! empty($apartment_name))
    {
        $address_line_2 = trim("{$apartment_name} {$unit_number}") . "<br>";
    }
    $address_line_3 = "{$city_name}, {$state} {$postal_code}<br>United States";
    return "{$address_line_1}{$address_line_2}{$address_line_3}";
}