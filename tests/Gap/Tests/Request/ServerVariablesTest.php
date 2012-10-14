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
 * Unit-tests of Gap_Request_ServerVariables.
 *
 * @author Yuya Takeyama
 */
class Gap_Tests_Request_ServerVariablesTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isSsl_should_be_false_by_default()
    {
        $server = new Gap_Request_ServerVariables;

        $this->assertFalse($server->isSsl());
    }

    /**
     * @test
     */
    public function isSsl_should_be_true_when_using_ssl()
    {
        $server = new Gap_Request_ServerVariables(array(
            'HTTPS' => 'on',
        ));

        $this->assertTrue($server->isSsl());
    }
}
