<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type:text/html;charset=utf-8");

class OrderFormController extends CommonController{
    public function index(){
        $this->display();
    }
    
    //生成新的订单
    public function CreateOrderForm(){
        $db_order = M("OrderForm");
        $data['a_id'] = $_GET['a_id'];
        $data['u_id'] = $_SESSION['id'];
        $data['o_starttime'] = strtotime($_POST['starttime']);  //格式2018/5/3
        $data['o_stoptime'] = strtotime($_POST['stoptime']);
        //$data['o_starttime'] = intval($_POST['starttime']);
        //$data['o_stoptime'] = intval($_POST['stoptime']);
        $data['o_teacher'] = $_POST['teacher'];
        $data['o_state'] = 2;  //初始化订单状态信息为待审批
        $data['o_comment'] = 1;
        //Param: a_id(仪器id)、u_id(用户id)、o_start(起始时间)、o_stop(截止时间)、o_teacher(老师)。
        $db_appliance = M('ApplianceInfo');
        $dataApp['a_id'] = $data['a_id'];       
        $dataApp['a_outtime'] = array('lt', $data['o_starttime']);
        $resultApp = $db_appliance->where($dataApp)->getField('a_id');
        if(empty($resultApp)){
        	$this->error('预约时间已被占用,请重新选择时间!',U('Index/index'));
        }

        $result = $db_order->data($data)->add();
        if(!empty($result)){
            $this->redirect('Index/index');
        }else{
        	$this->redirect('Index/error');
        }
    }
    
    //用户查看所有的预约订单
    public function ViewOrderForm(){
        $this->display();
    }
   
    //   
    public function dateForm(){
        $a_id = $_GET['a_id'];
        $this->assign('a_id',$a_id);
        $this->display();
    }

    //Param:state GET 订单状态
    public function SelectOrderForm(){
    	$db_Order = M('OrderForm');
    	$data['u_id'] = $_SESSION['id'];
        $state = $_GET['state'];
    	$data['o_state'] = $state; 
        switch($state){
            //查询已完成订单 state=0
            case 0:
                $dataone['o_stoptime'] = array('lt',time());   //GT >  lt <
                $dataone['o_state'] = 1;
                //找出结束时间小于当前时间的1状态  
                $IdList = $db_Order->where($dataone)->getField('o_id');
                if($IdList){
                    $datasave['o_state'] = 0;
                    $datasave['o_id'] = array('in',$IdList);
                    //将上述找到的id置为0状态
                    $succe = $db_Order->save($datasave);
                }
                $result = array();
                $result = $db_Order->where($data)->order('o_starttime desc')->getField('o_id,a_id,o_starttime,o_stoptime,o_teacher,o_cause,o_comment');
                $db_appliance = M('ApplianceInfo');
                foreach ($result as $key => $value) {
                    $Appdata['a_id'] = $value['a_id'];
                    $Appname = $db_appliance->where($Appdata)->getField('a_name');
                    $result[$key]['a_name'] = $Appname;
                }
                if(is_array($result)){
                    $this->assign('OrderForm',$result);
                    $this->display('');
                }else{
                    $this->show('当前无订单');
                }
                break;

            //查询进行中的订单 state=1
            case 1:
                $dataone['o_stoptime'] = array('lt',time());   //GT >  lt <
                $dataone['o_state'] = 1;
                //找出结束时间小于当前时间的1状态  
                $IdList = $db_Order->where($dataone)->getField('o_id');
                if($IdList){
                    $datasave['o_state'] = 0;
                    $datasave['o_id'] = array('in',$IdList);
                    //将上述找到的id置为0状态
                    $succe = $db_Order->save($datasave);
                }
                $result = array();
                $result = $db_Order->where($data)->order('o_starttime desc')->getField('o_id,a_id,o_starttime,o_stoptime,o_teacher,o_cause,o_comment');
                $db_appliance = M('ApplianceInfo');
                foreach ($result as $key => $value) {
                    $Appdata['a_id'] = $value['a_id'];
                    $Appname = $db_appliance->where($Appdata)->getField('a_name');
                    $result[$key]['a_name'] = $Appname;
                }
                if(is_array($result)){
                    // $this->assign('OrderForm',$result);
                    // $this->display();
                    var_dump($result);
                }else{
                    $this->show('当前无订单');
                }
                break;

            //查询待审批订单 state=2    
            case 2:
                $dataone['o_starttime'] = array('lt',time());   //GT >  lt <
                $dataone['o_state'] = 2;
                //找出开始时间小于当前时间的2状态  
                $IdList = $db_Order->where($dataone)->getField('o_id');
                if($IdList){
                    $datasave['o_state'] = 3;
                    $datasave['o_id'] = array('in',$IdList);
                    //将上述找到的id置为0状态
                    $succe = $db_Order->save($datasave);
                }
                $result = array();
                $result = $db_Order->where($data)->order('o_starttime desc')->getField('o_id,a_id,o_starttime,o_stoptime,o_teacher,o_cause,o_comment');
                $db_appliance = M('ApplianceInfo');
                foreach ($result as $key => $value) {
                    $Appdata['a_id'] = $value['a_id'];
                    $Appname = $db_appliance->where($Appdata)->getField('a_name');
                    $result[$key]['a_name'] = $Appname;
                }
                if(is_array($result)){
                    $this->assign('OrderForm',$result);
                    $this->display();
                }else{
                    $this->show('当前无订单');
                }
                break;
            
            //查询未通过订单 state=3
             case 3:
                $dataone['o_starttime'] = array('lt',time());   //GT >  lt <
                $dataone['o_state'] = 2;
                //找出开始时间小于当前时间的2状态  
                $IdList = $db_Order->where($dataone)->getField('o_id');
                if($IdList){
                    $datasave['o_state'] = 3;
                    $datasave['o_id'] = array('in',$IdList);
                    //将上述找到的id置为0状态
                    $succe = $db_Order->save($datasave);
                }
                $result = array();
                $result = $db_Order->where($data)->order('o_starttime desc')->getField('o_id,a_id,o_starttime,o_stoptime,o_teacher,o_cause,o_comment');
                $db_appliance = M('ApplianceInfo');
                foreach ($result as $key => $value) {
                    $Appdata['a_id'] = $value['a_id'];
                    $Appname = $db_appliance->where($Appdata)->getField('a_name');
                    $result[$key]['a_name'] = $Appname;
                }
                if(is_array($result)){
                    // $this->assign('OrderForm',$result);
                    // $this->display();
                }else{
                    $this->show('当前无订单');
                }
                break;
        }
    }    


    //进行中的订单 1
    public function ViewOrderForm0(){
        $db_Order = M('OrderForm');
        $data['u_id'] = $_SESSION['id'];
        $state = $_GET['state'];
        $data['o_state'] = $state; 
       
                $dataone['o_stoptime'] = array('lt',time());   //GT >  lt <
                $dataone['o_state'] = 1;
                //找出结束时间小于当前时间的1状态  
                $IdList = $db_Order->where($dataone)->getField('o_id');
                if($IdList){
                    $datasave['o_state'] = 0;
                    $datasave['o_id'] = array('in',$IdList);
                    //将上述找到的id置为0状态
                    $succe = $db_Order->save($datasave);
                }
                $result = array();
                $result = $db_Order->where($data)->order('o_starttime desc')->getField('o_id,a_id,o_starttime,o_stoptime,o_teacher,o_cause,o_comment');
                $db_appliance = M('ApplianceInfo');
                foreach ($result as $key => $value) {
                    $Appdata['a_id'] = $value['a_id'];
                    $Appname = $db_appliance->where($Appdata)->getField('a_id,a_num,a_name');
                    $result[$key]['a_num'] = $Appname[$value['a_id']]['a_num'];
                    $result[$key]['a_name'] = $Appname[$value['a_id']]['a_name'];
                }
                if(is_array($result)){
                    $this->assign('OrderForm',$result);
                    $this->display();
                    //var_dump($result);
                }else{
                    $this->display('OrderForm:empty');
                }
              
    } 

    //已完成
    public function ViewOrderForm1(){
        $db_Order = M('OrderForm');
        $data['u_id'] = $_SESSION['id'];
        $state = $_GET['state'];
        $data['o_state'] = $state; 
       
            //查询已完成订单 state=0
          
                $dataone['o_stoptime'] = array('lt',time());   //GT >  lt <
                $dataone['o_state'] = 1;
                //找出结束时间小于当前时间的1状态  
                $IdList = $db_Order->where($dataone)->getField('o_id');
                if($IdList){
                    $datasave['o_state'] = 0;
                    $datasave['o_id'] = array('in',$IdList);
                    //将上述找到的id置为0状态
                    $succe = $db_Order->save($datasave);
                }
                $result = array();
                $result = $db_Order->where($data)->order('o_starttime desc')->getField('o_id,a_id,o_starttime,o_stoptime,o_teacher,o_cause,o_comment');
                $db_appliance = M('ApplianceInfo');
                foreach ($result as $key => $value) {
                    $Appdata['a_id'] = $value['a_id'];
                    $Appname = $db_appliance->where($Appdata)->getField('a_id,a_num,a_name');
                    $result[$key]['a_num'] = $Appname[$value['a_id']]['a_num'];
                    $result[$key]['a_name'] = $Appname[$value['a_id']]['a_name'];
                }
                if(is_array($result)){
                    //var_dump($result);
                     $this->assign('OrderForm',$result);
                     $this->display('');
                }else{
                    $this->display('OrderForm:empty');
                }
               
    }

    //待审批2
    public function ViewOrderForm2(){
        $db_Order = M('OrderForm');
        $data['u_id'] = $_SESSION['id'];     
        $state = $_GET['state'];
        $data['o_state'] = $state;          
        $dataone['o_starttime'] = array('lt',time());   //GT >  lt <
        $dataone['o_state'] = 2;
        //找出开始时间小于当前时间的2状态  
        $IdList = $db_Order->where($dataone)->getField('o_id');
        if($IdList){
            $datasave['o_state'] = 3;
            $datasave['o_id'] = array('in',$IdList);
            //将上述找到的id置为0状态
            $succe = $db_Order->save($datasave);
        }
        $result = array();
        $result = $db_Order->where($data)->order('o_starttime desc')->getField('o_id,a_id,o_starttime,o_stoptime,o_teacher,o_cause,o_comment');
        $db_appliance = M('ApplianceInfo');
        foreach ($result as $key => $value) {
            $Appdata['a_id'] = $value['a_id'];
            $Appname = $db_appliance->where($Appdata)->getField('a_id,a_num,a_name');
            $result[$key]['a_num'] = $Appname[$value['a_id']]['a_num'];
            $result[$key]['a_name'] = $Appname[$value['a_id']]['a_name'];
        }
        if(is_array($result)){
            $this->assign('OrderForm',$result);
            $this->display();
        }else{
            $this->display('OrderForm:empty');
        }
              
    }
   
    //未通过3
    public function ViewOrderForm3(){
        $db_Order = M('OrderForm');
        $data['u_id'] = $_SESSION['id'];
        $state = $_GET['state'];
        $data['o_state'] = $state; 
        //查询未通过订单 state=3     
        $dataone['o_starttime'] = array('lt',time());   //GT >  lt <
        $dataone['o_state'] = 2;
        //找出开始时间小于当前时间的2状态  
        $IdList = $db_Order->where($dataone)->getField('o_id');
        if($IdList){
            $datasave['o_state'] = 3;
            $datasave['o_id'] = array('in',$IdList);
            //将上述找到的id置为0状态
            $succe = $db_Order->save($datasave);
        }
        $result = array();
        $result = $db_Order->where($data)->order('o_starttime desc')->getField('o_id,a_id,o_starttime,o_stoptime,o_teacher,o_cause,o_comment');
        $db_appliance = M('ApplianceInfo');
        foreach ($result as $key => $value) {
            $Appdata['a_id'] = $value['a_id'];
            $Appname = $db_appliance->where($Appdata)->getField('a_id,a_num,a_name');
            $result[$key]['a_num'] = $Appname[$value['a_id']]['a_num'];
            $result[$key]['a_name'] = $Appname[$value['a_id']]['a_name'];
        }
        if(is_array($result)){
            $this->assign('OrderForm',$result);
            $this->display();
        }else{
            $this->display('OrderForm:empty');
        }
    }

}
