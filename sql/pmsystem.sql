-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:8889
-- 生成日期： 2019-09-12 18:03:54
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
(1, 'admin', '015173fd9b341b1618f277f95b91dce1', 'sqlat', '小A', 1567342976, NULL, 1568279549, '0.0.0.0', NULL, '', 0);

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
(13, 0, '项目管理', 1, '项目管理', 'fa-tasks', 0, '/project', '2019-09-12 08:50:26', '2019-09-12 09:00:30', -1, 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `pms_project`
--

CREATE TABLE `pms_project` (
  `id` int(11) NOT NULL COMMENT 'id',
  `number` varchar(10) NOT NULL COMMENT '项目编号',
  `name` varchar(50) NOT NULL COMMENT '项目名称',
  `start_time` timestamp NULL DEFAULT NULL COMMENT '开始时间',
  `end_time` timestamp NULL DEFAULT NULL COMMENT '结束时间',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '项目状态 0-未启动 1-进行中 2-已完成'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pms_project`
--

INSERT INTO `pms_project` (`id`, `number`, `name`, `start_time`, `end_time`, `status`) VALUES
(1, 'zxkf001', '在线客服', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `pms_project_version`
--

CREATE TABLE `pms_project_version` (
  `id` int(11) NOT NULL COMMENT 'id',
  `number` varchar(20) NOT NULL COMMENT '版本编号',
  `start_time` timestamp NOT NULL COMMENT '开始时间',
  `end_time` timestamp NOT NULL COMMENT '结束时间',
  `version` varchar(10) NOT NULL COMMENT '版本号',
  `project_number` varchar(10) NOT NULL COMMENT '项目编号',
  `force_update` int(11) NOT NULL DEFAULT '0' COMMENT '是否强制更新 0-否 1-是',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '版本状态 0-未开始 1-编码 2-测试 3-发布'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- 表的索引 `pms_project`
--
ALTER TABLE `pms_project`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- 表的索引 `pms_project_version`
--
ALTER TABLE `pms_project_version`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_number` (`project_number`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `pms_project`
--
ALTER TABLE `pms_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `pms_project_version`
--
ALTER TABLE `pms_project_version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';

--
-- 限制导出的表
--

--
-- 限制表 `pms_project_version`
--
ALTER TABLE `pms_project_version`
  ADD CONSTRAINT `project_number` FOREIGN KEY (`project_number`) REFERENCES `pms_project` (`number`);
