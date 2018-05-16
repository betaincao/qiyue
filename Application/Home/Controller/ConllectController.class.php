<?php
namespace Home\Controller;
use Think\Controller;

class ConllectController extends Controller{
	//获取用户对该仪器的收藏状态
    public function GetConllect($a_id){
        $dataConllect['u_id'] = $_SESSION['id'];
        $dataConllect['a_id'] = $a_id;
        $db_Conllect = M('Conllect');
        if(empty($dataConllect['u_id'])){  //用户未登陆的判断
            return 2;
        }
        $result_conllect = $db_Conllect->where($dataConllect)->getField('c_id');
        //已收藏
        if(!empty($result_conllect)){
            return 1;
        }else{
            return 0;
        }
    }
   
    //修改收藏信息
    public function UpdateConllect(){
        $db_Conllect = M('Conllect');
        $u_id = $_SESSION['id'];
        $dataConllect['u_id'] = $u_id;

        $dataJson = $_GET['datajson'];
        $data = [];
        $data = json_decode($dataJson); //解析出来的是个对象

        $dataConllect['a_id'] = $_GET['a_id'];
        $state = $_GET['state'];

        $Add_data['a_id'] = $_GET['a_id'];
        $Add_data['u_id'] = $u_id;
        $Add_data['c_time'] = time();
        $update_data['c_id'] = $db_Conllect->where($dataConllect)->getField('c_id');
        if($state){  //1为收藏 数据库加数据
        	if(empty($update_data['c_id'])){
        		$result_conllect = $db_Conllect->data($Add_data)->add();
            }
        }else{   
            $result_conllect = $db_Conllect->where($update_data)->delete();
        }
    }

    //用户查看自己的仪器收藏
    public function ShowConllect(){
    	$db_Conllect = M('Conllect');
        $dataConllect['u_id'] = $_SESSION['id'];
        $conllectIdList = $db_Conllect->where($dataConllect)->order('c_time desc')->getField('a_id',true);
    	$Objconllect = A('ApplianceInfo');
        $result = $Objconllect->ConllecAppliance($conllectIdList);
   		$this->assign('Conllect',$result);
        $this->display();
    }
}