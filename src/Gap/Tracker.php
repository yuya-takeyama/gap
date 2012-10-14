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
 * Tracker.
 *
 * @author Yuya Takeyama
 */
class Gap_Tracker
{
    /**
     * @var Gap_TrackingHandler_TrackingHandlerInterface
     */
    private $trackingHandler;

    /**
     * @var Gap_ContextInterface
     */
    private $context;

    public function __construct(array $params)
    {
        $this->trackingHandler = $params['tracking_handler'];

        $this->context = new Gap_Context(
            $params['get'],
            $params['post'],
            $params['request'],
            $params['cookie'],
            $params['server']
        );
    }

    public function trackPageview($path = null)
    {
        $this->trackingHandler->trackPageview($path);
    }
}
