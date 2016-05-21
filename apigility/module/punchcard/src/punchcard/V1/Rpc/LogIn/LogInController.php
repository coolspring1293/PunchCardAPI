<?php
namespace punchcard\V1\Rpc\LogIn;

use punchcard\V1\Rest\User\UserEntity;
use punchcard\V1\Rest\User\UserResourceFactory;
use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

use ZF\ApiProblem\ApiProblemResponse;
use ZF\ApiProblem\ApiProblem;

use \PDO;

class LogInController extends AbstractActionController
{


    private function object_to_array($obj)
    {
        $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
        foreach($_arr as $key => $val)  {
            $val = (is_array($val) || is_object($val)) ? $this->object_to_array($val) : $val;
            $arr[$key] = $val;
        }
        return $arr;
    }

    /***
     * 注入 http POST 127.0.0.1:8888/login userName="liuw53sdfdsf' union all select 1, 1, password_hash as nick_name, 1,
     * 1, 1, 1 from user where user_name = 'leasunhy';" name=ddd password_hash=1234jjj
     * @return array|mixed|ApiProblemResponse
     */
    public function logInAction()
    {
        session_start();


        $body = @file_get_contents('php://input');
        $arr = $this->object_to_array(json_decode($body));

        $username = $arr["userName"];
        $pwd      = $arr['password_hash'];

        $db = new PDO("sqlite:data/punchcard.db");


        if ($db){
            $result = $db->query("SELECT * FROM user WHERE user_name = '$username' and password_hash='$pwd'");
            $entity = $result->fetch();

            if (!$entity) {
                return new ApiProblemResponse(
                    new ApiProblem(401, 'The credentials you provided are invalid.')
                );
            }

            $id = $entity['id'];
            $sql = "select count(*) + 1 as rank from user where user.gold_coin_amount > " .
                "(select gold_coin_amount from user as t1 where t1.id = $id)";
            $resultset = $db->query($sql);

            $entity = array(
                'userName'          => $entity['user_name'],
                'name'              => $entity['nick_name'],
                'continuousDays'    => $entity['streak_days'],
                'goldCoinAmount'    => $entity['gold_coin_amount'],
                'lastActivityDate'  => $entity['last_activity_date'],
                'rank'              => $resultset->fetch()['rank'],
            );

            $id = $entity['id'];
            $_SESSION['id'] = $id;
            return $entity;

        } else {
            // header('HTTP/1.1 500 Our server already 挂了.');
            return new ApiProblemResponse(new ApiProblem(500, 'DB problem.'));
        }
//        return $entity;
    }
}
