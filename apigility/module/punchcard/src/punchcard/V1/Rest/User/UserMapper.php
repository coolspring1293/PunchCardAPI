<?php
/**
 * Created by PhpStorm.
 * User: liuw53
 * Date: 5/20/16
 * Time: 10:32
 */
namespace punchcard\V1\Rest\User;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;



class UserMapper
{
    protected $adapter;
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
    // GET /user
    public function fetchAll()
    {
        $select = new Select('user');
        $paginatorAdapter = new DbSelect($select, $this->adapter);
        $collection = new UserCollection($paginatorAdapter);
        return $collection;
    }

    // GET /user/$id
    public function fetchOne($userID)
    {
        $sql = 'SELECT * FROM ' . "user" .' WHERE id = ?';
        $resultset = $this->adapter->query($sql, array($userID));
        $data = $resultset->toArray();
        if (!$data) {
            return false;
        }

        $entity = new UserEntity();

        $entity->exchangeArray($data[0]);
        $entity->rank = 1042;
        return $entity;
    }
    



    
    
    

}

