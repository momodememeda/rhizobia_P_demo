<?php
/**
 * Created by PhpStorm.
 * User: momo
 * Date: 2019/4/18
 * Time: 下午6:36
 */

namespace Controllers\xss;


use Controllers\base_controller;

class xss_controller extends base_controller
{
    public function method($request, $response, $method)
    {
        $method = $method['method'];
        $this->$method($request,$response);
    }

    public function index($request,$response)
    {
        $uuid = $request->getParam('uuid');
        $uuid = $this->securityutil->encodeForHTML($uuid);
        return $response->getBody()->write($uuid);
    }

    public function index2($request,$response)
    {
        $uuid = $request->getParam('uuid');
        $uuid = $this->securityutil->encodeForHTML($uuid);
        return $response->getBody()->write($uuid);
    }


    public function index3($request,$response)
    {
        $uuid = $request->getParam('uuid');
        $uuid = $this->securityutil->encodeForJavaScript(($uuid));
        echo "<script> var a='" . $uuid . "'</script>";
        echo "<script> var a='" . $uuid . "'</script>";
    }

    public function index4($request,$response)
    {
        $uuid = $request->getParam('uuid');
        $uuid = $this->securityutil->encodeForHTML($uuid);
        echo "<html>
                <head>
                </head>
                <body>
                        " . $uuid . "
                </body>
              </html>";
    }

    public function index5($request,$response)
    {
        $uuid = $request->getParam('uuid');
        $uuid = $this->securityutil->encodeForHTML(($uuid));
        echo "<html>
                <head>
                </head>
                <body>
                    <input value='" . $uuid . "' id='name'>;
                   
                </body>
              </html>";
    }

    public function index6($request,$response)
    {
        $uuid = $request->getParam('uuid');
        $uuid = $this->securityutil->purifier($uuid);
        return $response->getBody()->write($uuid);
    }
}