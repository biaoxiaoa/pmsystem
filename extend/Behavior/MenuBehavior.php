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
            return JsonService::errorResponse('菜单增加失败');
        }else{
            return JsonService::successResponse('菜单增加成功');
        }
        
        // return JsonService::returnData(2000,'已收到请求',$info);
    }
}