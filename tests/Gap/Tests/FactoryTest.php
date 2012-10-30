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
 * Unit-tests of Gap_ContextFactory.
 *
 * @author Yuya Takeyama
 */
class Gap_Tests_ContextFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createContext_should_create_FeaturePhoneContext_if_it_is_request_by_feature_phone()
    {
        $server = $this->getMock('Gap_Request_ServerVariablesInterface');
        $server->expects($this->any())
            ->method('isFeaturePhone')
            ->will($this->returnValue(true));

        $factory = $this->createContextFactoryWithServerVariables($server);

        $this->assertInstanceOf('Gap_FeaturePhoneContext', $factory->createContext());
    }

    /**
     * @test
     */
    public function createContext_should_not_create_FeaturePhoneContext_if_it_is_not_request_by_feature_phone()
    {
        $server = $this->getMock('Gap_Request_ServerVariablesInterface');
        $server->expects($this->any())
            ->method('isFeaturePhone')
            ->will($this->returnValue(false));

        $factory = $this->createContextFactoryWithServerVariables($server);

        $context = $factory->createContext();

        $this->assertNotInstanceOf('Gap_FeaturePhoneContext', $context);
        $this->assertInstanceOf('Gap_Context', $context);
    }

    private function createContextFactoryWithServerVariables(Gap_Request_ServerVariablesInterface $server)
    {
        return new Gap_ContextFactory(
            $this->getMock('Gap_Request_ParametersInterface'),
            $this->getMock('Gap_Request_ParametersInterface'),
            $this->getMock('Gap_Request_ParametersInterface'),
            $this->getMock('Gap_Request_CookieInterface'),
            $server
        );
    }
}
