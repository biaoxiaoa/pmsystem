<?php
namespace app\menu\controller;
use app\menu\model\Menu as MenuModel;
use app\common\controller\AuthBase;
use Behavior\MenuBehavior;
use think\Controller;
use think\Session;
class Index extends Controller
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
    public function menu_delete()
    {
        $ids = input('post.ids');
        return MenuBehavior::menu_delete($ids);
    }
    /**
     * 编辑菜单
     */
    public function menu_edit()
    {
        $id = input('get.id');
        if (empty($id)) {
            return "菜单ID参数错误，无法编辑菜单";
        }
        $menu = MenuModel::menuWithID($id);
        if(empty($menu)){
            return "无法获取菜单信息";
        }
        $session = new Session();
        $session->set('old_name',$menu['name']);
        $this->assign('menu',$menu);
        return $this->fetch('menu_edit2');
    }
    /**
     * 提交菜单编辑
     */
    public function submit_menu_edit()
    {
        $info = input('post.');
        $session = new Session();
        $info['old_name']=$session->get('old_name');
        return MenuBehavior::menu_edit($info);
    }

    /**
     * 桌面菜单
     */
    public function menu_desk()
    {
        return MenuBehavior::menu_desk();
    }
    /**
     * 分页显示所有菜单
     */
    public function menu_list()
    {
        
        $limit = input('get.limit');
        $page = input('get.page');
        return json(MenuBehavior::menu_list($page,$limit));
    }
    /**
     * 所有菜单
     */
    public function menu_all(){
        return MenuBehavior::menu_all();
    }
}
