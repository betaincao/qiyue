<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>器约实验室仪器预约平台</title>
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/common.css" />
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/index.css" />
</head>

<body>
    <!-- 头部的搜索框开始 -->
    <div id="head">
        <form action="/qiyue/index.php/Home/ApplianceInfo/SearchByApplianceName" method="POST">
            <input type="text" name="name" class="search" />
            <input type="submit" value="搜索" class="search-btn" />
        </form>
        <?php if(!empty(session('id'))){ ?>
        <p id="login"><a href="/qiyue/index.php/Home/login/logout">退出</p></a>
            <?php
 }else{ ?>
                <p id="login"><a href="/qiyue/index.php/Home/login/login">登录</p></a>
                    <?php
 } ?>

    </div>

    <!-- 头部的搜索框结束 -->

    <!-- 轮播图的开始 -->
    <div id="nav">
        <img src="/qiyue/Public/Images/luWei2.jpg" width="100%" height="100%" />
        <div></div>
        <p><span>器约</span>实验室仪器预约平台</p>
    </div>

    <!-- 轮播图的结束 -->

    <!-- 类似于选项卡的东西的开始 -->
    <h4>实验室</h4>
    <div class="choice">
        <?php if(is_array($Laboratory)): foreach($Laboratory as $key=>$vo): ?><div class="laboratory">
                <a href="/qiyue/index.php/Home/ApplianceInfo/LaboratoryAppliance/l_name/<?php echo ($vo["l_name"]); ?>/l_id/<?php echo ($vo["l_id"]); ?>"><img src="/qiyue/Public/Images/book.png" alt="" style="background-color: #CCFF00; " /></a>
                <p>
                    <?php echo ($vo["l_name"]); ?>
                </p>
                <p class="num">
                    <?php echo ($vo["l_appsum"]); ?>
                </p>
            </div><?php endforeach; endif; ?>
    </div>


    <!-- 类似于选项卡的东西的结束 -->


    <!-- a_id,a_name,a_photo,l_id -->
    <h4>器材</h4>
    <div class="recommend" id="app">
        <?php if(is_array($HotAppliance)): foreach($HotAppliance as $key=>$vo): ?><div class="qiCai">
                <a href="/qiyue/index.php/Home/ApplianceInfo/ApplianceInfo/a_id/<?php echo ($vo["a_id"]); ?>/a_name/<?php echo ($vo["a_name"]); ?>/l_name/<?php echo ($vo["l_name"]); ?>/a_num/<?php echo ($vo["a_num"]); ?>"><img src="/qiyue/Public/Upload/<?php echo ($vo["a_photo"]); ?>"  alt="" class="img" /></a>
                <p class="p">
                    <?php echo ($vo["a_name"]); ?>
                </p>
            </div><?php endforeach; endif; ?>
    </div>

    <!--  这里是页脚里面的部分的开始 -->
    <div style="width:100%;height:3rem;"></div>
    <table id="footer" class="choice">
        <tr>
            <td>
                <a href="/qiyue/index.php/Home/Index/index">
                    <img src="/qiyue/Public/Images/book.png" alt="" style="background-color: #385A9A;" />
                    <p>首页</p>
                </a>
            </td>
            <td>
                <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm">
                    <img src="/qiyue/Public/Images/book.png" alt="" style="background-color: #D1473A;" />
                    <p>订单</p>
                </a>
            </td>
            <td>
                <a href="/qiyue/index.php/Home/Person/Person">
                    <img src="/qiyue/Public/Images/book.png" alt="" style="background-color: #409AFA;" />
                    <p>我的</p>
                </a>
            </td>
        </tr>
    </table>

    <!--  这里是页脚里面的部分的结束 -->
</body>

</html>
<!-- <script type="text/javascript" src="/qiyue/Public/Js/index.js"></script> -->
<script type="text/javascript">
    let laboratory = document.querySelectorAll(".laboratory");
    let contentBox = document.getElementById("app");
    for (let i = laboratory.length - 1; i >= 0; i--) {
        laboratory[i].getElementsByTagName('a')[0].addEventListener('click', function(event) {
            event.preventDefault();
            var str = laboratory[i].getElementsByTagName('a')[0].getAttribute("href");
            var index = str.lastIndexOf("\/");
            str = str.substring(index + 1, str.length);
            loadXMLDoc(parseInt(str));
        });
    };

    //这里是发起ajax请求的
    function loadXMLDoc(href) {
        var allBox = contentBox.getElementsByTagName("div");
        for (var i = allBox.length - 1; i >= 0; i--) {
            allBox[i].innerHTML = '';
            allBox[i].style.display = "none";
        }
        var xmlhttp;
        if (window.XMLHttpRequest) {
            //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
            xmlhttp = new XMLHttpRequest();
        } else {
            // IE6, IE5 浏览器执行代码
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                console.log(jsonToArray(xmlhttp.responseText));
                var answer = jsonToArray(xmlhttp.responseText);
                for (let j = 1; j <= answer.length - 1; j = j + 2) {
                    var box = document.createElement('div');
                    box.className = "recommend";
                    var img = document.createElement('img');
                    var p = document.createElement('p');
                    var a = document.createElement('a');
                    p.innerText = answer[j].a_name;
                    a.setAttribute('href', '/qiyue/index.php/Home/ApplianceInfo/ApplianceInfo/a_id/' + answer[j].a_id + '/a_name/' + answer[j].a_name + '/l_name/' + answer[j].l_name + '/a_num/' + answer[j].a_num);
                    a.appendChild(img)
                    img.setAttribute('src', '/qiyue/Public/Upload/' + answer[j].a_photo);
                    box.appendChild(a);
                    box.appendChild(p);
                    contentBox.appendChild(box);

                }
            }
        }
        xmlhttp.open("GET", "/qiyue/index.php/Home/ApplianceInfo/LaboratoryAppliance/id/" + href, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(null);
    };

    // 将json转化为数组
    function jsonToArray(str) {
        const obj = JSON.parse(str);
        const result = [];
        for (let key in obj) {
            result.push(key);
            result.push(obj[key]);
        }
        return result;
    }
</script>