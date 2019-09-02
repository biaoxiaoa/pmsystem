<?php
namespace app\common\controller;
use think\Session;
use think\Controller;
use Behavior\LoginBehavior;
class AuthBase extends Controller
{
    protected $beforeActionList = [
        'login_status',
    ];
    public function login_status()
    {
        if(LoginBehavior::hasActiveUser() == false){
            return $this->error('请您先登录...','/login');
            exit;
        }
    }
}
