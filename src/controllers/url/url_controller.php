<?php
/**
 * Created by PhpStorm.
 * User: momo
 * Date: 2019/4/18
 * Time: 下午3:13
 */

namespace Controllers\url;


use Controllers\base_controller;

class url_controller extends base_controller
{

    public function index($request, $response)
    {
        $domain = array('.protect.com');

        $url = $request->getParam('url');
        if ($this->securityutil->verifyRedirectUrl($url,$domain)) {
            return $response->withRedirect($url);
        } else {
            $data = array('ec' => 200, 'url' => $url, "info" => "url error");
            return $response->withJson($data);
        }
    }
}