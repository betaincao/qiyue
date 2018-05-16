   // let laboratory = document.querySelectorAll(".laboratory");
   // let  contentBox = document.getElementById("app"); 
   //  for (let i = laboratory.length - 1; i >= 0; i--) {
   //    laboratory[i].getElementsByTagName('a')[0].addEventListener('click',function(event){
   //        event.preventDefault();
   //        loadXMLDoc(laboratory[i].getElementsByTagName('a')[0].getAttribute("href"));
   //    });
   //  };

   //  //这里是发起ajax请求的
   //    function loadXMLDoc(href)
   //  {
   //    contentBox.innerHtml="";
   //    var xmlhttp;
   //    if (window.XMLHttpRequest)
   //    {
   //      //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
   //      xmlhttp=new XMLHttpRequest();
   //    }
   //    else
   //    {
   //      // IE6, IE5 浏览器执行代码
   //      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   //    }
   //    xmlhttp.onreadystatechange=function()
   //    {
   //      if (xmlhttp.readyState==4 && xmlhttp.status==200)
   //      {
   //        console.log(xmlhttp.responseText);
   //         var answer=jsonToArray(xmlhttp.responseText);
   //         for (let j = answer.length - 1; j >= 0; j--) {
   //             var box = document.createElement('div');
   //             var img = document.createElement('img');
   //             var p = document.createElement('p');
   //             p.innerText=answer.a_name;
   //             img.setAttribute('src',answer.a_photo);
   //             box.appendChild(img);
   //             box.appendChild(p);
   //             contentBox.appendChild(box);

   //         }
   //      }
   //    }
   //    xmlhttp.open("POST","__APP__/Home/ApplianceInfo/LaboratoryAppliance",true);
   //    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   //    xmlhttp.send(href);
   //  };

   //  // 将json转化为数组
   //  function jsonToArray (str) {
   //      const obj = JSON.parse(str);
   //      const result = [];
   //      for (let key in obj) {
   //          result.push(key);
   //          result.push(obj[key]);
   //      }
   //      return result;
   //  }