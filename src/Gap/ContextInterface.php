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
 * Interface of Context.
 *
 * @author Yuya Takeyama
 */
interface Gap_ContextInterface
{
    public function getGoogleAnalyticsVersion();

    public function getServerName();

    public function isSsl();

    public function getReferer();

    public function getUtmcc();

    public function hasUtmip();

    public function getUtmip();

    public function hasUtmvid();

    public function setUtmvid($utmvid);

    public function getUtmvid($gaAccount = null);

    public function isFeaturePhone();
}
