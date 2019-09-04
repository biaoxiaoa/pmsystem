<?php
namespace app\login\model;
use app\common\model\Base;
class Admin extends Base{
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $type = [
        'logintime'  =>  'timestamp',
    ];
    /**
     * 根据用户名查询管理员信息
     */
    static public function adminWithUserName($userName)
    {
        $model = Admin::where('username',$userName)->find();
        return $model;
    }
}