<?php
namespace app\login\validate;
use think\Validate;
class Admin extends Validate{
    protected $scene = [
        'login'=>['username','password','checkcode'],
    ];
    protected $rule = [
        'username'=>'require|length:5,20|alphaNum',//字母和数字
        'password'=>'require|length:5,20',
        'salt'=>'require|length:5|alphaNum',
        'nickname'=>'length:20|chsAlphaNum',//汉字、字母、数字
        'addtime'=>'number',
        'updatetime'=>'number',
        'logintime'=>'number',
        'loginip'=>'ip',
        'avatar'=>'length:100',
        'token'=>'alphaNum|length:60',
        'status'=>'number',
        'checkcode' => 'require|number|length:5|captcha', 
    ];
    protected $message  =   [
        'username.require' => '请输入用户名',
        'username.length' => '用户名5-20个字符',
        'username.alphaNum' => '用户名不能包含特殊字符和中文',
        'password.require' => '请输入密码',
        'password.length' => '密码5-20个字符',
        'salt.require' => '请输入密码盐',
        'salt.length' => '密码盐不能超过20个字符',
        'salt.alphaNum' => '密码盐不能包含特殊字符和中文',
        'nickname.length' => '昵称不能超过20个字符',
        'nickname.chsAlphaNum' => '昵称不能包含特殊字符',
        'loginip.ip' => '请输入合法的IP地址',
        'avatar.length' => '头像文件名过长',
        'token.length' => 'token长度错误',
        'token.alphaNum' => 'token不能包含特殊字符和中文',
        'checkcode.captcha' => '验证码错误',
        'checkcode.require' => '请输入验证码',
        'checkcode.number' => '验证码只能为数字',
        'checkcode.length' => '验证码不能超过5个字符',
    ];
}