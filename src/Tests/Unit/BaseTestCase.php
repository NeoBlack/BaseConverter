<?php
/**
 * BaseConverter.
 *
 * @author Frank Nägler <mail@naegler.net>
 *
 * @link https://github.com/NeoBlack/BaseConverter
 */

namespace NeoBlack\BaseConverter\Tests\Unit;

/**
 * Class BaseTestCase.
 */
class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Call protected/private method of a class.
     *
     * @param mixed  &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

    /**
     * @param \stdClass $object
     * @param string   $property
     * @param mixed    $value
     */
    public function setProperty(&$object, $property, $value)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $_property = $reflection->getProperty($property);
        $_property->setAccessible(true);
        $object->$property = $value;
    }
}
