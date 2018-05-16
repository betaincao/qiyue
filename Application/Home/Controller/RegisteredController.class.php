<?php

namespace Home\Controller;
use Think\Controller;
/*
   @功能:注册模块的实现
   @修改时间:2016-09-21
   @修改人员:koocookie
*/


class RegisteredController extends Controller{
	//进入注册页面
	public function Registered(){
		$this->display();
	}

	//检测账号是否被注册
	public function checkName(){
        //echo header("Access-Control-Allow-Origin:*");    //解决跨域问题
		$username=$_GET['username'];
    	$db = M('UserLogin');
    	// $where['u_phone']=$username;
		// $where['u_state'] = 1;
		$result=$db->where("u_phone=$username AND u_state=1")->find();	 
    	if($result){
    	   $data['status']=1;
    	   $this->ajaxReturn($data);
        }else{
           $data['status']=0;
    	   $this->ajaxReturn($data);
        }
    }
    
    //完善用户信息
    public function UserInfo(){
        $db_login = M('UserLogin');
        $username = $_POST['phone'];
        $data_login['u_phone'] = $username;
        $userpasswd = $_POST['password'];
		$data_login['u_passwd'] = md5($userpasswd);
		$data_login['u_state'] = 0;
		// var_dump($data_login);die;
        $result_login = $db_login->data($data_login)->add();
        if(empty($result_login)){
       		$this->display('Index:error');
        }else{
        	$this->assign('id',$result_login);
        	$this->display();
        }
    }   

    //注册成功将数据保存数据库
	public function RegSuccess(){
		$db_userinfo = M('UserInfo');
	    $db_login = M('UserLogin');
	    $data_userinfo['u_id'] = $_GET['id'];
	    $data_userinfo['u_name'] = $_POST['name'];
	    $data_userinfo['u_class'] = $_POST['class'];
	    $data_userinfo['u_stuid'] = $_POST['studentid'];
	    $data_userinfo['u_phone'] = $_POST['phone'];
	    $result_user = $db_userinfo->data($data_userinfo)->add();
	    if(!empty($result_user)){
	    	$data['u_id'] = $data_userinfo['u_id'];
	    	$data_login['u_state'] = 1; 
			$result_login = $db_login->where($data)->save($data_login);
			$this->display('Index/index');
	    	if(empty($result_login)){
	    		$this->display('Index:error');
	    		echo $result_login;
	    	}
	    }else{
	    	$this->display('Index:error');
	    }
	}
}







