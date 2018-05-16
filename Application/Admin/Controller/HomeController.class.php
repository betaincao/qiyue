<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class HomeController extends CommonController {
    public function index(){
        $db = M('Laboratory');
        $labName = $db->field('l_id,l_name')->select();
        $this->assign('labName',$labName);
        $this->display();
        // $json = json_encode($labName);
        // //var_dump($json);die;
        // //echo $json;
        // //return $json;
        // $this->ajaxReturn($json);
    }
    public function logout(){
        session_unset();
        session_destroy();
        $this->redirect('Home/Login/login');
    }
}