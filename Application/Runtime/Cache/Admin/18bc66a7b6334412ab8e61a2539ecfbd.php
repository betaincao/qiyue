<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css//css/public.css">
    <title>Document</title>
</head>

<body>
    <table class="table">
        <tr>
            <td class="th" colspan="10">订单列表</td>
        </tr>
        <tr>
            <td>ID</td>
            <td>用户名称</td>
            <td>仪器编号</td>
            <td>仪器名称</td>
            <td>指导教师</td>
            <td>审核状态</td>
        </tr>

        <?php if(is_array($orderForm)): foreach($orderForm as $key=>$vo): ?><tr>
                <td>
                    <?php echo ($vo["o_id"]); ?>
                </td>
                <td>
                    <?php echo ($vo["u_id"]); ?>
                </td>
                <td>
                    <?php echo ($vo["a_id"]); ?>
                </td>
                <td>
                    <?php echo ($vo["a_name"]); ?>
                </td>
                <td>
                    <?php echo ($vo["o_teacher"]); ?>
                </td>
                <td>
                    <?php
 switch((int)$vo['o_state']){ case 0: echo '已完成'; break; case 1: echo '使用中'; break; case 2: echo '待审批'; break; case 3: echo '已拒绝'; break; } ?>
                </td>

            </tr><?php endforeach; endif; ?>
    </table>
</body>

</html>