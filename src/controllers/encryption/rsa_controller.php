<?php
/**
 * Created by PhpStorm.
 * User: momo
 * Date: 2019/4/18
 * Time: 下午3:12
 */

namespace Controllers\encryption;

use Controllers\base_controller;

class rsa_controller extends base_controller
{
    public function method($request, $response, $method)
    {
        $method = $method['method'];
        $this->$method($request, $response);
    }

    public function index($request, $response)
    {
        $data = $request->getParam('data');
        $this->securityutil->initialRSAConfig(dirname(__FILE__).'/pri.key',dirname(__FILE__).'/pub.key');
        $resultA=$result=$this->securityutil->rsaPublicEncrypt($data );
        $result.='<br>';
        $result.= $this->securityutil->rsaPrivateDecrypt($resultA);
        return $response->getBody()->write($result);
    }

    public function index1($request, $response)
    {
        $data = $request->getParam('data');
        $this->securityutil->initialRSAConfig(dirname(__FILE__).'/pri.key',dirname(__FILE__).'/pub.key');
        $resultA=$result=$this->securityutil->rsaPrivateEncrypt($data );
        $result.='<br>';
        $result.= $this->securityutil->rsaPublicDecrypt($resultA);
        return $response->getBody()->write($result);
    }

}