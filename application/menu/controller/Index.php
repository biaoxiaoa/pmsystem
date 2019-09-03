<?php
namespace app\menu\controller;
use app\common\controller\AuthBase;
use Behavior\MenuBehavior;
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
    /**
     * 提交菜单添加
     */
    public function submit_menu_add()
    {
        $info = input('post.');
        return MenuBehavior::menu_add($info);
    }
}
