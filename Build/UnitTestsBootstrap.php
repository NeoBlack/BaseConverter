<?php
/**
 * BaseConverter.
 *
 * @author Frank Nägler <mail@naegler.net>
 *
 * @link https://github.com/NeoBlack/BaseConverter
 */
class UnitTestsBootstrap
{
    /**
     * Bootstraps the system for unit tests.
     */
    public function bootstrapSystem()
    {
        $this->enableDisplayErrors()
            ->initializeConfiguration();
    }

    /**
     * Makes sure error messages during the tests get displayed no matter what is set in php.ini.
     *
     * @return UnitTestsBootstrap fluent interface
     */
    protected function enableDisplayErrors()
    {
        @ini_set('display_errors', 1);

        return $this;
    }

    /**
     * Provides the default configuration.
     *
     * @return UnitTestsBootstrap fluent interface
     */
    protected function initializeConfiguration()
    {
        include __DIR__.'/../vendor/autoload.php';

        return $this;
    }
}

if (PHP_SAPI !== 'cli') {
    die('This script supports command line usage only. Please check your command.');
}
$bootstrap = new UnitTestsBootstrap();
$bootstrap->bootstrapSystem();
unset($bootstrap);
