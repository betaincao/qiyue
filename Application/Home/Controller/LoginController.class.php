<?php

namespace Home\Controller;
use Think\Controller;
header("Content-Type:text/html;charset=UTF-8");
/*
   @功能:登陆模块的实现
   @修改时间:2016-09-20
   @修改人员:koocookie
*/
class  LoginController extends Controller {
	//显示登陆界面
	public function index(){
		$this->display();
	}
    
    //判断登陆
	public function dologin(){
		$db=M("UserLogin");
		$data['u_phone']=$_POST['username'];
		$data['u_passwd']=md5($_POST['password']);
        $data['u_state'] = 1;
		$code=$_POST['code'];
        $verify = new \Think\Verify();   //判断验证的内置方法
        if($verify->check($code, $id)){
            $id=$db->where($data)->getField('u_id');
            if($id){
                $db_info = M('UserInfo');
                $data_id['u_id'] = $id;
                $result_name = $db_info->where($data_id)->getField('u_name');
                // echo $id;
                // echo $result_name;die;
            	$_SESSION['username'] = $result_name;
                $_SESSION['id'] = $id; 

                if($data['u_phone'] == 'Admin'){
                     //$this->success('登录成功',U('Admin/home/index'));
                    $this->redirect('Admin/home/index');
                }else{
                    $this->redirect('Index/index');
                }
            }else{
                echo '<script type="text/javascript">'."\r\n";
                echo 'alert("账户密码错误！");'."\r\n";
                echo 'window.history.go(-1);'."\r\n";
                echo '</script>';
            }
        }else{
            echo '<script type="text/javascript">'."\r\n";
                echo 'alert("验证码错误！");'."\r\n";
                echo 'window.history.go(-1);'."\r\n";
                echo '</script>';
        }
    }
     
    //找回密码
    public function zhpw(){
        $this->display();   
    }
    
    //重置密码
    public function password(){
        $u_email = $_POST['username'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];
        $code = $_POST['code'];
        if($password == $password1){   //判断两次密码是否一致
            $db = M('UserLogin');
            $data['u_email'] = $u_email;
            $data['u_code'] = $code;
            $u_id = $db->where($data)->getField('u_id',1);   //判断验证码是否正确
            if($u_id){
                $data_up['u_id'] = $u_id;
                $data_up['u_paswd'] = md5($password);
                $result = $db->save($data_up);  //将密码更新
                if($result){
                    $this->success('密码修改成功!!!');
                }else{
                    $this->error('密码修改成功!!!');
                }        
            }else{
                $this->error('验证码错误!!!');
            }
        }else{
            $this->error('密码不一致!!!');
        }
    } 
    
    //退出登录
    public function outlogin(){
     	if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),'',time()-1,'/');
			}
			session_unset();
			session_destroy();
			$this->redirect('Login/index');
        }
        public function logout(){
            session_unset();
            session_destroy();
            $this->redirect('Login/login');
        }
}
?>