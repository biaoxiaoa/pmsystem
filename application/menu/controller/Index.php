<?php
namespace app\menu\controller;
use app\common\controller\AuthBase;
class Index extends AuthBase
{
    /**
     * 菜单管理
     */
    public function index()
    {
        return $this->fetch('menu');
    }
    /**
     * 菜单添加界面
     */
    public function menu_add()
    {
        return $this->fetch('menu_add');
    }
}
