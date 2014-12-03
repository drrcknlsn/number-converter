<?php
namespace DrrckNlsn\NumberConverter;

interface NumberConverter
{
    /**
     * Converts a number to its readable form.
     *
     * @param integer $number The number.
     *
     * @return string The readable form of the number.
     */
    public function convert($number);
}
