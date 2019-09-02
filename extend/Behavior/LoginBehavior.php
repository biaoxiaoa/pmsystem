<?php
namespace Behavior;
use think\Session;
use Service\JsonService;
use app\login\model\Admin as AdminModel;
use app\login\validate\Admin as AdminValidate;
use Service\TimeService as Time;
class LoginBehavior{
    static public function login_check($info)
    {
        $validate = new AdminValidate();
        $res = $validate->scene('login')->check($info);
        if(!$res){
            return JsonService::errorResponse($validate->getError());
        }
        $model = AdminModel::adminWithUserName($info['username']);
        if(empty($model)){
            return JsonService::errorResponse('该用户不存在');
        }
        if($model['status']!=0){
            return JsonService::errorResponse('账户已禁用');
            exit();
        }
        $pwd = md5($info['password'].$model['salt']);
        if($model['password']!=$pwd){
            return JsonService::errorResponse('密码输入错误');
        }
        $model->logintime = Time::getNowTime(0);
        $model->loginip = $info['loginip'];
        $res = $model->save();
        $session = new Session();
        $session->set('userId',$model->id);
        $session->set('userInfo',$model);

        return JsonService::successResponse('登录成功');
    }
    /**
     * 是否登录
     */
    static public function hasActiveUser()
    {
        $session = new Session();
        
        return $session->has('userId') && $session->has('userInfo');
    }
}