<?php
namespace app\menu\validate;
use think\Validate;
class Menu extends Validate{
    protected $rule = [
        //汉字、字母、数字
        'name' => 'require|length:1,10|chsAlphaNum',
        'title' => 'length:1,10|chsAlphaNum',
        //字母和数字 —— _
        'icon' => 'require|length:1,40|alphaDash',
        'module' => 'length:0,20|alphaDash',
        'controller' => 'length:0,40|alphaDash',
        'action' => 'length:0,40|alphaDash',
        'pageURL' => 'length:0,100',
    ];
    protected $message  = [
        'name.require'=>'请输入菜单名称',
        'name.length'=>'菜单名称为1-10个字符',
        'name.chsAlphaNum'=>'菜单名称不能包含特殊字符',
        'title.length'=>'窗口名称为1-10个字符',
        'title.chsAlphaNum'=>'窗口名称不能包含特殊字符',
        'icon.require'=>'请输入图标名称',
        'icon.length'=>'图标名称为1-40个字符',
        'icon.alphaDash'=>'图标名称不能包含特殊字符',
        'module.length'=>'模块名称不能超过20个字符',
        'module.alphaDash'=>'模块名称不能包含特殊字符',
        'controller.length'=>'控制器名称不能超过40个字符',
        'controller.alphaDash'=>'模块名称不能包含特殊字符',
        'action.length'=>'方法名称不能超过40个字符',
        'action.alphaDash'=>'方法名称不能包含特殊字符',
        'pageURL.length'=>'路由地址不能超过100个字符',
    ];
}