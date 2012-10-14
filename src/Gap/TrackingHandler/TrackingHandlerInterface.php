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
 * Interface of TrackingHandler.
 *
 * @author Yuya Takeyama
 */
interface Gap_TrackingHandler_TrackingHandlerInterface
{
    public function setContext(Gap_ContextInterface $context);

    public function trackPageview($path = null);
}
