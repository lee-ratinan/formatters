<?php

/**
 * Add the stars
 * @param int $number_of_stars Number of stars
 * @return string
 */
function format_add_stars (int $number_of_stars): string
{
    return str_repeat('*', $number_of_stars);
}

/**
 * Mask the email and return partially masked email xxxxx***@***ail.com
 * @param string $email The email address to be masked
 * @return string Masked email address, or empty string if the email is invalid
 */
function format_mask_email (string $email): string
{
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ( ! $email)
    {
        return '';
    }
    $explode = explode('@', $email);
    $name                   = $explode[0];
    $domain                 = $explode[1]; // MUST BE THERE BECAUSE $email IS ALREADY VALIDATED
    $length_name            = strlen($name);
    $length_domain          = strlen($domain);
    $name_masked_length     = floor($length_name * 0.5);
    $name_unmasked_length   = $length_name - $name_masked_length;
    $domain_unmasked_length = floor($length_domain * 0.6);
    $domain_masked_length   = $length_domain - $domain_unmasked_length;
    return substr($name, 0, $name_unmasked_length) . format_add_stars($name_masked_length) . '@' . format_add_stars($domain_masked_length) . substr($domain, -$domain_unmasked_length);
}

/**
 * Mask the credit card, showing only the last 4 digits
 * @param string $card_number Credit card number in either '#### #### #### ####' or '################' format
 * @return string Masked credit card number, or empty string if the number is invalid
 */
function format_mask_credit_card (string $card_number): string
{
    if (preg_match('/\d{4} \d{4} \d{4} \d{4}/', $card_number))
    {
        return '**** **** **** ' . substr($card_number, -4);
    } else if (preg_match('/\d{16}/', $card_number))
    {
        return '************' . substr($card_number, -4);
    }
    return '';
}

/**
 * Mask any input except the last 4 characters
 * @param string $input Any input
 * @return string Masked string, or empty string if the input is less than 5-character long
 */
function format_mask_show_last_four (string $input): string
{
    if (5 > strlen($input))
    {
        return '';
    }
    return format_add_stars(strlen($input) - 4) . substr($input, -4);
}