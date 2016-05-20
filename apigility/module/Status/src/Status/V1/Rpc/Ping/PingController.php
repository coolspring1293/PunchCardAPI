<?php
namespace Status\V1\Rpc\Ping;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

class PingController extends AbstractActionController
{
    public function pingAction()
    {


        $tt = [1, 2, 3];
        return $tt;
//        return new ViewModel(array(
//            array(
//                time(),
//                time(),
//            ),
//            array(
//                time(),
//            ),
//        ));
    }
}
