<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css//css/public.css">
    <title>Document</title>
    <style>
        .body_left {
            display: inline-block;
            position: relative;
            width: 400px;
            height: 400px;
            border: black 1px solid;
            top: 10px;
        }
        
        .body_right {
            display: inline-block;
            position: absolute;
            left: 480px;
            top: 50px;
            width: 500px;
        }
        
        .body_right ul {
            padding-top: 20px;
            padding-left: 20px;
            margin-top: 20px;
            background-color: rgb(248, 248, 248);
            border-radius: 20px;
            height: 280px;
        }
        
        .body_right li {
            height: 40px;
            font-size: 20px;
        }
        
        .body_right span {
            display: inline-block;
            width: 300px;
            font-size: 20px;
            margin-left: 30px;
        }
        
        .body_right h1 {
            font-size: 30px
        }
        
        .header::before {
            content: '仪器名称';
            margin-right: 30px;
        }
    </style>
</head>

<body style="position: relative;top: 30px;padding-left:50px;">
    <div class="body_left">
        <img src="/qiyue/Public/Upload/<?php echo ($applianceInfo['a_photo']); ?>" alt="" width="400" height="400">
    </div>
    <div class="body_right">
        <h1 class="header">
            <?php echo ($applianceInfo["a_name"]); ?>
        </h1>
        <ul>
            <li>仪器名称：<span><?php echo ($applianceInfo["a_num"]); ?></span></li>
            <li>仪器名称：<span><?php echo ($applianceInfo["a_name"]); ?></span></li>
            <li>仪器状态：<span><?php
 if($applianceInfo['a_state']==0){ echo "不可预约"; }else{ echo "可预约"; } ?></span></li>
            <li>截止时间：<span><?php echo date("Y-m-d",$applianceInfo['a_outtime']);?></span></li>
            <li>使用次数：<span><?php echo ($applianceInfo["a_add"]); ?></span></li>
            <li>
                <p style="display: inline;font-size: 20px;vertical-align:top;">详细信息</p>
                <span id="demo"><?php echo ($applianceInfo["a_detail"]); ?></span></li>
        </ul>
    </div>
</body>
<script>
    var oBox = document.getElementById('demo');
    var a = oBox.innerHTML;
    var demoHtml;
    if (a.length > 60) {
        demoHtml = oBox.innerHTML.slice(0, 57) + '...';
    } else {
        demoHtml = oBox.innerHTML
    }
    oBox.innerHTML = demoHtml;
</script>

</html>