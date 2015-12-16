define(function(require, exports, module) {
	'use strict';
	var $ = require("jquery")
	$.fn.extend({
		clock: function(time,xInt,yInt) {
			var str="<div class='timer'><span>00</span><i>:</i><span>00</span><i>:</i><span>00</span></div>"
			var $room = this.append(str);					          //父容器框-加入倒计时结构
			var $box= $room.find(".timer").css("display","block"); 	  //倒计时框-显示
			$room.css("position","relative")						  //父容器定位
			$box.css({"left":(xInt/40+"rem"),"top":(yInt/40+"rem")})  //计时器定位
			var timer = setInterval(function() {
				time--;
				if (time > 0) {
					var h=parseInt(time / 3600)
					var m=parseInt((time % 3600) / 60)
					var s=Number(time % 3600) % 60
					if(h<10){
						$room.find(".timer span:eq(0)").text("0"+h)
					}else{
						$room.find(".timer span:eq(0)").text(h)
					}
					if(m<10){
						$room.find(".timer span:eq(1)").text("0"+m)
					}else{
						$room.find(".timer span:eq(1)").text(m)
					}
					if (s<10) {
						$room.find(".timer span:eq(2)").text("0"+s)
					} else{
						$room.find(".timer span:eq(2)").text(s)
					}
				} else {
					clearInterval(timer)
					$box.remove()
					$room.find(".aBtn").css("display","block")
				}
			}, 1000)
		}
	})
});