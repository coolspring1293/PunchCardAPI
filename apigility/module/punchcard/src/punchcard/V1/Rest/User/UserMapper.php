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
    private   $table_name = 'user';

    /***
     * UserMapper constructor.
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
    //
    /***
     * GET /user
     * @return UserCollection
     */
    public function fetchAll()
    {
        $select = new Select($this->table_name);
        $paginatorAdapter = new DbSelect($select, $this->adapter);
        // $collection = new UserCollection($paginatorAdapter);

        $res = array();
        $count = $paginatorAdapter->count();
        for ($i = 1; $i <= $count; $i ++ )
        {
            array_push($res, $this->fetchOne($i));
        }

        // return $collection;
        return $res;
    }

    /***
     * GET /user/$id
     * @param $userID
     * @return bool|UserEntity
     */
    public function fetchOne($userID)
    {
        $sql = 'SELECT * FROM ' . $this->table_name .' WHERE id = ?';
        $resultset = $this->adapter->query($sql, array($userID));
        $data = $resultset->toArray();
        if (!$data) {
            return false;
        }

        $sql = "select count(*) + 1 as rank from $this->table_name where $this->table_name.gold_coin_amount > " .
            "(select gold_coin_amount from $this->table_name as t1 where t1.id = ?)";
        $resultset = $this->adapter->query($sql, array($userID));

        $data2 = $resultset->toArray();
        
        
        $entity = new UserEntity();
        $entity->exchangeArray($data[0], $data2[0]);
        return $entity;
    }

    /**
     * Convert stdObject to Array
     * @param $array
     * @return array
     */
    protected function object_to_array($obj)
    {
        $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
        foreach($_arr as $key => $val)  {
            $val = (is_array($val) || is_object($val)) ? $this->object_to_array($val) : $val;
            $arr[$key] = $val;
        }
        return $arr;
    }
    /***
     * POST /$id
     * Register
     * @param $data(id, pwd)
     */
    public function create($data)
    {
        $tt = $this->object_to_array($data);
        $register_name      = $tt['userName'];
        $register_nickname  = $tt['name'];
        $register_pwd       = $tt['password_hash'];

        $sql = "insert into user(user_name, nick_name, password_hash, streak_days, gold_coin_amount, last_activity_date)".
            "values(\"$register_name\", \"$register_nickname\", \"$register_pwd\", 0, 0, \"2016-05-18\")";
        $resultset = $this->adapter->query($sql);
        //$entity = new UserEntity();
        //$entity->createEntityByRegister($register_id, $register_pwd);

        return $tt;

    }
    



    
    
    

}

