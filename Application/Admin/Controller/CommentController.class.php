<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class CommentController extends CommonController {
    /**
     * 未审批
     */
    public function approvaling(){
        $db = M('Comment');
        $app = M('ApplianceInfo');
        $user = M('User_info');
        $result = $db->where('c_state=0')->select();
        //var_dump($result);die;
        $length = count($result);
        for($i = 0;$i < $length;$i++){
            $u_id = $result[$i]['u_id'];
            $username = $user->field('u_name')->where("u_id=$u_id")->find();
            $a_id = $result[$i]['a_id'];
            $appInfo = $app->field('a_num,a_name')->where("a_id=$a_id")->find();
            $result[$i]['u_id'] = $username['u_name'];
            $result[$i]['a_id'] = $appInfo['a_num'];
            $result[$i]['a_name'] = $appInfo['a_name'];
        }
        $this->assign('approvalingData',$result);
        $this->display();
    }
    /**
     * 已审批的
     */
    public function approvaled(){
        $db = M('Comment');
        $app = M('ApplianceInfo');
        $user = M('User_info');
        $result = $db->where('c_state!=0')->select();
        $length = count($result);
        for($i = 0;$i < $length;$i++){
            $u_id = $result[$i]['u_id'];
            $username = $user->field('u_name')->where("u_id=$u_id")->find();
            $a_id = $result[$i]['a_id'];
            $appInfo = $app->field('a_num,a_name')->where("a_id=$a_id")->find();
            $result[$i]['u_id'] = $username['u_name'];
            $result[$i]['a_id'] = $appInfo['a_num'];
            $result[$i]['a_name'] = $appInfo['a_name'];
        }
        $this->assign('approvaledData',$result);
        $this->display();
    }
    /**
     * 评论审批
     */
    public function approval(){
        $c_id = $_GET['c_id'];
        $data['c_state'] = $_GET['c_state'];
        $db = M('Comment');
        $result = $db->where("c_id = $c_id")->save($data);
        if($result){
            $this->Redirect('approvaling');
        }else{

        }
    }
}