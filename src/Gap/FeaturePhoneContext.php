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

    const COOKIE_NAME = '__utmmobile';

    const COOKIE_PATH = '/';

    const COOKIE_USER_PERSISTENCE = 63072000;

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
    private function getVisitorId($guid, $account, $userAgent, $cookie)
    {
        // If there is a value in the cookie, don't change it.
        if (!empty($cookie)) {
            return $cookie;
        }

        $message = "";
        if (!empty($guid)) {
            // Create the visitor id using the guid.
            $message = $guid . $account;
        } else {
            // otherwise this is a new user, create a new random id.
            $message = $userAgent . uniqid(rand(0, 0x7fffffff), true);
        }

        $md5String = md5($message);

        return "0x" . substr($md5String, 0, 16);
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

    public function hasUtmvid()
    {
        return true;
    }

    public function getUtmvid($gaAccount = null)
    {
        if (isset($this->utmvid)) {
            return $this->utmvid;
        }

        $guid = '';
        if (isset($this->server['HTTP_X_DCMGUID'])) {
            $guid = $this->server['HTTP_X_DCMGUID'];
        } else if (isset($this->server['HTTP_X_UP_SUBNO'])) {
            $guid = $this->server['HTTP_X_UP_SUBNO'];
        } else if (isset($this->server['HTTP_X_JPHONE_UID'])) {
            $guid = $this->server['HTTP_X_JPHONE_UID'];
        } else if (isset($this->server['HTTP_X_EM_UID'])) {
            $guid = $this->server['HTTP_X_EM_UID'];
        }

        $ua     = $this->server['HTTP_USER_AGENT'];
        $cookie = $this->cookie[self::COOKIE_NAME];

        return $this->getVisitorId($guid, $gaAccount, $ua, $cookie);
    }
}
