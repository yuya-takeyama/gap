<?php
/**
 * This file is part of Gap.
 *
 * (c) Yuya Takeyama
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Unit-tests for Gap_Request_Parameters.
 *
 * @author Yuya Takeyama
 */
class Gap_Tests_Request_ParametersTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function offsetGet_returns_value()
    {
        $parameters = new Gap_Request_Parameters(array('key' => 'value'));

        $this->assertEquals('value', $parameters['key']);
    }

    /**
     * @test
     */
    public function offsetGet_returns_NULL_if_the_key_does_not_exist()
    {
        $parameters = new Gap_Request_Parameters;

        $this->assertNull($parameters['invalid_key']);
    }

    /**
     * @test
     */
    public function offsetSet_sets_value()
    {
        $parameters = new Gap_Request_Parameters;
        $parameters['key'] = 'value';

        $this->assertEquals('value', $parameters['key']);
    }

    /**
     * @test
     */
    public function offsetExists_should_be_true_if_the_key_exists()
    {
        $parameters = new Gap_Request_Parameters(array('key' => 'value'));

        $this->assertTrue(isset($parameters['key']));
    }

    /**
     * @test
     */
    public function offsetExists_should_be_false_if_the_key_does_not_exist()
    {
        $parameters = new Gap_Request_Parameters(array('key' => 'value'));

        $this->assertFalse(isset($parameters['invalid_key']));
    }

    /**
     * @test
     */
    public function offsetUnset_removes_value()
    {
        $parameters = new Gap_Request_Parameters(array('key' => 'value'));
        unset($parameters['key']);

        $this->assertNull($parameters['key']);
    }
}
