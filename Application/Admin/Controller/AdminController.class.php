<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class AdminController extends CommonController {
    public function index(){
        $db = M('Admin');
        $result = $db->select();
        $this->assign('adminInfo',$result);
        $this->display();
    }
    public function add(){
        session('admin_name','root');
        if(session('admin_name')=='root'){
            if(IS_POST){
                $data = [
                    'admin_name' => $_POST['admin_name'],
                    'password' => $_POST['password'],
                    'root' => $_POST['root'],
                ];
                $db = M('Admin');
                $result = $db->add($data);
                if($result){
                    $this->success('添加成功!',U('index'));
                }else{
                    $this->error('失败');
                }
            }else{
                $this->display();
            }
        }
    }
    public function approval(){

    }
}