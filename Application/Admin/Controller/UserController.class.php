<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function index(){
        $db = M('User_info');
        $result = $db->select();
        $this->assign('userInfo',$result);
        $this->display();
    }
    public function edit(){
        if(IS_POST){
            $data = [
                'u_id' => $_POST['u_id'],
                'u_name' => $_POST['u_name'],
                'u_class' => $_POST['u_class'],
                'u_phone' => $_POST['u_phone'],
                'u_stuid' => $_POST['u_stuid']
            ];
            $db = M('User_info');
            $result = $db->add($data);
            if($result){
                $this->success('添加成功!',U('index'));
            }else{
                $this->error('失败');
            }
        }else{
            $u_id = $_GET['u_id'];
            $db = M('User_info');
            $result = $db->where("u_id=$u_id")->find();
            $this->assign('userInfo',$result);
            $this->display();
        } 
    }
    public function searchByName(){
        $u_name = $_POST['u_name'];

        $db = M('User_info');
        $result = $db->where("u_name=$u_name")->select();
        $this->assign('userInfo',$result);
        $this->display();
    }

}