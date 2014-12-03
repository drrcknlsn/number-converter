<?php
namespace DrrckNlsn\NumberConverter;

class EnglishNumberConverterTest extends \PHPUnit_Framework_TestCase
{
    protected $converter;

    public function setUp()
    {
        $this->converter = new EnglishNumberConverter();
    }

    public function provider()
    {
        return [
            [0, 'zero'],
            [1, 'one'],
            [10, 'ten'],
            [11, 'eleven'],
            [20, 'twenty'],
            [21, 'twenty one'],
            [100, 'one hundred'],
            [101, 'one hundred one'],
            [110, 'one hundred ten'],
            [111, 'one hundred eleven'],
            [1000, 'one thousand'],
            [10000, 'ten thousand'],
            [100000, 'one hundred thousand'],
            [1000000, 'one million']
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testConvert($number, $converted)
    {
        $this->assertSame(
            $converted,
            $this->converter->convert($number)
        );
    }
}
