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
 * Server variables.
 *
 * @author Yuya Takeyama
 */
class Gap_Request_ServerVariables
    extends Gap_Request_Parameters
    implements Gap_Request_ServerVariablesInterface
{
    public function getServerName()
    {
        return $this['SERVER_NAME'];
    }

    /**
     * Whether on SSL
     *
     * @return bool
     */
    public function isSsl()
    {
        return isset($this['HTTPS']) && (bool)$this['HTTPS'];
    }

    public function hasReferer()
    {
        return isset($this['HTTP_REFERER']) && $this['HTTP_REFERER'] !== '';
    }

    public function getReferer()
    {
        return $this->hasReferer() ? $this['HTTP_REFERER'] : null;
    }
}
