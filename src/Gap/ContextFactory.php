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
 * Factory of Gap_Context.
 *
 * @author Yuya Takeyama
 */
class Gap_ContextFactory
{
    /**
     * GET parameters
     *
     * @var Gap_Request_ParametersInterface
     */
    private $get;

    /**
     * POST parameters
     *
     * @var Gap_Request_ParametersInterface
     */
    private $post;

    /**
     * Request parameters
     *
     * @var Gap_Request_ParametersInterface
     */
    private $request;

    /**
     * Cookie
     *
     * @var Gap_Request_CookieInterface
     */
    private $cookie;

    /**
     * Server variables
     *
     * @var Gap_Request_ServerVariablesInterface
     */
    private $server;

    /**
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

    public function createContext()
    {
        if ($this->server->isFeaturePhone()) {
            return new Gap_FeaturePhoneContext(
                $this->get,
                $this->post,
                $this->request,
                $this->cookie,
                $this->server
            );
        } else {
            return new Gap_Context(
                $this->get,
                $this->post,
                $this->request,
                $this->cookie,
                $this->server
            );
        }
    }
}
