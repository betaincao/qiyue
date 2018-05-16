<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");

class CommentController extends CommonController{
    public function index(){

    }
    
    //写评论
    public function WriteComment(){
        $db_comment = M('Comment');
        $db_orderform = M('OrderForm');
        $data_orderform['o_id'] = $_POST['oid'];
        $data_save['o_comment'] = 0;
        $data['c_comment'] = $_POST['comment'];
        $data['a_id'] = $_POST['aid'];
        $data['u_id'] = $_SESSION['id'];
        $data['c_time'] = time();  
        $result = $db_comment->data($data)->add();
        if(empty($result)){
            echo 0;
        }else{
            $result_orderform = $db_orderform->where($data_orderform)->save($data_save);
            if(empty($result_orderform)){
                echo 0;
            }else{
                echo 1;
            }
        }
        exit;
    }
    
    //用户查看自己评论
    public function UserComment(){
    	$db_comment = M('Comment');
        $data['u_id'] = $_SESSION['id'];
        $result = $db_comment->where($data)->order('c_time desc')->getField('a_id,c_comment,c_state,c_time');
        $db_appliance = M('ApplianceInfo');
        
        $arr = $db_appliance->where($Appdata)->getField('a_photo,a_name');
        foreach ($result as $key => $value) {
       		$Appdata['a_id'] = $value['a_id'];
   			$Appinfo = $db_appliance->where($Appdata)->getField('a_id,a_num,a_name,a_photo',1);
   			$result[$key]['a_num']   = $Appinfo[$value['a_id']]['a_num'];
            $result[$key]['a_name']  = $Appinfo[$value['a_id']]['a_name'];
            $result[$key]['a_photo'] = $Appinfo[$value['a_id']]['a_photo'];
        }
        $this->assign('Comment',$result);
        $this->display();
    }
    
    //仪器评论
    public function ApplianceComment($a_id){
        $db_comment = M('Comment');
        //联调注释
        //$a_id = 1;
        $dataComment['a_id'] = $a_id;
        $dataComment['c_state'] = 1;  //审核通过
        $result_comment = $db_comment->where($dataComment)->order('c_time desc')->getField('u_id,c_comment,c_time');
        $db_user = M('UserInfo');
        foreach ($result_comment as $key => $value) {
            $dataUser['u_id'] = $value['u_id'];
            $result_user = $db_user->where($dataUser)->getField('u_name');
            $result_comment[$key]['u_name'] = $result_user;  
        }
        return $result_comment;
    }
}