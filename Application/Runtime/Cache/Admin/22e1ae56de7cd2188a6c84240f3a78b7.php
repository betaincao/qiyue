<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>后台管理首页</title>
    <link rel="stylesheet" href="/qiyue/Public/Css/css/admin.css" />
    <script type="text/javascript" src="/qiyue/Public/Js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/qiyue/Public/Js/admin.js"></script>
    <!-- 默认打开目标 -->
    <base target="iframe" />
</head>

<body>
    <!-- 头部 -->
    <div id="top_box">
        <div id="top">
            <p id="top_font">后台管理首页 （V1.1）</p>
        </div>
        <div class="top_bar">
            <p class="adm">
                <span>管理员：</span>
                <span class="adm_pic"></span>
                <span class="adm_people">[<?php echo session('username');?>]</span>
            </p>
            <p class="now_time">
                今天是：
                <?php echo date("Y-m-d")?> 您的当前位置是
                <span>首页</span>
            </p>
            <p class="out">
                <span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
                <a href="<?php echo U('home/logout');?>" target="_self">退出</a>
            </p>
        </div>
    </div>
    <!-- 左侧菜单 -->
    <div id="left_box">
        <p class="use">功能管理</p>
        <div class="menu_box">
            <h2>仪器管理</h2>
            <div class="text">
                <?php if(is_array($labName)): foreach($labName as $key=>$vo): ?><ul class="con">
                        <li class="nav_u">
                            <a href="<?php echo U('AppInfo/index',array('l_id'=> $vo['l_id']));?>" class="pos">
                                <?php echo ($vo["l_name"]); ?>
                            </a>
                        </li>
                    </ul><?php endforeach; endif; ?>
            </div>
        </div>
        <div class="menu_box">
            <h2>实验室管理</h2>
            <div class="text">
                <ul class="con">
                    <li class="nav_u">
                        <a href="<?php echo U('LabInfo/index');?>" class="pos">实验室列表</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu_box">
            <h2>订单审批</h2>
            <div class="text">
                <ul class="con">
                    <li class="nav_u">
                        <a href="<?php echo U('Order/index');?>" class="pos">所有订单</a>
                    </li>
                </ul>
                <ul class="con">
                    <li class="nav_u">
                        <a href="<?php echo U('Order/approvaling');?>" class="pos">待审批</a>
                    </li>
                </ul>
                <ul class="con">
                    <li class="nav_u">
                        <a href="<?php echo U('Order/approvaled');?>" class="pos">已审批</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu_box">
            <h2>评论管理</h2>
            <div class="text">
                <ul class="con">
                    <li class="nav_u">
                        <a href="<?php echo U('Comment/approvaling');?>" class="pos">待审批</a>
                    </li>
                </ul>
                <ul class="con">
                    <li class="nav_u">
                        <a href="<?php echo U('Comment/approvaled');?>" class="pos">已审批</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu_box">
            <h2>常用菜单</h2>
            <div class="text">
                <ul class="con">
                    <li class="nav_u">
                        <a href="<?php echo U('Home/Login/login');?>" class="pos" target="_blank">前台首页</a>
                    </li>
                </ul>
                <ul class="con">
                    <li class="nav_u">
                        <a href="<?php echo U('SystemInfo/index');?>" class="pos">系统信息</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- 右侧 -->
    <div id="right">
        <iframe frameboder="0" border="0" scrolling="yes" name="iframe" src="<?php echo U('SystemInfo/index');?>"></iframe>
    </div>
    <!-- 底部 -->
    <div id="foot_box">
        <div class="foot">
            <p>Copyright&nbsp;&copy;&nbsp;器约 All Rights Reserved</p>
        </div>
    </div>

</body>

</html>
<!--[if IE 6]>
    <script type="text/javascript" src="js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.adm_pic, #left_box .pos, .span_server, .span_people', 'background');
    </script>
<![endif]-->