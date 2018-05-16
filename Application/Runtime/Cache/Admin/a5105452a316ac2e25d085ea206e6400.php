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
            <td class="th" colspan="10">仪器列表<a href="<?php echo U('add',array('l_id'=>$l_id));?>">新增仪器</a></td>
        </tr>
        <tr>
            <td>仪器编号</td>
            <td>仪器名称</td>
            <td>仪器状态</td>
            <td>截止时间</td>
            <td>使用次数</td>
            <td>操作</td>
        </tr>

        <?php if(is_array($applianceInfo)): foreach($applianceInfo as $key=>$vo): ?><tr>
                <td>
                    <?php echo ($vo["a_num"]); ?>
                </td>
                <td>
                    <?php echo ($vo["a_name"]); ?>
                </td>
                <td>
                    <?php
 if($vo['a_state']==0){ echo "不可预约"; }else{ echo "可预约"; } ?>
                </td>
                <td>
                    <?php echo date("Y-m-d",$vo['a_outtime']);?>
                </td>
                <td>
                    <?php echo ($vo["a_add"]); ?>
                </td>
                <td>
                    [<a href="<?php echo U('AppInfo/detail',array('a_id'=>$vo['a_id']));?>">详情</a>][<a href="<?php echo U('AppInfo/edit',array('l_id'=>$l_id,'a_id'=>$vo['a_id']));?>">编辑</a>] [<a href="<?php echo U('AppInfo/delete',array('a_id'=>$vo['a_id']));?>">删除</a>]
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</body>

</html>