<?php
namespace app\login\controller;
use think\Controller;
class Login extends Controller
{
    public function index()
    {
        return $this->fetch('login');
    }
}
