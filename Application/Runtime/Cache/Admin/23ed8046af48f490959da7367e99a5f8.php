<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css//css/public.css">
    <title>Document</title>
</head>

<body>
    <table class="table">

        <form action="<?php echo U('add',array('l_id'=>$l_id));?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
            <tr>
                <td class="th" colspan="10">添加仪器</td>
            </tr>
            <tr>
                <th width="10%"><i></i>仪器编号：</th>
                <td>
                    <input id="a_num" name="a_num" size="50" type="text">
                </td>
            </tr>
            <tr>
                <th width="10%"><i></i>仪器名称：</th>
                <td>
                    <input id="a_name" name="a_name" size="50" type="text">
                </td>
            </tr>
            <tr>
                <th width="10%"><i></i>仪器详细描述：</th>
                <td>
                    <textarea id="a_detail" name="a_detail" cols="40" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <th width="10%"><i></i>照片：</th>
                <td>
                    <input id="a_photo" name="a_photo" size="50" type="file">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="" value="提交" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="" onclick="history.go(-1)" value="返回" type="button">
                </td>
            </tr>
        </form>
    </table>
</body>

</html>