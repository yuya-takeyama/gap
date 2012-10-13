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
 * Array-based request parameters.
 *
 * @author Yuya Takeyama
 */
class Gap_Request_Parameters implements Gap_Request_ParametersInterface
{
    /**
     * @var array
     */
    private $parameters;

    /**
     * Constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Gets parameter by key.
     *
     * @param  string $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->parameters[$key];
    }

    /**
     * Sets parameter by key and value.
     *
     * @param  string $key
     * @param  mixeda $value
     * @return void
     */
    public function offsetSet($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * Whether parameter with its key exists.
     *
     * @param  string $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return isset($this->parameters[$key]);
    }

    /**
     * Removes parameter by key.
     *
     * @param  string $key
     * @return void
     */
    public function offsetUnset($key)
    {
        unset($this->parameters[$key]);
    }
}
