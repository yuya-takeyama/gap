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

    public function __construct(
        Gap_TrackingHandler_TrackingHandlerInterface $handler,
        Gap_ContextInterface                         $context
    )
    {
        $this->trackingHandler = $handler;
        $this->context         = $context;

        $this->trackingHandler->setContext($context);
    }

    public function trackPageview($path = null)
    {
        $this->trackingHandler->trackPageview($path);
    }
}
