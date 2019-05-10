<?php
/**
 * Created by PhpStorm.
 * User: momo
 * Date: 2019/4/18
 * Time: 下午2:53
 */

namespace Controllers;

class index_controller extends base_controller
{

    public function index($request, $response)
    {
        return $this->render($response, 'index.phtml');

    }

}