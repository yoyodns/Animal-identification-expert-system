 define(function(require, exports, module) {
	'use strict';
	var $ = require("jquery") 
/**************************************************************默认弹框**************************************************/
	$.customBounce ={
		del:function(btn,content,icon){
		var sty="<style type='text/css'>.del{width:30%;line-height: 135%;padding:1% 0;background:rgba(0,0,0,0.5);border-radius:6px;-webkit-border-radius:6px;opacity:0;position:fixed;left:45%;top:45%;margin-left:-7.5%;transition:all 0.5s ease;color:#fff;font-family:'microsoft yahei';font-size:0.8rem;text-align:center;display:none;z-index:55;color:#fff; }.del p i{font-size:1rem;color:#fff }</style>"
		var htm="<div class='del'><p><i class='iconfont'></i></p><p></p></div>"
		$("head").append(sty)//插入默认弹框样式
		$("body").append(htm)//插入默认弹框结构
		$(".del p:first-child i").html(icon)
		$(".del p:last-child").text(content).css("color","#fff")
		if(btn==""){
			$(".del").css("display","block").animate({opacity:1},100,function(){
				setTimeout(timerFunc,2000)
			})
		}else{
			$(btn).click(function(){
				$(".del").css("display","block").animate({opacity:1},100,function(){
					setTimeout(timerFunc,2000)
				})
			})
		}
		
		function timerFunc(){
			$(".del").css({"display":"none",opacity:0})
		}
	},
		cus:function(btn,className,txt,func){
		var wid=$(className).width()
		var hei=$(className).height()
		var marginW=-wid/2
		var marginH=-hei/2
		var h=$(window).height()/2
		$(className).css({"position":"fixed","left":"50%","top":h,"margin-left":marginW,"margin-top":marginH,"opacity":0,"z-index":555})
		$(".box .tit").text(txt)
		$(btn).click(function(){
			$(btn).attr("disabled",true); 
			$(className).css({'width':wid/2,'height':(hei/2),"margin-left":-wid/4,"margin-top":-(hei/4),"display":"block"})
			$(className).css("display","block").animate({opacity:1,width:wid,height:hei,marginLeft:marginW,marginTop:marginH},200)
		})
		$(".okBtn,.delBtn").on("click",function(){
			$(className).css({"display":"none",opacity:0})
			$(btn).attr("disabled",false); 
			var name=$(this).attr("class")
			if(name=="okBtn"){
				func();
			}
		})
	},
	login:function(className){
		$('body').prepend('<div id="customBg" style="width: 100%;height: 100%;z-index:554;position:fixed;background-color: rgba(0, 0, 0, 0.6);"></div>');
		$("footer").css('display','none');
		$('#customBg').on('click',function(){
			$("footer").css('display','block');
			$(className).css({"display":"none",opacity:0})
			$('#customBg').remove();
		});
		var wid=$(className).innerWidth();
		var hei=$(className).innerHeight();
		var marginW=-wid/2
		var marginH=-hei/2
		var h=$(window).height()/2
		$(className).css({"position":"fixed","left":"50%","top":h,"margin-top":marginH,"margin-left":marginW,"opacity":0,"z-index":555})
		$(className).css("display","block").animate({opacity:1},200)
		$("#_login,#_cancel").on("click",function(){
			$('#customBg').remove();
			$("footer").css('display','block');
			$(className).css({"display":"none",opacity:0})
//			$(btn).attr("disabled",false); 
//			var name=$(this).attr("id")
//			if(name=="_login"){
//			}
		})
		
	}
}
});
