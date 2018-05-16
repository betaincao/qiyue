<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class AppInfoController extends CommonController {
    public function index(){
        $id = $_GET['l_id'];
        $db = M('ApplianceInfo');
        $applianceInfo = $db->where("l_id=$id")->select();
        //var_dump($applianceInfo);die;
        $this->assign('l_id',$id);
        $this->assign('applianceInfo',$applianceInfo);
        $this->display();
    }
    public function detail(){
        $id = $_GET['a_id'];
        $db = M('ApplianceInfo');
        $applianceInfo = $db->where("a_id=$id")->find();
        $this->assign('applianceInfo',$applianceInfo);
        $this->display();
    }


    //新增仪器
    public function add(){  
        if(IS_POST){
            // $file = $_POST['a_photo'];
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     UP_LOAD.'public/Upload/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload();  
            
            

            $l_id = $_GET['l_id'];
            $data = [
                'a_num' => $_POST['a_num'],
                'a_name' => $_POST['a_name'],
                'l_id' => $l_id,
                'a_detail' => $_POST['a_detail'],
                'a_photo' => '',
                'a_state' => 1,
                'a_outtime' => time(),
                'a_add' => ''
            ];      
            $info['a_photo']['savepath']=substr($info['a_photo']['savepath'],0,10);
            $data['a_photo']=$info['a_photo']['savepath'].'\\'.$info['a_photo']['savename'];
            $db = M('ApplianceInfo');
            $result = $db->add($data);
            if($result){
                $Model = new \Think\Model();
                $sql = "update `think_laboratory` set `l_appsum`=`l_appsum`+1 where `l_id` = $l_id";
                $res = $Model->execute($sql);
                if($res){
                    $this->success('添加成功!',U('AppInfo/index',array('l_id'=>$l_id)));
                }     
            }else{
                $this->error('失败');
            }
        }else{
            $l_id = $_GET['l_id'];
            $this->assign('l_id',$l_id);
            $this->display();
        }
    }
    public function delete(){
        $id = $_GET['a_id'];
        $db = M('ApplianceInfo');
        $data = $db->field('l_id')->where("a_id = $id")->find();
        $result = $db->where("a_id=$id")->delete();
        if($result){
            $Model = new \Think\Model();
            $sql = "update `think_laboratory` set `l_appsum`=`l_appsum`-1 where `l_id` =" . $data['l_id'];
            $res = $Model->execute($sql);
            if($res){
                $this->success('删除成功!');
            }
            
        }else{
            $this->error('删除失败！');
        }
    }
    public function edit(){
        if(IS_POST){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     UP_LOAD.'public/Upload/'; // 设置附件上传根目录
            $upload->savePath  =     ''; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->upload();  
            $info['a_photo']['savepath']=substr($info['a_photo']['savepath'],0,10);
            

            $id = $_POST['a_id'];
            $l_id = $_POST['l_id'];
            $db = M('ApplianceInfo');
            $data = [
                'a_num' => $_POST['a_num'],
                'a_name' => $_POST['a_name'],
                'a_detail' => $_POST['a_detail'],
                //'a_photo' => $info['a_photo']['savepath'].'\\'.$info['a_photo']['savename']
            ];
            if($info['a_photo']['savepath']==FALSE){
                
            }else{
                $data['a_photo']=$info['a_photo']['savepath'].'\\'.$info['a_photo']['savename'];
            }
            $result = $db->where("a_id = $id")->save($data);
            if($result){
                $this->success('更新成功',U('index',array('l_id'=>$l_id)));
            }else{
                $this->error('失败');
            }  
        }else{
            $id = $_GET['a_id'];
            $db = M('ApplianceInfo');
            $applianceInfo = $db->where("a_id=$id")->find();
            $this->assign('applianceInfo',$applianceInfo);
            $this->display();
        }  
    }
}