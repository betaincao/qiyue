<?php

namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller{
    //主页信息的显示
    public function index(){
    	$db_laboratory = M('Laboratory'); 
        //查询到具体实验室信息
        $result_laboratory = $db_laboratory->getField('l_id,l_name,l_appsum');
        $this->assign('Laboratory',$result_laboratory);
        $ApplianceInfo = A('ApplianceInfo');
        //热点数据  最多10个
        $resultApp = $ApplianceInfo->HotAppliance();
        $this->assign('HotAppliance',$resultApp);
        $this->display();       
    }
   
    //出现错误的显示页面
    public function error(){
        $this->display();
    }
}


