<?php
namespace app\index\controller;
use app\common\controller\AuthBase;
class Index extends AuthBase
{
    public function index()
    {
        return $this->fetch('index');
        // return $this->error('请登录后','/login');
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
