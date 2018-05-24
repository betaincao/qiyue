<?php
namespace Admin\Controller;
use Think\Controller;
class LabInfoController extends CommonController {
    public function index(){
        $db = M('Laboratory');
        $labInfo = $db->select();
        //var_dump($labInfo);die;
        $this->assign('labInfo',$labInfo);
        $this->display();
    }
    /**
     * 新增实验室
     */
    public function add(){
        if(IS_POST){
            
            $data = [
                'l_name' => $_POST['l_name'],
                'l_appsum' => 0
            ];
            $db = M('Laboratory');
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
    public function edit(){
        $id = $_GET['l_id'];
        //echo $id;die;
        $db = M('Laboratory');
        $labInfo = $db->where("l_id=$id")->find();
        //var_dump($labInfo);die;
        $this->assign('labInfo',$labInfo);

        $this->display();
    }
    public function edit_action(){
        $id = $_POST['l_id'];
        $db = M('Laboratory');
        $db->l_name = $_POST['l_name'];        
        $labInfo = $db->where("l_id=$id")->save();
        if($labInfo){
            $this->success('更新成功!',U('index'));
        }else{
            $this->error('失败');
        }  
    }
    public function delete(){
        $id = $_GET['l_id'];
        $db = M('Laboratory');
        $labInfo = $db->where("l_id=$id")->delete();
        if($labInfo){
            $this->success('成功!');
            $db1 = M('ApplianceInfo');
            $labInfo = $db1->where("l_id=$id")->delete();
        }else{
            $this->error('失败');
        }
    }
}