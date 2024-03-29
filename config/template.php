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

// +----------------------------------------------------------------------
// | 模板设置
// +----------------------------------------------------------------------

return [
    // 模板引擎类型 支持 php think 支持扩展
    'type'         => 'Think',
    // 默认模板渲染规则 1 解析为小写+下划线 2 全部转换小写 3 保持操作方法
    'auto_rule'    => 1,
    // 模板路径
    'view_path'    => '',
    // 模板后缀
    'view_suffix'  => 'html',
    // 模板文件名分隔符
    'view_depr'    => DIRECTORY_SEPARATOR,
    // 模板引擎普通标签开始标记
    'tpl_begin'    => '{',
    // 模板引擎普通标签结束标记
    'tpl_end'      => '}',
    // 标签库标签开始标记
    'taglib_begin' => '{',
    // 标签库标签结束标记
    'taglib_end'   => '}',
    'tpl_replace_string' => [
        'jquery_js' => '/static/lib/jquery/jquery.min.js',
        'layui_js'  => '/static/lib/layui/layui.js',
        'layui_css' => '/static/lib/layui/css/layui.css',
        'animate_css' => '/static/lib/layui/extend/winui/lib/animate/animate.min.css',
        'font-awesome_css' => '/static/lib/layui/extend/winui/lib/font-awesome-4.7.0/css/font-awesome.min.css',
        'winui_css' => '/static/lib/layui/extend/winui/css/winui.css',
        'font_css'  => '/static/lib/layui/font/font.css',
        'main_js'  => '/static/js/main.js',

        'login_js' => '/static/js/login.js',
        /**
         * menu
        */
        'menu_js'  => '/static/js/menu/menu.js',
        'menu_add_js'  => '/static/js/menu/menu_add.js',
        'menu_edit_js'  => '/static/js/menu/menu_edit.js',
        /**
         * project
        */
        'project_js'  => '/static/js/project/project.js',
        'project_add_js'  => '/static/js/project/project_add.js',
        'project_edit_js'  => '/static/js/project/project_edit.js',
    ]
];
