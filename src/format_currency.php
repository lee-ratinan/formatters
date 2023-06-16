<?php

include "format_number.php";

/**
 * Retrieve currency configurations
 * @param string $currency (optional) The currency code (ISO4217)
 * @return array The array of currency configurations, empty array if error
 */
function retrieve_currency_configs (string $currency = ''): array
{
    // AED
    $configs['AED']['INT'] = ['###د.إ', 2, '.', ','];
    $configs['AED']['LOC'] = ['###د.إ', 2, '٫', '٬'];
    // AUD
    $configs['AUD']['INT'] = ['A$###', 2, '.', ','];
    $configs['AUD']['LOC'] = $configs['AUD']['INT'];
    // BND
    $configs['BND']['INT'] = ['B$###', 2, '.', ','];
    $configs['BND']['LOC'] = $configs['BND']['INT'];
    // CAD
    $configs['CAD']['INT'] = ['C$###', 2, '.', ','];
    $configs['CAD']['LOC'] = $configs['CAD']['INT'];
    // CHF
    $configs['CHF']['INT'] = ['### Fr.', 2, '.', ','];
    $configs['CHF']['LOC'] = ['### Fr.', 2, ',', '.'];
    // CNY
    $configs['CNY']['INT'] = ['¥###', 2, '.', ','];
    $configs['CNY']['LOC'] = ['###元', 2, '.', ','];
    // EUR
    $configs['EUR']['INT'] = ['€###', 2, '.', ','];
    $configs['EUR']['LOC'] = ['€###', 2, ',', '.'];
    // GBP
    $configs['GBP']['INT'] = ['£###', 2, '.', ','];
    $configs['GBP']['LOC'] = $configs['GBP']['INT'];
    // HKD
    $configs['HKD']['INT'] = ['HK$###', 2, '.', ','];
    $configs['HKD']['LOC'] = $configs['HKD']['INT'];
    // IDR
    $configs['IDR']['INT'] = ['Rp###', 0, '.', ','];
    $configs['IDR']['LOC'] = ['Rp###', 0, ',', '.'];
    // INR
    $configs['INR']['INT'] = ['₹###', 2, '.', ','];
    $configs['INR']['LOC'] = ['₹###', 2, '.', ',', 'format_number_india'];
    // JPY
    $configs['JPY']['INT'] = ['¥###', 0, '.', ','];
    $configs['JPY']['LOC'] = ['###円', 0, '.', ','];
    // KHR
    $configs['KHR']['INT'] = ['###៛', 0, '.', ','];
    $configs['KHR']['LOC'] = $configs['KHR']['INT'];
    // KRW
    $configs['KRW']['INT'] = ['₩###', 0, '.', ','];
    $configs['KRW']['LOC'] = ['###원', 0, '.', ','];
    // LAK
    $configs['LAK']['INT'] = ['₭###', 2, '.', ','];
    $configs['LAK']['LOC'] = ['### ກີບ', 2, '.', ','];
    // MMK
    $configs['MMK']['INT'] = ['K###', 0, '.', ','];
    $configs['MMK']['LOC'] = ['###ကျပ်', 0, '.', ','];
    // MXN
    $configs['MXN']['INT'] = ['MX$###', 2, '.', ','];
    $configs['MXN']['LOC'] = $configs['MXN']['INT'];
    // MYR
    $configs['MYR']['INT'] = ['RM###', 2, '.', ','];
    $configs['MYR']['LOC'] = $configs['MYR']['INT'];
    // NOK
    $configs['NOK']['INT'] = ['### kr', 2, '.', ','];
    $configs['NOK']['LOC'] = ['### kr', 2, ',', '.'];
    // NZD
    $configs['NZD']['INT'] = ['NZ$###', 2, '.', ','];
    $configs['NZD']['LOC'] = $configs['NZD']['INT'];
    // PHP
    $configs['PHP']['INT'] = ['₱###', 2, '.', ','];
    $configs['PHP']['LOC'] = $configs['PHP']['INT'];
    // RUB
    $configs['RUB']['INT'] = ['###₽', 2, '.', ','];
    $configs['RUB']['LOC'] = $configs['RUB']['INT'];
    // SEK
    $configs['SEK']['INT'] = ['### kr', 2, '.', ','];
    $configs['SEK']['LOC'] = ['### kr', 2, ',', '.'];
    // SGD
    $configs['SGD']['INT'] = ['S$###', 2, '.', ','];
    $configs['SGD']['LOC'] = $configs['SGD']['INT'];
    // THB
    $configs['THB']['INT'] = ['฿###', 2, '.', ','];
    $configs['THB']['LOC'] = ['### บ.', 2, '.', ','];
    // TWD
    $configs['TWD']['INT'] = ['NT$###', 2, '.', ','];
    $configs['TWD']['LOC'] = ['###元', 2, '.', ','];
    // USD
    $configs['USD']['INT'] = ['US$###', 2, '.', ','];
    $configs['USD']['LOC'] = ['$###', 2, '.', ','];
    // VND
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
function retrieve_available_currencies (): array
{
    $currencies = retrieve_currency_configs();
    return array_keys($currencies);
}

/**
 * Format the currency
 * @param float $amount The amount of money to format
 * @param string $currency The currency code of the amount (ISO4217), must be the currency from the supported currencies obtained from the retrieve_available_currencies()
 * @param string $format The format of the currency to be returned, must be ISO, LOC (for local format), or INT (for international format)
 * @return string The formatted currencies in the specified $format, an empty string is returned if the currency or format is not supported
 */
function format_currency(float $amount, string $currency, string $format) :string
{
    $config = retrieve_currency_configs($currency);
    if (empty($config) || ! in_array($format, ['INT', 'LOC', 'ISO']))
    {
        return '';
    }
    $negative = '';
    if (0 > $amount)
    {
        $negative = '-';
        $amount   *= -1;
    }
    if ('ISO' == $format)
    {
        return "$currency " . number_format($amount, 2, '.', ',');
    }
    $used_config = $config[$format];
    if (isset($used_config[4]))
    {
        $function         = $used_config[4];
        $formatted_amount = $function($amount, $used_config[1]);
    } else
    {
        $formatted_amount = number_format($amount, $used_config[1], $used_config[2], $used_config[3]);
    }
    return $negative . str_replace('###', $formatted_amount, $used_config[0]);
}
