//底部按钮


//选项卡
function tab() {
    var divshow = document.getElementsByClassName('content')[0].getElementsByClassName('show')[0];
    var lis = divshow.getElementsByTagName('a');
    var divs = divshow.getElementsByTagName('div');
    for (var i = 0; i < 3; i++) {
        lis[i].index = i;
        lis[i].onclick = function () {
            for (var k = 0; k < 3; k++) {//先清空所有的样式
                lis[k].classList.remove('chose');
                divs[k].style.display = 'none';
            }
            //给当前的按钮和div添加样式
            this.classList.add('chose');
            divs[this.index].style.display = 'block';
        };
    }
}
window.onload=function(){
    save();
    tab();
}