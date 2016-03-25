<?php
/**
 * BaseConverter.
 *
 * @author Frank Nägler <mail@naegler.net>
 *
 * @link https://github.com/NeoBlack/BaseConverter
 */

namespace NeoBlack\BaseConverter;

/**
 * Class BaseConverter
 *
 * @package NeoBlack\BaseConverter
 */
class BaseConverter
{
    /**
     * Base64 nach RFC 4648
     * @var string
     */
    const BASE64 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';

    /**
     * @var string
     */
    const BASE62 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Base32 nach RFC 4648
     * @var string
     */
    const BASE32 = '0123456789ABCDEFGHIJKLMNOPQRSTUV';

    /**
     * Base16 nach RFC 4648
     * @var string
     */
    const BASE16 = '0123456789ABCDEF';

    /**
     * Convert from any base to base 10 .
     *
     * @param string $value
     * @param string $base
     *
     * @return int
     */
    public static function to10Base(string $value, string $base = self::BASE64): int
    {
        $baseLength = strlen($base);
        $valueLength = strlen($value);
        $result = strpos($base, $value[0]);
        for ($i = 1; $i < $valueLength; $i++) {
            $result = $baseLength * $result + strpos($base, $value[$i]);
        }
        return $result;
    }

    /**
     * Convert from base 10 to another base.
     *
     * @param int $value
     * @param string $base default static::BASE64
     *
     * @return string
     */
    public static function toBase(int $value, string $base = self::BASE64): string
    {
        $baseLength = strlen($base);
        $radix = $value  % $baseLength;
        $result = $base[$radix];
        $tmp = floor($value / $baseLength);
        while ($tmp) {
            $radix = $tmp % $baseLength;
            $tmp = floor($tmp / $baseLength);
            $result = $base[$radix] . $result;
        }
        return $result;
    }
}
