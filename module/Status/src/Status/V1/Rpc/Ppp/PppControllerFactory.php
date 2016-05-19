<?php
namespace Status\V1\Rpc\Ppp;

class PppControllerFactory
{
    public function __invoke($controllers)
    {
        return new PppController();
    }
}
