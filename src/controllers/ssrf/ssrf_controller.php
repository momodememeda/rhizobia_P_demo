<?php
/**
 * Created by PhpStorm.
 * User: momo
 * Date: 2019/4/18
 * Time: 下午3:13
 */

namespace Controllers\ssrf;


use Controllers\base_controller;

class ssrf_controller extends base_controller
{

    public function index($request, $response)
    {

        $url = $request->getParam('url');
        if ($this->securityutil->checkURL($url)) {
            $data = array('ec' => 200, 'url' => $url, "error" => "允许请求","url"=>$url);
            return $this->render($response, 'ssrf.phtml', $data);
        } else {
            $data = array('ec' => 200, 'url' => $url, "error" => "内部地址，禁止请求","url"=>$url);
            return $this->render($response, 'ssrf.phtml', $data);
        }
    }
}