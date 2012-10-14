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
 * Request URL builder for GoogleAnalytics TrackingHandler.
 *
 * @author Yuya Takeyama
 */
class Gap_TrackingHandler_GoogleAnalytics_UrlBuilder
{
    /**
     * Google Analytics tracking ID
     *
     * @var string
     */
    private $trackingId;

    /**
     * @var Gap_ContextInterface
     */
    private $context;

    /**
     * Constructor.
     *
     * @param string      $trackingId
     * @param Gap_Context $context
     */
    public function __construct($trackingId, Gap_ContextInterface $context)
    {
        $this->trackingId = $trackingId;
        $this->context    = $context;
    }

    /**
     * Gets the base URL of Google Analytics.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->context->isSsl() ?
            'https://ssl.google-analytics.com/' :
            'http://www.google-analytics.com/';
    }

    /**
     * Gets parametrs to be sent to Google Analytics.
     *
     * @return array
     */
    public function getParameters()
    {
        $parameters = array(
            'utmac' => $this->trackingId,
        );

        return $parameters;
    }
}
