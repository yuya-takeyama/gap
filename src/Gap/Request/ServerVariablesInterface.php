<?php
interface Gap_Request_ServerVariablesInterface extends Gap_Request_ParametersInterface
{
    public function isSsl();

    public function hasReferer();

    public function getReferer();
}
