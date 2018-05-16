<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>详情页</title>
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/common.css" />
    <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/more.css" />
    <script type="text/javascript" src="/qiyue/Public/Js/jquery.min.js"></script>
    <!--  <script type="text/javascript" src="/qiyue/Public/Js/more.js"></script> -->
</head>

<body>

    <!-- 头部的搜索框开始 -->
    <div id="head">
        <a href="/qiyue/index.php/Home/Index/index"><img src="/qiyue/Public/Images/house.png" alt="主页" id="house" /></a>
        <p id="person-center">设备详情</p>
    </div>
    <!-- 头部的搜索框结束 -->

    <?php if(is_array($ApplianceInfo)): foreach($ApplianceInfo as $key=>$vo): ?><script type="text/javascript">
            function save() {
                var btn1 = document.getElementsByClassName("bottom")[0].getElementsByTagName('button')[1];
                var value1 = "<?php echo ($Conllect); ?>";

                if (value1 == "1") btn1.innerHTML = "已收藏";
                else btn1.innerHTML = "收藏";


            };

            function date() {
                var bt0 = document.getElementsByClassName("bottom")[0].getElementsByTagName('button')[0];
                var value = 0;
                //var value = <?php echo ($vo["a_state"]); ?>;
                if (value == "1") {
                    bt0.disabled = true;
                    //attributes[i/"属性名"].value="属性值"
                    bt0.style.backgroundColor = 'gray';
                } else {
                    bt0.disabled = false;
                    bt0.style.backgroundColor = '';
                }
            }
            window.onload = function() {
                save();
                date();
            }
        </script>
        <div class="content">
            <!-- 主图 -->
            <img src="/qiyue/Public/Upload/<?php echo ($vo["a_photo"]); ?>" />
            <div id="main">
                <div class="item"><span>名称</span>
                    <p>
                        <?php echo ($vo["a_name"]); ?>
                    </p>
                </div>
                <div class="item"><span>简介</span>
                    <p>
                        <?php echo ($vo["a_detail"]); ?>
                    </p>
                </div>
                <div class="item"><span>仪器编号</span>
                    <p>
                        <?php echo ($vo["a_num"]); ?>
                    </p>
                </div>
                <div class="item"><span>所属实验室</span>
                    <p>
                        <?php echo ($vo["l_name"]); ?>
                    </p>
                </div>
                <div class="item"><span>预约次数</span>
                    <p>
                        <?php echo ($vo["a_add"]); ?>次</p>
                </div>
                <div class="bottom">
                    <a href="/qiyue/index.php/Home/OrderForm/dateForm/a_id/<?php echo ($vo["a_id"]); ?>"><button>预约</button></a>
                    <button id='ajax'>收藏</button>
                </div>


                <script type="text/javascript">
                    $(function() {
                        $('#ajax').click(function() { //绑定失去焦点方法
                            var value1 = "<?php echo ($Conllect); ?>";

                            if (value1 == "2") {
                                window.location.href = '/qiyue/index.php/Home/Login/login'
                            }
                            if (value1 != 2) {
                                if ($('#ajax').html() == "收藏") {
                                    $('#ajax').html("已收藏"); //1
                                    var state = 1;
                                } else {
                                    $('#ajax').html("收藏"); //0
                                    var state = 0;
                                }
                            }
                            $.get('/qiyue/index.php/Home/Conllect/UpdateConllect/', {
                                'state': state,
                                'a_id': "<?php echo ($vo["a_id"]); ?>"
                            }, function() {});
                        });
                    });
                </script><?php endforeach; endif; ?>
    <div>
        <span style="margin-bottom: 10px;font-size: .8rem;padding-left:.2rem">评论</span><br>
        <?php if(is_array($Comment)): foreach($Comment as $key=>$vo): ?><div class="pingLun">
                <h4>
                    <?php echo ($vo["u_name"]); ?>
                </h4>
                <span class="time"><?php echo (date('Y-m-d H:i:s',$vo["c_time"])); ?></span>
                <p>
                    <?php echo ($vo["c_comment"]); ?>
                </p>
            </div><?php endforeach; endif; ?>
    </div>
    </div>
    </div>
    <!-- 底部的按钮 -->



</body>

</html>