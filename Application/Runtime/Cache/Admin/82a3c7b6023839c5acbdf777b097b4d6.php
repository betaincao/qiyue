<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title></title>
    <link rel="stylesheet" href="/qiyue/Public/Css/css/admin.css" />
</head>

<body>
    <table class="table">
        <tr>
            <td colspan='2' class="th"><span class="span_people">&nbsp</span>欢迎光临后台管理系统</td>
        </tr>
        <tr>
            <td>用户名</td>
            <td>
                <?php echo session( 'a_name');?>
            </td>
        </tr>
        <tr>
            <td>登录时间</td>
            <td>
                <?php echo date( 'Y-m-d H:i:s',time());?>
            </td>
        </tr>
        <tr>
            <td>客户端IP</td>
            <td>
                <?php echo ($_SERVER[ "REMOTE_ADDR"]); ?>
            </td>
        </tr>
        <tr>
            <td colspan='2' class="th"><span class="span_server" style="float:left">&nbsp</span>服务器信息</td>
        </tr>
        <tr>
            <td>服务器环境</td>
            <td>
                <?php echo ($_SERVER[ "SERVER_SOFTWARE"]); ?>
            </td>
        </tr>
        <tr>
            <td>PHP运行环境</td>
            <td>
                <?php echo php_sapi_name();?>
            </td>
        </tr>
        <tr>
            <td>PHP版本</td>
            <td>
                <?php echo PHP_VERSION ;?>
            </td>
        </tr>
        <tr>
            <td>ThinkPHP版本</td>
            <td>
                <?php echo THINK_VERSION;?>
            </td>
        </tr>
        <tr>
            <td>上传文件限制</td>
            <td>
                <?php echo ini_get( 'upload_max_filesize');?>
            </td>
        </tr>
        <tr>
            <td>服务器语言</td>
            <td>
                <?php echo ($_SERVER[ 'HTTP_ACCEPT_LANGUAGE']); ?>
            </td>
        </tr>
        <tr>
            <td>系统信息</td>
            <td>
                <?php echo php_uname();?>
            </td>
        </tr>
        <tr>
            <td>数据库信息</td>
            <td>
                <?php echo mysql_get_server_info();?>
            </td>
        </tr>

    </table>
</body>

</html>