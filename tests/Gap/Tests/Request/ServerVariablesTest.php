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

    /**
     * @test
     */
    public function isFeaturePhone_should_be_false_by_default()
    {
        $server = new Gap_Request_ServerVariables(array(
            'HTTP_USER_AGENT' => 'Mozilla',
        ));

        $this->assertFalse($server->isFeaturePhone());
    }

    /**
     * @test
     * @dataProvider provideFeaturePhoneUserAgents
     */
    public function isFeaturePhone_should_be_true_if_user_agent_is_featurephones_one($userAgent)
    {
        $server = new Gap_Request_ServerVariables(array(
            'HTTP_USER_AGENT' => $userAgent,
        ));

        $this->assertTrue($server->isFeaturePhone());
    }

    public function provideFeaturePhoneUserAgents()
    {
        $data = array();

        $userAgents = array(
            'DoCoMo/1.0/P506iC/c20/TB/W20H10',
            'DoCoMo/2.0 SH902i(c100;TB;W24H12)',
            'KDDI-HI31 UP.Browser/6.2.0.5 (GUI) MMP/2.0',
            'UP.Browser/3.04-SN12 UP.Link/3.4.4',
            'J-PHONE/4.3/V601T/SNJTSK1133185 TS/2.00 Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.2.2',
            'Vodafone/1.0/V904SH/SHJ002/SN358148001179774 Browser/VF-NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1',
            'MOT-V980/80.2F.2E. MIB/2.2.1 Profile/MIDP-2.0 Configuration/CLDC-1.1',
            'SoftBank/1.0/810SH/SHJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1',
        );

        foreach ($userAgents as $userAgent) {
            $data[] = array($userAgent);
        }

        return $data;
    }
}
