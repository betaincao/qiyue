<?php
namespace Home\Model;
use Think\Model;
/*
   创建User集合的Model类

*/
Class UserLoginModel extends Model{       
     
     //自动验证的条件
     // protected $_validate=array(
     //    array('username','require','用户名必填'),
     //    array('password','require','用户密码必填'),
     //    array('repassword','password','两次密码不一致',0,'confirm'),
     //    array('code','require','验证码必填'),
     //    array('code','checkCode','验证码错误',0,'callback',1),
     // );
     
     //custom一个验证方法,用于验证验证码是否正确
    //  function checkCode($code, $id = ''){
    //       $verify = new \Think\Verify();
    //       return $verify->check($code, $id);
    // }
}