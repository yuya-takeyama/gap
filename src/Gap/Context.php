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
 * Context of tracker.
 *
 * @author Yuya Takeyama
 */
class Gap_Context implements Gap_ContextInterface
{
    const GOOGLE_ANALYTICS_VERSION = '5.3.6';

    /**
     * GET parameters
     *
     * @var Gap_Request_ParametersInterface
     */
    protected $get;

    /**
     * POST parameters
     *
     * @var Gap_Request_ParametersInterface
     */
    protected $post;

    /**
     * Request parameters
     *
     * @var Gap_Request_ParametersInterface
     */
    protected $request;

    /**
     * Cookie
     *
     * @var Gap_Request_CookieInterface
     */
    protected $cookie;

    /**
     * Server variables
     *
     * @var Gap_Request_ServerVariablesInterface
     */
    protected $server;

    /**
     * Constructor.
     *
     * @param Gap_Request_ParametersInterface      $get     GET parameters
     * @param Gap_Request_ParametersInterface      $post    POST parameters
     * @param Gap_Request_ParametersInterface      $request Request parameters
     * @param Gap_Request_CookieInterface          $cookie  Cookie
     * @param Gap_Request_ServerVariablesInterface $server  Server variables
     */
    public function __construct(
        Gap_Request_ParametersInterface      $get,
        Gap_Request_ParametersInterface      $post,
        Gap_Request_ParametersInterface      $request,
        Gap_Request_CookieInterface          $cookie,
        Gap_Request_ServerVariablesInterface $server
    )
    {
        $this->get     = $get;
        $this->post    = $post;
        $this->request = $request;
        $this->cookie  = $cookie;
        $this->server  = $server;
    }

    public function getGoogleAnalyticsVersion()
    {
        return self::GOOGLE_ANALYTICS_VERSION;
    }

    public function getServerName()
    {
        return $this->server['SERVER_NAME'];
    }

    public function isSsl()
    {
        return $this->server->isSsl();
    }

    public function getReferer()
    {
        if ($this->server->hasReferer()) {
            return $this->server->getReferer();
        } else {
            return '-';
        }
    }

    public function getUtmcc()
    {
        return '__utma=' . $this->cookie['__utma'] . ';+' .
            '__utmz=' . $this->cookie['__utmz'] . ';';
    }

    public function hasUtmip()
    {
        return false;
    }

    public function getUtmip()
    {
        return null;
    }
}
