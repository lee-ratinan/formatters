<?php

/**
 * Retrieve the calendar array in various calendar
 * @param string $string_date Date string in ISO8601 format, YYYY-MM-DD
 * @param string $calendar Calendar, it could be GREGORIAN, JAPANESE, TAIWANESE, THAI
 * @return array The array containing year, month, date, and era
 */
function retrieve_calendar_date (string $string_date, string $calendar): array
{
    if ( ! preg_match('/^\d{4}\-(0[1-9]|1[0-2])\-(0[1-9]|[1-2]\d|3[0-1])$/', $string_date)
    || ! in_array($calendar, ['GREGORIAN', 'JAPANESE', 'TAIWANESE', 'THAI']))
    {
        return [];
    }
    $int_date = strtotime($string_date);
    $year     = date('Y', $int_date);
    $era      = '';
    if (1971 > $year)
    {
        return [];
    }
    if ('THAI' == $calendar)
    {
        $year += 543;
    } else if ('TAIWANESE' == $calendar)
    {
        $year -= 1911;
    } else if ('JAPANESE' == $calendar)
    {
        if ('2019-05-01' <= $string_date)
        {
            $year -= 2018;
            $era  = 'REIWA';
        } else if ('1989-01-08' <= $string_date)
        {
            $year -= 1988;
            $era  = 'HEISEI';
        } else
        {
            $year -= 1925;
            $era  = 'SHŌWA';
        }
    }
    return [
        'Y' => $year,
        'M' => date('n', $int_date),
        'D' => date('j', $int_date),
        'E' => $era
    ];
}

/**
 * @param string $language_code
 * @param string $format
 * @return array The array containing the months in the specified language and format
 */
function retrieve_calendar_months (string $language_code, string $format): array
{
    $config = [
        'DE' => [
            'S' => ['', '', '', '', '', '', '', '', '', '', '', ''],
            'L' => ['', '', '', '', '', '', '', '', '', '', '', '']
        ],
        'EN' => [
            'S' => ['', '', '', '', '', '', '', '', '', '', '', ''],
            'L' => ['', '', '', '', '', '', '', '', '', '', '', '']
        ],
        'ES' => [
            'S' => ['', '', '', '', '', '', '', '', '', '', '', ''],
            'L' => ['', '', '', '', '', '', '', '', '', '', '', '']
        ],
        'FR' => [
            'S' => ['', '', '', '', '', '', '', '', '', '', '', ''],
            'L' => ['', '', '', '', '', '', '', '', '', '', '', '']
        ],
        'IT' => [
            'S' => ['', '', '', '', '', '', '', '', '', '', '', ''],
            'L' => ['', '', '', '', '', '', '', '', '', '', '', '']
        ],
        'JP' => [
            'S' => ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            'L' => ['01月', '02月', '03月', '04月', '05月', '06月', '07月', '08月', '09月', '10月', '11月', '12月']
        ],
        'KO' => [
            'S' => ['', '', '', '', '', '', '', '', '', '', '', ''],
            'L' => ['', '', '', '', '', '', '', '', '', '', '', '']
        ],
        'TH' => [
            'S' => ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
            'L' => ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม']
        ],
        'ZH' => [
            'S' => ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            'L' => ['01月', '02月', '03月', '04月', '05月', '06月', '07月', '08月', '09月', '10月', '11月', '12月']
        ]
    ];
    if (isset($config[$language_code][$format]))
    {
        return $config[$language_code][$format];
    }
    return [];
}