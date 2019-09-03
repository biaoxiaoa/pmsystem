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
}