<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css//css/public.css">
    <title>Document</title>
</head>

<body>
    <table class="table">

        <form action="<?php echo U('edit');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
            <tr>
                <td class="th" colspan="10">编辑仪器信息</td>
            </tr>
            <tr>
                <th width="10%"><i></i>仪器编号：</th>
                <td>
                    <input name="a_num" size="50" value="<?php echo ($applianceInfo['a_num']); ?>" type="text">
                </td>
            </tr>
            <tr>
                <th width="10%"><i></i>仪器名称：</th>
                <td>
                    <input name="a_name" size="50" value="<?php echo ($applianceInfo['a_name']); ?>" type="text">
                </td>
            </tr>
            <tr>
                <th width="10%"><i></i>仪器详细描述：</th>
                <td>
                    <input name="a_detail" size="50" value="<?php echo ($applianceInfo['a_detail']); ?>" type="text">
                </td>
            </tr>
            <tr>
                <th width="10%"><i></i>原照片：</th>
                <td>
                    <img src="/qiyue/Public/Upload/<?php echo ($applianceInfo['a_photo']); ?>" height="150" width="150">
                </td>
            </tr>
            <tr>
                <th width="10%"><i></i>重新选择照片：</th>
                <td>
                    <input name="a_photo" size="50" type="file">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input id="a_id" name="a_id" size="50" value="<?php echo ($applianceInfo['a_id']); ?>" type="hidden">
                    <input name="l_id" size="50" value="<?php echo ($applianceInfo['l_id']); ?>" type="hidden">
                    <input class="" value="提交" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="" onclick="history.go(-1)" value="返回" type="button">
                </td>
            </tr>
        </form>
    </table>
</body>

</html>