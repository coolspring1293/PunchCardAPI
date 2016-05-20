<?php
namespace punchcard\V1\Rest\User;

class UserResourceFactory
{
    public function __invoke($services)
    {

        $mapper = $services->get('punchcard\V1\Rest\User\UserMapper');
        return new UserResource($mapper);
    }
}
