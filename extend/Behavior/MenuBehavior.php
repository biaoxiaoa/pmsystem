<?php
namespace Behavior;
use app\menu\model\Menu as MenuModel;
use app\menu\validate\Menu as MenuValidate;
use Service\JsonService;
use Service\TimeService as Time;
use Model\MenuPaginator;
class MenuBehavior{
    /**
     * 新增菜单
     */
    static public function menu_add($info)
    {
        
        
        $validate = new MenuValidate();
        $checkRes = $validate->check($info);
        if(!$checkRes){
           return JsonService::errorResponse($validate->getError());
        }
        if(!isset($info['parment_id'])){
            return JsonService::errorResponse('请选择根菜单');
        }else{
            if($info['parment_id']!=0){
                $menu = MenuModel::menuWithID($info['parment_id']);
                if(empty($menu)){
                    return JsonService::errorResponse('根菜单不存在，请重新选择');
                }
            }
        }
        $menu = MenuModel::menuWithName($info['name']);
        if(!empty($menu)){
            return JsonService::errorResponse('菜单名称已存在');
        }

        $info = MenuBehavior::menu_info($info);
        if(isset($info['code'])){
            return JsonService::errorResponse($info['msg']);
        }
        $res = MenuModel::add($info);

        if($res==true){
            return JsonService::successResponse('菜单增加成功');
        }else{
            return JsonService::errorResponse('菜单增加失败');
        }
    }
    /**
     * 处理输入的菜单信息
     */
    static public function menu_info($info)
    {
        if(!isset($info['deskshow'])){
            $info['title'] = $info['name'];
            $info['deskshow']=0;
        }else{
            if($info['deskshow']=='on'){
                $info['deskshow']=1;
            }else{
                $info['deskshow']=0;
            }
        }

        if(!isset($info['pageURL'])){
            if(!isset($info['module']) || !isset($info['controller']) || !isset($info['action'])){
                $info['code'] = 2004;
                $info['msg'] = '请填写路由地址或完整页面地址';
            }else{
                $pageURL = "\index.php".'\\'.$info['module'].'\\'.$info['controller'].'\\'.$info['action'];
                $pageURL = str_replace('\\','/',$pageURL);
                $info['pageURL'] = $pageURL;
            }
        }else{
            if(empty($info['pageURL'])){
                if(!isset($info['module']) || !isset($info['controller']) || !isset($info['action'])){
                    $info['code'] = 2004;
                    $info['msg'] = '请填写完整页面地址';
                }
            }
        }
        /*
        if(empty($info['pageURL'])){
            $pageURL = "\index.php".'\\'.$info['module'].'\\'.$info['controller'].'\\'.$info['action'];
            $pageURL = str_replace('\\','/',$pageURL);
            $info['pageURL'] = $pageURL;
        }*/
        $info['addtime']=Time::getNowTime(0);
        $info['updatetime']=Time::getNowTime(0);    
        return $info;
    }




    /**
     * 获取桌面菜单
     */
    static public function menu_desk()
    {
        
        return JsonService::returnData(1,'成功',MenuModel::deskMenu());
    }
    /**
     * 菜单列表 
     * 不传入page、limit参数时，获取全部菜单
     */
    static public function menu_list($page,$limit)
    {
        $data = array();
        if($limit>1){
            $data = MenuModel::menu_list(($limit+1) *($page-1),$limit);
        }else if($limit==1){
            $data = MenuModel::menu_list($limit *($page-1),$limit);
        }
        $back['code']=0;
        $back['count'] = MenuModel::menuCount();
        $back['data']=$data;
        return $back;
    }
    static public function menu_all()
    {
        $data = MenuModel::menu_list(null,null);
        return $data;
    }
}