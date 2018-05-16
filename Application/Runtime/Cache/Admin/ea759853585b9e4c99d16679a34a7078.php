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
            <td class="th" colspan="10">评论列表</td>
        </tr>
        <tr>
            <td>ID</td>
            <td>用户姓名</td>
            <td>仪器名称</td>
            <td width="50%">评论内容</td>
            <td>审核状态</td>
            <td>创建时间</td>
            <td>操作</td>
        </tr>

        <?php if(is_array($approvaledData)): foreach($approvaledData as $key=>$vo): ?><tr>
                <td>
                    <?php echo ($vo["c_id"]); ?>
                </td>
                <td>
                    <?php echo ($vo["u_id"]); ?>
                </td>
                <td>
                    <?php echo ($vo["a_id"]); ?>
                </td>
                <td>
                    <?php echo ($vo["c_comment"]); ?>
                </td>
                <td>
                    <?php
 if((int)$vo['c_state']==1){ echo "通过"; }else{ echo "未通过"; } ?>
                </td>
                <td>
                    <?php echo date( 'Y-m-d',$vo[ 'c_time']);?>
                </td>
                <td>
                    [<a href="<?php echo U('approval',array('c_id'=>$vo['c_id'],'c_state'=>0));?>">重置状态</a>]
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</body>

</html>