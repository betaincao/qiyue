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
            <td class="th" colspan="10">实验室列表
                <a href="<?php echo U('add');?>">新增实验室</a></td>
        </tr>
        <tr>
            <td>ID</td>
            <td>实验室名称</td>
            <td>仪器数量</td>
            <td>操作</td>
        </tr>

        <?php if(is_array($labInfo)): foreach($labInfo as $key=>$vo): ?><tr>
                <td>
                    <?php echo ($vo["l_id"]); ?>
                </td>
                <td>
                    <?php echo ($vo["l_name"]); ?>
                </td>
                <td>
                    <?php echo ($vo["l_appsum"]); ?>
                </td>
                <td>
                    [<a href="<?php echo U('LabInfo/edit',array('l_id'=>$vo['l_id']));?>">编辑</a>] [
                    <a href="<?php echo U('LabInfo/delete',array('l_id'=>$vo['l_id']));?>">删除</a>]
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</body>

</html>