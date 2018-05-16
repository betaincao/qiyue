window.onload=function(){
			var choice = document.querySelectorAll(".choicebtn");
			var box = document.querySelectorAll(".choice-box");
			for (var i = choice.length - 1; i >= 0; i--) {
				choice[i].index=i;
				choice[i].onclick=function(){
                      for (var j = box.length - 1; j >= 0; j--) {
					      box[j].style.display="none";
				   }
				   box[this.index].style.display="block";
				}
			}
		}