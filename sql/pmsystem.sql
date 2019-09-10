-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:8889
-- 生成日期： 2019-09-10 17:34:32
-- 服务器版本： 5.7.26
-- PHP 版本： 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 数据库： `pmsystem`
--

-- --------------------------------------------------------

--
-- 表的结构 `pms_admin`
--

CREATE TABLE `pms_admin` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `salt` varchar(5) NOT NULL COMMENT '密码盐',
  `nickname` varchar(20) DEFAULT NULL COMMENT '昵称',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `logintime` int(11) DEFAULT NULL COMMENT '登录时间',
  `loginip` varchar(100) DEFAULT NULL COMMENT '登录IP',
  `avatar` varchar(100) DEFAULT NULL COMMENT '头像',
  `token` varchar(60) NOT NULL COMMENT 'session标识',
  `status` int(30) NOT NULL DEFAULT '0' COMMENT '状态 0-正常 1-禁用'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pms_admin`
--

INSERT INTO `pms_admin` (`id`, `username`, `password`, `salt`, `nickname`, `addtime`, `updatetime`, `logintime`, `loginip`, `avatar`, `token`, `status`) VALUES
(1, 'admin', '015173fd9b341b1618f277f95b91dce1', 'sqlat', '小A', 1567342976, NULL, 1568098980, '0.0.0.0', NULL, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `pms_menu`
--

CREATE TABLE `pms_menu` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `parment_id` int(11) NOT NULL DEFAULT '0' COMMENT '父级菜单',
  `name` varchar(10) NOT NULL COMMENT '菜单名称',
  `deskshow` int(11) NOT NULL DEFAULT '0' COMMENT '是否在桌面显示 0-不显示 1-显示',
  `title` varchar(10) DEFAULT NULL COMMENT '窗口标题',
  `icon` varchar(40) DEFAULT NULL COMMENT '图标名称',
  `route` int(11) NOT NULL DEFAULT '0' COMMENT '是否开启路由 0-未开启（默认） 1-开启',
  `pageURL` varchar(100) NOT NULL COMMENT '页面地址',
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `updatetime` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `maxOpen` int(11) NOT NULL DEFAULT '-1' COMMENT '最大化方式',
  `openType` int(11) NOT NULL DEFAULT '2' COMMENT '打开方式',
  `extend` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pms_menu`
--

INSERT INTO `pms_menu` (`id`, `parment_id`, `name`, `deskshow`, `title`, `icon`, `route`, `pageURL`, `addtime`, `updatetime`, `maxOpen`, `openType`, `extend`) VALUES
(2, 0, '菜单管理', 1, '菜单管理', 'fa-list', 0, '/menu', NULL, NULL, -1, 2, 0),
(9, 0, '测试', 1, '测试', 'fa-rmb', 0, '/menu', '2019-09-10 08:18:02', '2019-09-10 08:18:02', -1, 2, 0);

--
-- 转储表的索引
--

--
-- 表的索引 `pms_admin`
--
ALTER TABLE `pms_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 表的索引 `pms_menu`
--
ALTER TABLE `pms_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `pms_admin`
--
ALTER TABLE `pms_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `pms_menu`
--
ALTER TABLE `pms_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=10;
