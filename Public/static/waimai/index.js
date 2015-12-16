define(function(require, exports, module) {
	'use strict';
	   var $ = require("jquery"),
//	   laytpl = require("/Public/static/waimai/laytpl.js"),
	   	// _ = require("/Public/static/waimai/TouchSlide.1.1.source.js"),
      
      TouchSlide = require("/Public/static/waimai/TouchSlide.1.2.source.js"), 
	    _ = require("/Public/static/waimai/jquery.lazyload.js"),
	    _ = require("../module/sideBar.js"),
	    _ = require("../module/custom.js"),
	    _ = require("../module/timer.js"),
//	    _ = require("/Public/static/waimai/jquery.cookie.js"),
	    _ = require("/Public/static/waimai/swiper.jquery.min.js"),
		_ = require("../module/newUser.js")

	var pop_status = $("body").data("newreg");
	console.log(pop_status);
	    if(pop_status == 1){
			$('.content').newRegister(function(){window.location.href="index.php?c=tuiguang&a=run";});
	    } else if (pop_status == 2) {
			$('.content').zclayer(10,10,"index.php?c=user&a=myvochers");
		}
	
	var _interTime=3000;	//轮播图切换延迟时间
	TouchSlide({ 
		slideCell:"#focus",
		titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd ul", 
		effect:"left", 
		interTime:_interTime,
		autoPlay:true,//自动播放
		autoPage:true, //自动分页
		switchLoad:"_src" //切换加载，真实图片路径为"_src" 
	});
	
	TouchSlide({ 
		slideCell:"#banner",
		titCell:".hd2 ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd2 ul", 
		effect:"left", 
		interTime:_interTime,
		autoPlay:true,//自动播放
		autoPage:true, //自动分页
		switchLoad:"_src" //切换加载，真实图片路径为"_src" 
	});
	
     $(".lazy").lazyload({
         effect : "fadeIn"
     });
	
	//------轮播图自动滚动---------//
	var myswiper = new Swiper('.swiper-container', {
        loop : true,
        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 0,
        grabCursor: true,
        onSlideChangeEnd: function(swiper){
         $(".lazylike").lazyload({});
          $(".lazy").lazyload({});
        }
    });
    var times;
    setime();
    function setime(){
    	times = setInterval(myswiper.slideNext,3000);
    }
    $(".swiper-container").on('touchstart',function(){
    	clearInterval(times);
    });
     $(".swiper-container").on('touchend',function(){
     	setime();
    });
    
   //首页新闻轮播
    var all = $(".title .mymarquee a").length;
    var mytop  = -1.145;
    var num = 0;
   function marqueeTime(){
   	num++;
   	num<all?num:num=0;
	$('.title .mymarquee a').animate({top: mytop*num+'rem'},{duration: 500})
   }
    window.setInterval(marqueeTime,3000);
     //倒计时
     
   	var bol=$(".dayHot").data("bol");
   	if(bol==1){
   		$(".dayHot").find(".aBtn").css("display","none")
   		$(".dayHot").find("#dBtn").css("display","block")
   	} else {
      var time=$(".dayHot").data("times");
      $(".dayHot").clock(time,28,85);
    }
   	
   	//夜总会倒计时
    var dateTime=new Date();
    var h=(20-dateTime.getHours())*60*60;
    var m=dateTime.getMinutes()*60;
    var s=dateTime.getSeconds();
    var nightTime=h-m-s;
    $(".picBanner").clock(nightTime,28,140);
   	// var time2=new Date()
   	// var h=20-time2.getHours();
   	// var f=60-time2.getMinutes();
   	// var m=60-time2.getSeconds();
   	// var alltime=(m+f*60+h*60*60);
   	// $(".picBanner").clock(alltime,28,140);
   	
//   $.cookie('uin', '18670728459', {path: '/' });
     
//var data1 = {
//  title: '前端攻城师',
//  list: [{name: '贤心', city: '杭州'}, {name: '谢亮', city: '北京'}, {name: '浅浅', city: '杭州'}, {name: 'Dem', city: '北京'}]
//};
//
//
//var gettpl = document.getElementById('demo1').innerHTML;
//laytpl(gettpl).render(data1, function(html){
//  document.getElementById('view1').innerHTML = html;
//});

});