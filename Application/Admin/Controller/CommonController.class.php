<?php
namespace Admin\Controller;
use Think\Controller;
/*
   权限控制，用于判断用户是否登录 
*/
    class CommonController extends Controller{
    	Public function _initialize(){     //前置操作
        // 初始化的时候检查用户权限
            if($_SESSION['username']==='Admin'){
            	//$this->redirect('Home/index');
            }
            else{
                $this->redirect('Home/Login/login');
            }
        }
    }
?>