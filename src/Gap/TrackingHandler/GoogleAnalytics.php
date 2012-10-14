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
 * TrackingHandler for Google Analytics.
 *
 * @author Yuya Takeyama
 */
class Gap_TrackingHandler_GoogleAnalytics
    implements Gap_TrackingHandler_TrackingHandlerInterface
{
    /**
     * Google Analytics tracking ID.
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
     * @param string $trackingId
     */
    public function __construct($trackingId)
    {
        $this->trackingId = $trackingId;
    }

    public function setContext(Gap_ContextInterface $context)
    {
        $this->context = $context;
    }

    public function trackPageview($path = null)
    {
        $builder = new Gap_TrackingHandler_GoogleAnalytics_UrlBuilder(
            $this->trackingId,
            $this->context
        );

        if (isset($path)) {
            $builder->setRequestPath($path);
        }

        file($builder->getPageviewTrackingUrl());
    }
}
