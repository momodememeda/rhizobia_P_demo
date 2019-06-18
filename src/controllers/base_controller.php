<?php
/**
 * Created by PhpStorm.
 * User: momo
 * Date: 2019/4/18
 * Time: 下午3:02
 */

namespace Controllers;

use Security\SecurityUtil;
use Slim\Views\PhpRenderer;
class base_controller extends PhpRenderer
{


    protected $securityutil;


    public function __construct()
    {
        parent::__construct(dirname(dirname(dirname(__FILE__))).'/templates/');
        $this->init();
    }

    private function init()
    {
        $this->securityutil = SecurityUtil::getInstance();
    }
}