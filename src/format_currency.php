<?php

include "format_number.php";

/**
 * Retrieve currency configurations
 * @param string $currency (optional) The currency code (ISO4217)
 * @return array The array of currency configurations, empty array if error
 */
function retrieve_currency_configs (string $currency = '')
{
    // AED
    $configs['AED']['ISO'] = ['AED ###', 2, '.', ','];
    $configs['AED']['INT'] = ['###د.إ', 2, '.', ','];
    $configs['AED']['LOC'] = ['###د.إ', 2, '٫', '٬'];
    // AUD
    $configs['AUD']['ISO'] = ['AUD ###', 2, '.', ','];
    $configs['AUD']['INT'] = ['A$###', 2, '.', ','];
    $configs['AUD']['LOC'] = $configs['AUD']['INT'];
    // BND
    $configs['BND']['ISO'] = ['BND ###', 2, '.', ','];
    $configs['BND']['INT'] = ['B$###', 2, '.', ','];
    $configs['BND']['LOC'] = $configs['BND']['INT'];
    // CAD
    $configs['CAD']['ISO'] = ['CAD ###', 2, '.', ','];
    $configs['CAD']['INT'] = ['C$###', 2, '.', ','];
    $configs['CAD']['LOC'] = $configs['CAD']['INT'];
    // CHF
    $configs['CHF']['ISO'] = ['CHF ###', 2, '.', ','];
    $configs['CHF']['INT'] = ['### Fr.', 2, '.', ','];
    $configs['CHF']['LOC'] = ['### Fr.', 2, ',', '.'];
    // CNY
    $configs['CNY']['ISO'] = ['CNY ###', 2, '.', ','];
    $configs['CNY']['INT'] = ['¥###', 2, '.', ','];
    $configs['CNY']['LOC'] = ['###元', 2, '.', ','];
    // EUR
    $configs['EUR']['ISO'] = ['EUR ###', 2, '.', ','];
    $configs['EUR']['INT'] = ['€###', 2, '.', ','];
    $configs['EUR']['LOC'] = ['€###', 2, ',', '.'];
    // GBP
    $configs['GBP']['ISO'] = ['GBP ###', 2, '.', ','];
    $configs['GBP']['INT'] = ['£###', 2, '.', ','];
    $configs['GBP']['LOC'] = $configs['GBP']['INT'];
    // HKD
    $configs['HKD']['ISO'] = ['HKD ###', 2, '.', ','];
    $configs['HKD']['INT'] = ['HK$###', 2, '.', ','];
    $configs['HKD']['LOC'] = $configs['HKD']['INT'];
    // IDR
    $configs['IDR']['ISO'] = ['IDR ###', 0, '.', ','];
    $configs['IDR']['INT'] = ['Rp###', 0, ',', '.'];
    $configs['IDR']['LOC'] = $configs['IDR']['INT'];
    // INR
    $configs['INR']['ISO'] = ['INR ###', 2, '.', ','];
    $configs['INR']['INT'] = ['###₹', 2, '.', ','];
    $configs['INR']['LOC'] = $configs['INR']['INT'];
    // JPY
    $configs['JPY']['ISO'] = ['JPY ###', 0, '.', ','];
    $configs['JPY']['INT'] = ['¥###', 0, '.', ','];
    $configs['JPY']['LOC'] = ['###円', 0, '.', ','];
    // KHR
    $configs['KHR']['ISO'] = ['KHR ###', 0, '.', ','];
    $configs['KHR']['INT'] = ['###៛', 0, '.', ','];
    $configs['KHR']['LOC'] = $configs['KHR']['INT'];
    // KRW
    $configs['KRW']['ISO'] = ['KRW ###', 0, '.', ','];
    $configs['KRW']['INT'] = ['₩###', 0, '.', ','];
    $configs['KRW']['LOC'] = ['###원', 0, '.', ','];
    // LAK
    $configs['LAK']['ISO'] = ['LAK ###', 2, '.', ','];
    $configs['LAK']['INT'] = ['₭###', 2, '.', ','];
    $configs['LAK']['LOC'] = ['### ກີບ', 2, '.', ','];
    // MMK
    $configs['MMK']['ISO'] = ['MMK ###', 0, '.', ','];
    $configs['MMK']['INT'] = ['K###', 0, '.', ','];
    $configs['MMK']['LOC'] = ['###ကျပ်', 0, '.', ','];
    // MXN
    $configs['MXN']['ISO'] = ['MXN ###', 2, '.', ','];
    $configs['MXN']['INT'] = ['MX$###', 2, '.', ','];
    $configs['MXN']['LOC'] = $configs['MXN']['INT'];
    // MYR
    $configs['MYR']['ISO'] = ['MYR ###', 2, '.', ','];
    $configs['MYR']['INT'] = ['RM###', 2, '.', ','];
    $configs['MYR']['LOC'] = $configs['MYR']['INT'];
    // NOK
    $configs['NOK']['ISO'] = ['NOK ###', 2, '.', ','];
    $configs['NOK']['INT'] = ['### kr', 2, '.', ','];
    $configs['NOK']['LOC'] = ['### kr', 2, ',', '.'];
    // NZD
    $configs['NZD']['ISO'] = ['NZD ###', 2, '.', ','];
    $configs['NZD']['INT'] = ['NZ$###', 2, '.', ','];
    $configs['NZD']['LOC'] = $configs['NZD']['INT'];
    // PHP
    $configs['PHP']['ISO'] = ['PHP ###', 2, '.', ','];
    $configs['PHP']['INT'] = ['₱###', 2, '.', ','];
    $configs['PHP']['LOC'] = $configs['PHP']['INT'];
    // RUB
    $configs['RUB']['ISO'] = ['RUB ###', 2, '.', ','];
    $configs['RUB']['INT'] = ['###₽', 2, '.', ','];
    $configs['RUB']['LOC'] = $configs['RUB']['INT'];
    // SEK
    $configs['SEK']['ISO'] = ['SEK ###', 2, '.', ','];
    $configs['SEK']['INT'] = ['### kr', 2, '.', ','];
    $configs['SEK']['LOC'] = ['### kr', 2, ',', '.'];
    // SGD
    $configs['SGD']['ISO'] = ['SGD ###', 2, '.', ','];
    $configs['SGD']['INT'] = ['S$###', 2, '.', ','];
    $configs['SGD']['LOC'] = $configs['SGD']['INT'];
    // THB
    $configs['THB']['ISO'] = ['THB ###', 2, '.', ','];
    $configs['THB']['INT'] = ['฿###', 2, '.', ','];
    $configs['THB']['LOC'] = ['### บ.', 2, '.', ','];
    // TWD
    $configs['TWD']['ISO'] = ['TWD ###', 2, '.', ','];
    $configs['TWD']['INT'] = ['NT$###', 2, '.', ','];
    $configs['TWD']['LOC'] = ['###元', 2, '.', ','];
    // USD
    $configs['USD']['ISO'] = ['USD ###', 2, '.', ','];
    $configs['USD']['INT'] = ['$###', 2, '.', ','];
    $configs['USD']['LOC'] = $configs['USD']['INT'];
    // VND
    $configs['VND']['ISO'] = ['VND ###', 0, '.', ','];
    $configs['VND']['INT'] = ['###₫', 0, '.', ','];
    $configs['VND']['LOC'] = ['###₫', 0, ',', '.'];
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
        'AED' => 'ARABIC',
        'KHR' => 'KHMER',
        'LAK' => 'LAO',
        'MMK' => 'BURMESE',
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
        if ('LOC' == $format && isset($replace_list[$currency]))
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
