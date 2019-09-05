<?php
namespace app\menu\model;
use app\common\model\Base;
class Menu extends Base{
    protected $dateFormat = 'Y-m-d H:m:s';
    protected $type = [
        'addtime'  =>  'timestamp',
        'updatetime'  =>  'timestamp',
    ];
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
     * 菜单
     * @limit 分页时每页多少条数据
     * limit&page为空时获取全部
     * limit 返回所有的菜单列表
     * page  加载第几页数据
     */
    static public function menu_list($page,$limit)
    {
        
        $model = new Menu();
        if(!isset($page)||!isset($limit)||$page==null||$lim==null){
            return $model->select()->order('id','desc');
        }else{
            return $model->limit($page,$limit)->select()->order('id','desc');
        }
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
    /**
     * 菜单数量
     */
    static public function menuCount()
    {   
        $model = new Menu();
        return count($model->select());
    }


    public function getDeskShowAttr($value)
    {
        $status = ['0'=>'隐藏','1'=>'显示'];
        return $status[$value];
    }
    
}