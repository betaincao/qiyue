<?php
namespace Home\Controller;
use Think\Controller;
/*
   权限控制，用于判断用户是否登录 
*/
    class CommonController extends Controller{
    	Public function _initialize(){     //前置操作
        // 初始化的时候检查用户权限
            if(!isset($_SESSION['username']) && $_SESSION['username']==''){
                $this->redirect('Login/login');
            }
        }
    }
?>