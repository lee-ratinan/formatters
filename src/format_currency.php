<?php

include "format_number.php";

/**
 * Retrieve currency configurations
 * @param string $currency (optional) The currency code (ISO4217)
 * @return array The array of currency configurations, empty array if error
 */
function retrieve_currency_configs (string $currency = '')
{
    // AUD
    $configs['AUD']['ISO'] = ['AUD ###', 2, '.', ','];
    $configs['AUD']['INTL'] = ['A$###', 2, '.', ','];
    $configs['AUD']['LOCAL'] = $configs['AUD']['INTL'];
    // BND
    $configs['BND']['ISO'] = ['BND ###', 2, '.', ','];
    $configs['BND']['INTL'] = ['B$###', 2, '.', ','];
    $configs['BND']['LOCAL'] = $configs['BND']['INTL'];
    // CAD
    $configs['CAD']['ISO'] = ['CAD ###', 2, '.', ','];
    $configs['CAD']['INTL'] = ['C$###', 2, '.', ','];
    $configs['CAD']['LOCAL'] = $configs['CAD']['INTL'];
    // CHF
    $configs['CHF']['ISO'] = ['CHF ###', 2, '.', ','];
    $configs['CHF']['INTL'] = ['### Fr.', 2, '.', ','];
    $configs['CHF']['LOCAL'] = ['### Fr.', 2, ',', '.'];
    // CNY
    $configs['CNY']['ISO'] = ['CNY ###', 2, '.', ','];
    $configs['CNY']['INTL'] = ['¥###', 2, '.', ','];
    $configs['CNY']['LOCAL'] = ['###元', 2, '.', ','];
    // EUR
    $configs['EUR']['ISO'] = ['EUR ###', 2, '.', ','];
    $configs['EUR']['INTL'] = ['€###', 2, '.', ','];
    $configs['EUR']['LOCAL'] = ['€###', 2, ',', '.'];
    // GBP
    $configs['GBP']['ISO'] = ['GBP ###', 2, '.', ','];
    $configs['GBP']['INTL'] = ['£###', 2, '.', ','];
    $configs['GBP']['LOCAL'] = $configs['GBP']['INTL'];
    // HKD
    $configs['HKD']['ISO'] = ['HKD ###', 2, '.', ','];
    $configs['HKD']['INTL'] = ['HK$###', 2, '.', ','];
    $configs['HKD']['LOCAL'] = $configs['HKD']['INTL'];
    // IDR
    $configs['IDR']['ISO'] = ['IDR ###', 0, '.', ','];
    $configs['IDR']['INTL'] = ['Rp###', 0, '.', ','];
    $configs['IDR']['LOCAL'] = ['Rp###', 0, ',', '.'];
    // JPY
    $configs['JPY']['ISO'] = ['JPY ###', 0, '.', ','];
    $configs['JPY']['INTL'] = ['¥###', 0, '.', ','];
    $configs['JPY']['LOCAL'] = ['###円', 0, '.', ','];
    // KHR
    $configs['KHR']['ISO'] = ['KHR ###', 0, '.', ','];
    $configs['KHR']['INTL'] = ['###៛', 0, '.', ','];
    $configs['KHR']['LOCAL'] = $configs['KHR']['INTL'];
    // KRW
    $configs['KRW']['ISO'] = ['KRW ###', 0, '.', ','];
    $configs['KRW']['INTL'] = ['₩###', 0, '.', ','];
    $configs['KRW']['LOCAL'] = ['###원', 0, '.', ','];
    // LAK
    $configs['LAK']['ISO'] = ['LAK ###', 2, '.', ','];
    $configs['LAK']['INTL'] = ['₭###', 2, '.', ','];
    $configs['LAK']['LOCAL'] = ['### ກີບ', 2, '.', ','];
    // MMK
    $configs['MMK']['ISO'] = ['MMK ###', 0, '.', ','];
    $configs['MMK']['INTL'] = ['K###', 0, '.', ','];
    $configs['MMK']['LOCAL'] = ['###ကျပ်', 0, '.', ','];
    // MYR
    $configs['MYR']['ISO'] = ['MYR ###', 2, '.', ','];
    $configs['MYR']['INTL'] = ['RM###', 2, '.', ','];
    $configs['MYR']['LOCAL'] = $configs['MYR']['INTL'];
    // NZD
    $configs['NZD']['ISO'] = ['NZD ###', 2, '.', ','];
    $configs['NZD']['INTL'] = ['NZ$###', 2, '.', ','];
    $configs['NZD']['LOCAL'] = $configs['NZD']['INTL'];
    // PHP
    $configs['PHP']['ISO'] = ['PHP ###', 2, '.', ','];
    $configs['PHP']['INTL'] = ['₱###', 2, '.', ','];
    $configs['PHP']['LOCAL'] = $configs['PHP']['INTL'];
    // SGD
    $configs['SGD']['ISO'] = ['SGD ###', 2, '.', ','];
    $configs['SGD']['INTL'] = ['S$###', 2, '.', ','];
    $configs['SGD']['LOCAL'] = $configs['SGD']['INTL'];
    // THB
    $configs['THB']['ISO'] = ['THB ###', 2, '.', ','];
    $configs['THB']['INTL'] = ['฿###', 2, '.', ','];
    $configs['THB']['LOCAL'] = ['### บ.', 2, '.', ','];
    // TWD
    $configs['TWD']['ISO'] = ['TWD ###', 2, '.', ','];
    $configs['TWD']['INTL'] = ['NT$###', 2, '.', ','];
    $configs['TWD']['LOCAL'] = ['###元', 2, '.', ','];
    // USD
    $configs['USD']['ISO'] = ['USD ###', 2, '.', ','];
    $configs['USD']['INTL'] = ['$###', 2, '.', ','];
    $configs['USD']['LOCAL'] = $configs['USD']['INTL'];
    // VND
    $configs['VND']['ISO'] = ['VND ###', 0, '.', ','];
    $configs['VND']['INTL'] = ['###₫', 0, '.', ','];
    $configs['VND']['LOCAL'] = ['###₫', 0, ',', '.'];
    if (empty($currency))
    {
        return $configs;
    } else if (isset($configs[$currency]))
    {
        return $configs[$currency];
    }
    return [];
}

/**
 * Return the list of supported currencies
 * @return array The list of supported currencies
 */
function retrieve_available_currencies ()
{
    $currencies = retrieve_currency_configs();
    return array_keys($currencies);
}

/**
 * Format the currency<br>
 * @param float $amount The amount of money to format
 * @param string $currency The currency code of the amount (ISO4217), must be the currency from the supported currencies obtained from the retrieve_available_currencies()
 * @return array The formatted currencies in local and international formats, empty array if error
 */
function format_currency(float $amount, string $currency)
{
    $replace_list = [
        'KHR' => 'KHMER',
        'LAK' => 'LAO',
        'MMK' => 'BURMESE',
        'THB' => 'THAI',
    ];
    $amount = floatval($amount);
    $negative = FALSE;
    if (0 > $amount)
    {
        $negative = TRUE;
    }
    $config = retrieve_currency_configs($currency);
    if (empty($config))
    {
        return [];
    }
    $formats = [];
    foreach ($config as $format => $cf) {
        $amt = number_format($amount, $cf[1], $cf[2], $cf[3]);
        $amt = str_replace('###', $amt, $cf[0]);
        if ('LOCAL' == $format && isset($replace_list[$currency]))
        {
            $formats[$format] = ($negative ? '-' : '') . format_other_numeral_systems ($amt, $replace_list[$currency]);
        } else
        {
            $formats[$format] = ($negative ? '-' : '') . $amt;
        }
        unset($amt);
    }
    return $formats;
}
