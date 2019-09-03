<?php
namespace app\menu\model;
use app\common\model\Base;
class Menu extends Base{
    /**
     * 新增菜单
     */
    static public function add($info)
    {
        $model = new Menu();
        
        return $model->save($info);;
    }
    /**
     * 桌面菜单
     */
    static public function deskMenu()
    {
        return Menu::where('deskshow',1)->select();
    }
    /**
     * 所有菜单
     */
    static public function menu()
    {
        $model = new Menu();
        return $model->select();
    }
    /**
     * 根据ID查询菜单
     */
    static public function menuWithID($id)
    {
        return Menu::where('id',$id)->find();
    }
    /**
     * 根据菜单名称查询菜单
     */
    static public function menuWithName($name)
    {
        return Menu::where('name',$name)->find();
    }
}