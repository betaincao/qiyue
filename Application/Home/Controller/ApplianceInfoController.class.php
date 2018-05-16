<?php
namespace Home\Controller;
use Think\Controller;

header('Content-type:text/html;charset=utf-8');

class ApplianceInfoController extends Controller{
	public function index(){

	}
   
    //热点仪器显示TOP 10  待index调用
	public function HotAppliance(){
        $db_Appliance = M('ApplianceInfo');
 		$result_Appliance = [];
 		//仪器id 仪器编号 仪器名称 仪器图片 归属实验室
        $result_Appliance = $db_Appliance->order('a_add desc')->limit(10)->getField('a_id,a_num,a_name,a_photo,l_id');
        $db_laboratory = M('Laboratory');
        foreach ($result_Appliance as $key => $value) {
            $dataLaboratory['l_id'] = $value['l_id'];
            $result_laboratory = $db_laboratory->where($dataLaboratory)->getField('l_id,l_name');
            $result_Appliance[$key]['l_name'] = $result_laboratory[$value['l_id']];
        }
		return $result_Appliance;	 	
	}
    

    //仪器详情
    public function ApplianceInfo(){
    	$db_Appliance = M('ApplianceInfo');
 		$result_Appliance = [];
 		//通过仪器id获取仪器详情
        //Param:a_photo、a_name、l_name、a_state、a_detail、a_outtime、a_add
 		$a_id = $_GET['a_id'];
        $a_num = $_GET['a_num'];
 		$a_name = $_GET['a_name'];
 		$l_name = $_GET['l_name'];
 		$dataAppliance['a_id'] = $a_id;
 		$result_ApplianceInfo = $db_Appliance->where($dataAppliance)->getField('a_state,a_detail,a_outtime,a_add,a_photo');
        $result_ApplianceInfo[1]['a_id'] = $a_id;
 		$result_ApplianceInfo[1]['a_name'] = $a_name;
 		$result_ApplianceInfo[1]['l_name'] = $l_name;
        $result_ApplianceInfo[1]['a_num'] = $a_num;
        //展示仪器信息
        $this->assign('ApplianceInfo',$result_ApplianceInfo);
        //获取收藏信息
        $Objconllect = A('Conllect');
        $conllect = $Objconllect->GetConllect($a_id);
        $this->assign('Conllect',$conllect);
        $comment=A("Comment");    
        //获取评论信息
        $CommentInfo = $comment->ApplianceComment($a_id);    //调用Team控制器中的pro_con方法
        $this->assign('Comment',$CommentInfo);
        $this->display();
     }
    
    //展示一类仪器接口
    public function ConllecAppliance($ArrayaId){
        $db_Appliance = M('ApplianceInfo');
        $dataApp['a_id'] = array('in',$ArrayaId);
        $result_Appliance = [];
        //仪器id 仪器编号 仪器名称 仪器图片 归属实验室 
        $result_Appliance = $db_Appliance->where($dataApp)->getField('a_id,a_num,a_name,a_photo,l_id');
        $db_laboratory = M('Laboratory');
        foreach ($result_Appliance as $key => $value) {
            $dataLaboratory['l_id'] = $value['l_id'];
            $result_laboratory = $db_laboratory->where($dataLaboratory)->getField('l_name');
            $result_Appliance[$key]['l_name'] = $result_laboratory;
        }         
        return $result_Appliance;
    }

    //展示某个实验室的仪器
    public function LaboratoryAppliance(){
        $l_id = $_GET['id'];
        $dataLaboratory['l_id'] = $l_id;
        $db_Appliance = M('ApplianceInfo');
        $result_laboratoryAppliance = $db_Appliance->where($dataLaboratory)->order('a_add desc')->getField('a_id,a_num,a_name,a_photo,l_id');

        $db_laboratory = M('Laboratory');
        foreach ($result_laboratoryAppliance as $key => $value) {
            $dataLaboratory['l_id'] = $value['l_id'];
            $result_laboratory = $db_laboratory->where($dataLaboratory)->getField('l_id,l_name');
            $result_laboratoryAppliance[$key]['l_name'] = $result_laboratory[$value['l_id']];
        }

        $result = json_encode($result_laboratoryAppliance);
        echo $result;
        exit;
    }


    //搜索仪器按照名字
    public function SearchByApplianceName(){
        $laboratoryName = $_POST['name'];
        $laboratoryName = trim($laboratoryName);
        $name = "%".$laboratoryName."%";
        $data['a_name'] = array('like',$name); 
        $db_Appliance = M('ApplianceInfo');
        $result_Appliance = $db_Appliance->where($data)->getField('a_id,a_num,a_name,a_photo,l_id');
        $db_laboratory = M('Laboratory');
        foreach ($result_Appliance as $key => $value) {
            $dataLaboratory['l_id'] = $value['l_id'];
            $result_laboratory = $db_laboratory->where($dataLaboratory)->getField('l_id,l_name');
            $result_Appliance[$key]['l_name'] = $result_laboratory[$value['l_id']];
        }
        $this->assign('Search',$result_Appliance);
        $this->display();
    }
}