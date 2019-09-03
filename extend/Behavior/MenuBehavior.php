<?php
namespace Behavior;
use app\menu\model\Menu as MenuModel;
use app\menu\validate\Menu as MenuValidate;
use Service\JsonService;
class MenuBehavior{
    /**
     * 新增菜单
     */
    static public function menu_add($info)
    {
        if($info['parment_id']!=0){
            $menu = MenuModel::menuWithID($info['parment_id']);
            if(empty($menu)){
                return JsonService::errorResponse('根菜单不存在，请重新选择');
            }
        }
        $menu = MenuModel::menuWithName($info['name']);
        if(!empty($menu)){
            return JsonService::errorResponse('菜单名称已存在');
        }
        if(!isset($info['deskshow'])){
            $info['title'] = $info['name'];
        }else{
            if($info['deskshow']=='on'){
                $info['deskshow']=1;
            }else{
                $info['deskshow']=0;
            }
        }
        if(empty($info['pageURL'])){
            $pageURL = "\index.php".'\\'.$info['module'].'\\'.$info['controller'].'\\'.$info['action'];
            $pageURL = str_replace('\\','/',$pageURL);
            $info['pageURL'] = $pageURL;
        }      
        $res = MenuModel::add($info);

        if($res==true){
            return JsonService::successResponse('菜单增加成功');
        }else{
            return JsonService::errorResponse('菜单增加失败');
        }
    }
    /**
     * 获取桌面菜单
     */
    static public function menu_desk()
    {
        
        return JsonService::returnData(1,'成功',MenuModel::deskMenu());
    }
    /**
     * 所有菜单
     */
    static public function menu()
    {
        return MenuModel::menu();
    }
}