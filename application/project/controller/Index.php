<?php
namespace app\project\controller;
use app\common\controller\AuthBase;
/**
 * 
 */
class Index extends AuthBase
{
    public function index()
    {
        return $this->fetch('project');
    }
    public function add()
    {
        return $this->fetch('project_add');
    }
}
