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
}
