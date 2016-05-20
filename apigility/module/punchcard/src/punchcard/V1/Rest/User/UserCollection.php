<?php
namespace punchcard\V1\Rest\User;

use Zend\Paginator\Paginator;

class UserCollection extends Paginator
{

    function Init()
    {

        $tmp = array();
        $count = $this->adapter->count();
        for ($i = 0; $i < $count; $i ++ )
        {
            array_push($tmp, $this->adapter->getItems($i));

        }
        return $tmp;
    }
}
