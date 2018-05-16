<?php

namespace Home\Controller;
use Think\Controller;
header('Content-type:text/html;charset=utf-8');
class UserController extends  CommonController{    
    //用户信息展示
	public function ShowUserInfo(){
        $dataUserInfo['u_id'] = $_SESSION['id']; 
	    //$dataUserInfo['u_id'] = 1;
        $db_UserInfo = M('UserInfo');
        $result_userInfo = $db_UserInfo->where($dataUserInfo)->getField('u_id,u_name,u_class,u_phone,u_stuid');
        $this->assign('UserInfo',$result_userInfo);
        $this->display();   
    }
}

