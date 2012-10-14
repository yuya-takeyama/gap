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
 * Unit-tests for Gap_TrackingHandler_GoogleAnalytics_UrlBuilder.
 *
 * @author Yuya Takeyama
 */
class Gap_Tests_TrackingHandler_GoogleAnalytics_UrlBuilderTest
    extends PHPUnit_Framework_TestCase
{
    const FIXTURE_TRACKING_ID = 'UA-XXXXXXXX-X';

    /**
     * @test
     */
    public function getBaseUrl_should_be_http_if_not_SSL()
    {
        $context = $this->createMockContext();
        Phake::when($context)->isSsl()->thenReturn(false);

        $builder = new Gap_TrackingHandler_GoogleAnalytics_UrlBuilder(
            self::FIXTURE_TRACKING_ID,
            $context
        );

        $this->assertEquals(
            'http://www.google-analytics.com/',
            $builder->getBaseUrl()
        );
    }

    /**
     * @test
     */
    public function getBaseUrl_should_be_https_if_SSL()
    {
        $context = $this->createMockContext();
        Phake::when($context)->isSsl()->thenReturn(true);

        $builder = new Gap_TrackingHandler_GoogleAnalytics_UrlBuilder(
            self::FIXTURE_TRACKING_ID,
            $context
        );

        $this->assertEquals(
            'https://ssl.google-analytics.com/',
            $builder->getBaseUrl()
        );
    }

    /**
     * @test
     */
    public function getParameters()
    {
        $context = $this->createMockContext();

        $builder = new Gap_TrackingHandler_GoogleAnalytics_UrlBuilder(
            self::FIXTURE_TRACKING_ID,
            $context
        );

        $this->assertEquals(
            array(
                'utmac' => self::FIXTURE_TRACKING_ID,
            ),
            $builder->getParameters()
        );
    }

    private function createMockContext()
    {
        return Phake::partialMock('Gap_ContextInterface');
    }
}
