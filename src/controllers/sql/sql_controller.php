<?php
/**
 * Created by PhpStorm.
 * User: momo
 * Date: 2019/4/18
 * Time: 下午3:12
 */

namespace Controllers\sql;


use Controllers\base_controller;
use Security\SQLSecurity\Mysql;

class sql_controller extends base_controller
{
    private $db;

    public function __construct()
    {
        $dbconf = array(
            'hostname' => '127.0.0.1',
            'port' => 3306,
            'database' => 'oversold',
            'charset' => 'utf8',
            'username' => 'root',
            'password' => 'toor',
        );

        $this->db = Mysql::getInstance()->initdb($dbconf);
    }

    public function method($request, $response, $method)
    {
        $method = $method['method'];
        $this->$method($request, $response);
    }

    public function index($request, $response)
    {
        $this->db->beginTransaction();

        $result = $this->db->select()->from('oversold')->orderby('id')->execute()->fetchAll();
        if (isset($result)) {

            foreach ($result as $value) {
                echo "<pre>";
                echo $value['id'] . "\t", $value['name'], "\t" . $value['email'];
                echo "<br />";
                echo "</pre>";
            }
            $this->db->commit();
        }
    }

    public function search($request, $response)
    {
        $id = $request->getParam('id');
        $result = $this->db->select()->from('oversold')->where('id', '=', $id)->execute()->fetchAll();
        if (isset($result)) {
            foreach ($result as $value) {
                echo "<pre>";
                echo $value['id'] . "\t", $value['name'], "\t" . $value['email'];
                echo "<br />";
                echo "<pre>";
            }
        }
    }

    public function del($request, $response)
    {
        $id = $request->getParam('id');
        $stmt = $this->db->delete()->from('oversold')->where('id', '=', $id)->execute();
        return $response->getBody()->write($stmt);
    }

    public function update($request, $response)
    {
        $name = $request->getParam('name');
        $id = $request->getParam('id');
        $stmt = $this->db->update(array('name' => $name))->table('oversold')->where('id', '=', $id)->execute();
        return $response->getBody()->write($stmt);
    }


    public function insert($request, $response)
    {
        $name = $id = $request->getParam('name');
        $email = $id = $request->getParam('email');
        $stmt = $this->db->insert(array('name', 'email'))->into('oversold')->values(array($name, $email))->execute();
        return $response->getBody()->write($stmt);
    }
}