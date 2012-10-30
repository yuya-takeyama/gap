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
 * Context class for feature phones.
 *
 * @author Yuya Takeyama
 */
class Gap_FeaturePhoneContext extends Gap_Context
{
    const GOOGLE_ANALYTICS_FEATURE_PHONE_VERSION = '4.4sh';

    public function getGoogleAnalyticsVersion()
    {
        return self::GOOGLE_ANALYTICS_FEATURE_PHONE_VERSION;
    }

    public function getUtmcc()
    {
        return '__utma=999.999.999.999.999.1;';
    }

    public function hasUtmip()
    {
        return true;
    }

    public function getUtmip()
    {
        return $this->convertIp($this->server['REMOTE_ADDR']);
    }

    /**
     * This function is almost taken from ga.php's getIP() of Google Analytics official
     */
    private function convertIp($remoteAddress)
    {
        if (empty($remoteAddress)) {
            return "";
        }

        // Capture the first three octects of the IP address and replace the forth
        // with 0, e.g. 124.455.3.123 becomes 124.455.3.0
        $regex = "/^([^.]+\.[^.]+\.[^.]+\.).*/";
        if (preg_match($regex, $remoteAddress, $matches)) {
            return $matches[1] . "0";
        } else {
            return "";
        }
    }
}
