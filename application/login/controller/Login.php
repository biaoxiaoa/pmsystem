<?php
namespace app\login\controller;
use think\Controller;
use think\captcha\Captcha;
use Behavior\LoginBehavior;
use think\Request;
class Login extends Controller
{
    public function index()
    {
        return $this->fetch('login');
    }

    /**
     * 验证码
     */
    public function Captcha()
    {
        $config =    [
            // 验证码字体大小
            'fontSize'    =>    30,    
            // 验证码位数
            'length'      =>    5,   
            // 关闭验证码杂点
            'useNoise'    =>    false,
            'codeSet' =>'1234567890',
            'useCurve'=>false, 

        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }

    /**
     * 登陆
     */
    public function submit_login()
    {
        $info = input('post.');
        $request = new Request();
        $Ip= $request->ip(0,false);
        $info['loginip']=$Ip;
        return LoginBehavior::login_check($info);
    }
    
}
