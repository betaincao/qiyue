<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController {
    public function index(){
        $db = M('OrderForm');
        $app = M('ApplianceInfo');
        $user = M('User_info');
        $result = $db->order('o_id desc')->select();
        //var_dump($orderForm);die;
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
        //var_dump($result);die;
        $this->assign('orderForm',$result);
        $this->display();
    }
    /**
     * 待审批
     */
    public function approvaling(){
        $db = M('OrderForm');
        $app = M('ApplianceInfo');
        $user = M('User_info');
        $result = $db->where('o_state=2')->select();
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
     * 已审批
     */
    public function approvaled(){
        $db = M('OrderForm');
        $app = M('ApplianceInfo');
        $user = M('User_info');
        $result = $db->where('o_state!=2')->select();
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
        $this->assign('approvaledData',$result);
        $this->display();
    }
    /**
     * 审批动作
     */
    public function approval(){
        $o_id = $_GET['o_id'];
        $data['o_state'] = $_GET['o_state'];
        $db = M('OrderForm');
        $result = $db->where("o_id = $o_id")->save($data);
        $data1 = $db->field('a_id')->where("o_id = $o_id")->find();
        if($data['o_state']==1){
            $Model = new \Think\Model();
            $sql = "update `think_appliance_info` set `a_add`=`a_add`+1 where `a_id` =" . $data1['a_id'];
            $res = $Model->execute($sql);
        }
        if($result){
            $this->Redirect('approvaling');
        }else{

        }
    }
}