<?php
/**
 * BaseConverter.
 *
 * @author Frank Nägler <mail@naegler.net>
 *
 * @link https://github.com/NeoBlack/BaseConverter
 */

namespace NeoBlack\BaseConverter\Tests\Unit;

use NeoBlack\BaseConverter\BaseConverter;

/**
 * Class BaseConverterTest.
 */
class BaseConverterTest extends BaseTestCase
{
    /**
     * @return array
     */
    public function baseTestDataProvider()
    {
        return [
            '1 16base' => [1, '1', BaseConverter::BASE16],
            '1 32base' => [1, '1', BaseConverter::BASE32],
            '1 62base' => [1, '1', BaseConverter::BASE62],
            '1 64base' => [1, '1', BaseConverter::BASE64],
            '100 16base' => [100, '64', BaseConverter::BASE16],
            '100 32base' => [100, '34', BaseConverter::BASE32],
            '100 62base' => [100, '1C', BaseConverter::BASE62],
            '100 64base' => [100, '1A', BaseConverter::BASE64],
            '1000 16base' => [1000, '3E8', BaseConverter::BASE16],
            '1000 32base' => [1000, 'V8', BaseConverter::BASE32],
            '1000 62base' => [1000, 'g8', BaseConverter::BASE62],
            '1000 64base' => [1000, 'fE', BaseConverter::BASE64],
        ];
    }

    public function basesDataProvider()
    {
        return [
            '16base' => [BaseConverter::BASE16],
            '32base' => [BaseConverter::BASE32],
            '62base' => [BaseConverter::BASE62],
            '64base' => [BaseConverter::BASE64],
        ];
    }

    /**
     * @param int $tenBaseValue
     * @param string $xBaseValue
     * @param string $base
     * @test
     * @dataProvider baseTestDataProvider
     */
    public function to10BaseReturnCorrectValue($tenBaseValue, $xBaseValue, $base)
    {
        static::assertEquals($tenBaseValue, BaseConverter::to10Base($xBaseValue, $base));
    }

    /**
     * @param int $tenBaseValue
     * @param string $xBaseValue
     * @param string $base
     * @test
     * @dataProvider baseTestDataProvider
     */
    public function toBaseReturnCorrectValue($tenBaseValue, $xBaseValue, $base)
    {
        static::assertEquals($xBaseValue, BaseConverter::toBase($tenBaseValue, $base));
    }

    /**
     * @param string $base
     * @test
     * @dataProvider basesDataProvider
     */
    public function ensureConversionInBothDirectionsWorksForDifferentBases($base)
    {
        $input = range(0, 10000);
        $expected = [];
        foreach ($input as $number) {
            $expected[$number] = BaseConverter::toBase($number, $base);
        }
        foreach ($expected as $tenBase => $baseValue) {
            static::assertEquals($tenBase, BaseConverter::to10Base($baseValue, $base));
        }
    }
}
