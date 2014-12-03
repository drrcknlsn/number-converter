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
            [-1000000, 'negative one million'],
            [-999221, 'negative nine hundred ninety nine thousand two hundred twenty one'],
            [-100000, 'negative one hundred thousand'],
            [-10000, 'negative ten thousand'],
            [-1001, 'negative one thousand one'],
            [-1000, 'negative one thousand'],
            [-111, 'negative one hundred eleven'],
            [-110, 'negative one hundred ten'],
            [-100, 'negative one hundred'],
            [-21, 'negative twenty one'],
            [-20, 'negative twenty'],
            [-11, 'negative eleven'],
            [-10, 'negative ten'],
            [-1, 'negative one'],
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
            [1001, 'one thousand one'],
            [10000, 'ten thousand'],
            [100000, 'one hundred thousand'],
            [999221, 'nine hundred ninety nine thousand two hundred twenty one'],
            [1000000, 'one million'],
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
