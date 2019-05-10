<?php
/**
 * Created by PhpStorm.
 * User: momo
 * Date: 2019/4/18
 * Time: 下午3:11
 */

namespace Controllers\csrf;


use Controllers\base_controller;
use Slim\App;
use Slim\Container;

class csrf_controller extends base_controller
{

    public function method($request, $response, $method)
    {
        $method = $method['method'];
        $this->$method($request, $response);
    }

    public function index($request, $response)
    {
        return $this->render($response, 'csrf.phtml');
    }


    public function verify($request, $response){
        if ($this->securityutil->verifyCSRFToken()) {
            $data = array('ec' => 200, "info" => "允许请求");
            return $response->getBody()->write(json_encode($data));
        } else {
            $data = array('ec' => 200, "info" => "token 验证失败");
            return $response->getBody()->write(json_encode($data));
        }
    }

}