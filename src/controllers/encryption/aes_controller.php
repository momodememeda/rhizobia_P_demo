<?php
/**
 * Created by PhpStorm.
 * User: momo
 * Date: 2019/4/18
 * Time: 下午3:12
 */

namespace Controllers\encryption;


use Controllers\base_controller;

class aes_controller extends base_controller
{
    public function method($request, $response, $method)
    {
        $method = $method['method'];
        $this->$method($request, $response);
    }

    public function index($request, $response)
    {
        $uuid = $request->getParam('uuid');
        $data = $request->getParam('data');
        $this->securityutil->initialAESConfig('Yc%*#nM!5gyX3Gpq3q#YfzpCx5^cXY@E');
        $pwd = $this->securityutil->createSecretKey($uuid);
        $result = $this->securityutil->aesencrypt($data, $pwd);
        return $response->getBody()->write($result);
    }

    public function index2($request, $response)
    {
        $uuid = $request->getParam('uuid');
        $data = $request->getParam('data');
        $this->securityutil->initialAESConfig('Yc%*#nM!5gyX3Gpq3q#YfzpCx5^cXY@E');
        $pwd = $this->securityutil->createSecretKey($uuid);
        $result = $this->securityutil->aesdecrypt($data, $pwd);
        return $response->getBody()->write($result);

    }
}