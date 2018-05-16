window.onload=function(){
        var xmlhttp;
        var reason = document.getElementById('reason');
        var resort = document.getElementById("resort");
        if (window.XMLHttpRequest)
        {
          //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
          xmlhttp=new XMLHttpRequest();
        }
        else
        {
          // IE6, IE5 浏览器执行代码
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
              if(xmlhttp.responseText=="1"){

              }
              else{
                
              }
          }
        }
        xmlhttp.open("GET","",true);
        xmlhttp.send();

  }