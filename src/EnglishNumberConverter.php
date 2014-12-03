<?php
namespace DrrckNlsn\NumberConverter;

/**
 * Converts numbers to their written, English-language representation.
 */
class EnglishNumberConverter implements NumberConverter
{
    /**
     * Breakpoints with special suffixes.
     *
     * @var string[]
     */
    protected static $suffixes = [
        1000000 => 'million',
        1000 => 'thousand',
        100 => 'hundred'
    ];

    /**
     * The names of the tens values.
     *
     * @var string[]
     */
    protected static $tens = [
        10 => 'ten',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'fourty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety'
    ];

    /**
     * The names of the teens values.
     *
     * @var string[]
     */
    protected static $teens = [
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen'
    ];

    /**
     * The names of the ones values.
     *
     * @var string[]
     */
    protected static $ones = [
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine'
    ];

    /**
     * {@inheritdoc}
     */
    public function convert($number)
    {
        $pieces = [];

        if ($number < 0) {
            $pieces[] = 'negative';
            $number = abs($number);
        }

        foreach (self::$suffixes as $value => $suffix) {
            if ($number >= $value) {
                $pre = (int)floor($number / $value);
                $post = $number % $value;

                $pieces[] = $this->convert(floor($number / $value));
                $pieces[] = $suffix;

                if ($post !== 0) {
                    $pieces[] = $this->convert($number % $value);
                }

                return implode(' ', $pieces);
            }
        }

        if ($number === 0) {
            return 'zero';
        }

        if (isset(self::$teens[$number])) {
            $pieces[] = self::$teens[$number];
        } else {
            $tensValue = (int)floor($number / 10) * 10;
            $onesValue = $number % 10;

            if ($tensValue !== 0) {
                $pieces[] = self::$tens[$tensValue];
            }

            if ($onesValue !== 0) {
                $pieces[] = self::$ones[$onesValue];
            }
        }

        return implode(' ', $pieces);
    }
}
