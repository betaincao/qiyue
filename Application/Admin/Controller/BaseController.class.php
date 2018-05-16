<?php
namespace app\manage\controller;
use think\Controller;
class BaseController extends Controller
{
    public function _initialize()
    {
        if(!session('a_id')){
             $this->error('请先登录系统！',url('Home/Index/index'));
        }
    }
}
