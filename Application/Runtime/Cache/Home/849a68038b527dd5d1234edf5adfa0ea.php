<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="UTF-8">
  <title>订单</title>
  <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/common.css" />
  <link rel="stylesheet" type="text/css" href="/qiyue/Public/Css/list.css" />  
</head>
<body>
  <!-- 头部的搜索框开始 -->
  <div id="head">
     <a href="/qiyue/index.php/Home/Index/index"><img src="/qiyue/Public/Images/house.png" alt="主页" id="house" /></a>
     <p id="person-center">我的订单</p>
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
   <div class="choice">
     <div>
        <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm0/state/1"><img src="/qiyue/Public/Images/shopping.png"  alt=""  /></a>
        <p>进行中</p>
     </div>
      <div>
        <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm1/state/0"><img src="/qiyue/Public/Images/shopping.png"  alt=""  /></a>
        <p>已完成</p>
     </div>
      <div>
        <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm2/state/2"><img src="/qiyue/Public/Images/shopping.png"  alt=""  /></a>
        <p>待审批</p>
      </div>
     <div>
        <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm3/state/3"><img src="/qiyue/Public/Images/shopping.png"  alt=""  /></a>
        <p>未通过</p>
     </div>
   </div>
    <!-- 类似于选项卡的东西的结束-->

    <!-- 开始信息展示 -->
  <ul id="collect">
      <?php if(is_array($OrderForm)): foreach($OrderForm as $key=>$vo): ?><li>
         <h5>编号：<?php echo ($vo["a_num"]); ?></h5>
          <hr/>
       <a href="/qiyue/index.php/Home/ApplianceInfo/ApplianceInfo/a_id/<?php echo ($vo["a_id"]); ?>/a_name/<?php echo ($vo["a_name"]); ?>/a_photo/'/qiyue/Public/Images/book.jpg'/l_name/计算机应用技术协会/a_num/XX55-3"><img src="/qiyue/Public/Images/cloth.jpg" /></a>
        <div class="basic">
           <span class='cause' style="display: none"><?php echo ($vo["o_cause"]); ?></span>
          <p>
                <span class="name">仪器名称</span>
                <span class="value"><?php echo ($vo["a_name"]); ?></span>
            </p>
            <p>
                <span class="name">指导老师</span>
                <span class="value"><?php echo ($vo["o_teacher"]); ?></span>
            </p>
        </div>
        <div style="clear: both;"></div>
        <p class="message-end pass" id="pass"></p>
        <script type="text/javascript">
           var pass = document.getElementsByClassName('pass');
           var causeArr = document.getElementsByClassName('cause');
           for(var i=0;i<causeArr.length;i++){
              (function(j){
                    if(causeArr[j].innerText=='0'){
                      pass[j].innerHTML="不可以使用";
                    }
                     else{
                       pass[j].innerHTML="可以使用"
                     }
              })(i)
           }
          
        </script>
        
     </li><?php endforeach; endif; ?> 
  </ul>
<!-- 信息展示结束 -->    
   

  <!--  这里是页脚里面的部分的开始 -->
   <div style="width:100%;height:3rem;"></div>
    <table  id="footer" class="choice">
     <tr>
          <td>
          <img src="/qiyue/Public/Images/book.png"  alt="" style="background-color: #385A9A;" />
          <a href="/qiyue/index.php/Home/Index/index"><p>首页</p></a>
          </td>
          <td>
          <img src="/qiyue/Public/Images/book.png"  alt="" style="background-color: #D1473A;" />
          <a href="/qiyue/index.php/Home/OrderForm/ViewOrderForm"><p>订单</p></a>
          </td>
        <td>
          <img src="/qiyue/Public/Images/book.png"  alt="" style="background-color: #409AFA;" />
          <a href="/qiyue/index.php/Home/Person/Person"><p>我的</p></a>
          </td>
     </tr>
   </table>

  <!--  这里是页脚里面的部分的结束 -->
</body>
</html>