<?php
namespace punchcard\V1\Rpc\LogIn;

class LogInControllerFactory
{
    public function __invoke($controllers)
    {
        return new LogInController();
    }
}
