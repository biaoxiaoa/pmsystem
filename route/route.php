<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

/***********登录相关**************/
//登录界面
Route::get('login', 'login/login/index');
//验证码
Route::get('coder', 'login/login/Captcha');
//登录校验
Route::rule('/submit_login','login/login/submit_login','POST');
/***********菜单相关**************/
//菜单管理界面
Route::get('menu', 'menu/Index/index');
//菜单添加界面
Route::get('menu_add', 'menu/Index/menu_add');
return [

];
