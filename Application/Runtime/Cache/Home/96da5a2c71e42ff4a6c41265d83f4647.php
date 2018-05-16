<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>详情页</title>

    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/common.css" />
    <!-- <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/dateform.css" /> -->
    <style>
        #text{
            width:2rem;
            height:100%;
            margin:0 auto;
            font-size: 0.8rem;
        }
        .content{
            margin-top: 1rem;
        }
        .content div{
            padding:0.25rem 0.15rem;
        }
        .content div label{
            display: block;
            width:4rem;
            font-size: 0.8rem;
            margin: 0.4rem 0 0.15rem 0;
        }
        .content div input[type='text']{
            width:10rem;
            margin: 0.2rem  0 0.4rem 0;
            height:1.5rem;
            border:1px solid #5F9EA0;
        }
        .content div input[type='submit']{
            width: 6rem;
            height:1.3rem;
            border:none;
            border-radius: 0.25rem;
            margin:1rem 0 0 1.5rem;
            background-color: #5F9EA0;
        }
    </style>
</head>
<body>
<!-- 头部的搜索框开始 -->
<div id="head">
    <a href="/qiyue/index.php/Home/Index/index"><img src="/qiyue/Public/Images/house.png" alt="主页" id="house" /></a>
    <p id="text">预约</p>
</div>
<!-- 头部的搜索框结束 -->

<div class="content">
    <div>
     <form method="POST" onsubmit="return test()" action="/qiyue/index.php/home/order_form/CreateOrderForm/a_id/<?php echo ($a_id); ?>">
        <label>起始时间:</label><input type='text' name = 'starttime' /><br>
        <label>截止时间:</label><input type='text' name = 'stoptime'   /><br>
        <label>指导老师:</label><input type='text' name = 'teacher'   /><br>
        <input type="submit" value="提交" />
    </form>
    </div>
</div>
</body>
<script>
    function test() {
        var div = document.getElementsByClassName('content')[0].getElementsByTagName('div')[0];
        var form = div.getElementsByTagName('form')[0];
        var inputs = form.getElementsByTagName('input');
        var beginDate=inputs[0].value;
        var endDate=inputs[1].value;
        var d1 = new Date(beginDate.replace(/\-/g, "\/"));
        var d2 = new Date(endDate.replace(/\-/g, "\/"));

        if( inputs[2].value!=""&&beginDate!="" && endDate!="" && d1<d2 )
        {
            inputs[3].style.backgroundColor='gray';
            return true;
        }
        else{
            return false;
        }
    }
</script>
</html>