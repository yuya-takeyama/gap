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
     * @var string
     */
    private $requestPath;

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

    public function getPageviewTrackingUrl()
    {
        return $this->getBaseUrl() .
            '/__utm.gif?' .
            http_build_query($this->getParameters());
    }

    /**
     * Gets the base URL of Google Analytics.
     *
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->context->isSsl() ?
            'https://ssl.google-analytics.com' :
            'http://www.google-analytics.com';
    }

    /**
     * Gets parametrs to be sent to Google Analytics.
     *
     * @return array
     */
    public function getParameters()
    {
        $parameters = array(
            'utmwv' => $this->context->getGoogleAnalyticsVersion(),
            'utmn'  => (string)$this->getRandomNumber(),
            'utmhn' => $this->context->getServerName(),
            'utmr'  => $this->context->getReferer(),
            'utmp'  => $this->getRequestPath(),
            'utmac' => $this->trackingId,
            'utmcc' => $this->context->getUtmcc(),
        );

        return $parameters;
    }

    public function setRequestPath($path)
    {
        $this->path = $path;
    }

    public function getRequestPath()
    {
        return $this->path;
    }

    public function getRandomNumber()
    {
        return rand(0, 0x7fffffff);
    }
}
