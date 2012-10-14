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
 * Unit-tests of Gap_Context
 *
 * @author Yuya Takeyama
 */
class Gap_Tests_ContextTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isSsl_should_be_true_if_SSL()
    {
        $server = $this->getMock('Gap_Request_ServerVariablesInterface');
        $server->expects($this->any())
            ->method('isSsl')
            ->will($this->returnValue('true'));
    }

    private function createContextWithServerVariables(
        Gap_Request_ServerVariablesInterface $server
    )
    {
        return new Gap_Context(
            $this->getMock('Gap_Request_ParametersInterface'),
            $this->getMock('Gap_Request_ParametersInterface'),
            $this->getMock('Gap_Request_ParametersInterface'),
            $this->getMock('Gap_Request_CookieInterface'),
            $server
        );
    }
}
