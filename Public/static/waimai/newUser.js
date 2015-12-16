define(function(require, exports, module) {
	'use strict';
	   var $ = require("jquery")
	  	$.fn.extend({
		addPack: function(callback){
			var skin = '<style>'
			+'.suspend{position: fixed;bottom:'+300/40+'rem'+';right:0;}'
			+'.my_pic{width:'+147/40+'rem'+';height:'+108/40+"rem"+'}'
			+'#close{display:block;width:'+20/40+'rem'+';height:'+20/40+'rem'+';position:absolute;background-color:#ff4e1f;border-radius: 50%;left: '+120/40+'rem'+';color: #FFFFFF;line-height: '+16/40+'rem'+';    font-size: 0.6rem;text-align: center;}'
			+'.suspend img{width: 80%;animation: dome 2s infinite;-webkit-animation: dome 2s infinite;-moz-animation: dome 2s infinite;-ms-animation: dome 2s infinite;-o-animation: dome 2s infinite;}'
			+'@keyframes dome {0% {transform: rotate(-8deg);-webkit-transform: rotate(-8deg);-moz-transform: rotate(-8deg);-o-transform: rotate(-8deg);}50% {transform: rotate(8deg);-webkit-transform: rotate(8deg);-moz-transform: rotate(8deg);-o-transform: rotate(8deg);}100% {transform: rotate(-8deg);-webkit-transform: rotate(-8deg);-moz-transform: rotate(-8deg);-o-transform: rotate(-8deg);}}@-webkit-keyframes dome {0% {transform: rotate(-8deg);-webkit-transform: rotate(-8deg);-moz-transform: rotate(-8deg);-o-transform: rotate(-8deg);}50% {transform: rotate(8deg);-webkit-transform: rotate(8deg);-moz-transform: rotate(8deg);-o-transform: rotate(8deg);}100% {transform: rotate(-8deg);-webkit-transform: rotate(-8deg);-moz-transform: rotate(-8deg);-o-transform: rotate(-8deg);}}'
			+'</style>';
			var dom = '<div class="suspend">'+
    	    '<span id="close">x</span>'+
    	    '<div class="my_pic">'
    	    +'<img id="go" src="/public/img/main/index/newuser.png">'
    	    +'</div>'
    	    +'</div>';
    	    $(this).append(skin);
           $(this).append(dom);
           $('#close').on('click',function(){
           	$('.suspend').css('display','none');
           });
           $('#go').on('click',function(){
           	callback();
           });
		},
		//注册送红包弹框
		newRegister: function(callback){
			var skin = '<style>.czbg{position: fixed;z-index: 9998;top: 0;width:100%;height:100%;background-color:rgba(0, 0, 0, 0.5)}.czbg img{width:16rem;height:28.675rem;margin: 0 auto;display: block;}.czbg .myclose{display: block;position: absolute;width: 1.5rem;height: 1.5rem;top: 7rem;right: 0.7rem;}.czbg .myurl{display: block;position: absolute;width: 7.5rem;height: 1.8rem;top: 13.9rem;right: 4rem;}</style>';
			var dom = '<div class="czbg"><img src="/public/img/main/index/new.png"/><a class="myclose"></a><a class="myurl"></a></div>';
    	    $(this).append(skin);
           $(this).append(dom);
           $('.myclose').on('click',function(){
           	$('.czbg').css('display','none');
           });
           $('.myurl').on('click',function(){
           	callback();
           });
		},
		//注册成功弹框
		zclayer: function(num1,num2,url){
			var skin = '<style>.zcLayerBg{ width: 100%; height: 100%; position: fixed;left: 0; top: 0; background: #000000; opacity: 0.8; z-index: 5;}.zcLayer{ width: 14rem; height: 10.075rem; position: fixed; left: 50%; top: 30%;z-index: 6;text-align: center;background: url(/public/img/main/index/zc.png) no-repeat center center;background-size:100% 100%; margin-left:-7rem;font-family: "microsoft yahei";}.zcLayer h4{ color: #374853; font-size: 0.75rem; margin: 1.3rem 0 1.05rem 0;}.zcLayer p{color: #374853; font-size: 0.75rem; }.zcLayer p.p1{ color: #ff0000;}.zcLayer p.p2{ color: #374853;margin: 0.5rem 0 1rem 0;}.zcLayer p i{font-weight: bold;}.zcLayer button{ width: 5.5rem; height: 1.75rem; line-height: 1.75rem; background: #364854; color: #fff; font-size: 0.7rem;border: none;border-radius: 0.2rem;-webkit-border-radius: 0.2rem;-mos-border-radius: 0.2rem;-mz-border-radius: 0.2rem;-o-border-radius: 0.2rem; margin: 0 0.25rem;}</style>';
			var dom = '<div class="zcLayerBg"></div><div class="zcLayer"><h4>恭喜您注册成功！</h4><p class="p1">获得<i>'+num1+'</i>云厨币(等同现金)</p><p class="p2">获得<i>'+num2+'</i> 元优惠券(全场通用)</p><button class="btn1">马上逛逛</button><button class="btn2">查看优惠券</button></div>';
    	    $("head").append(skin);
            $(this).append(dom);
           $('.zcLayerBg,.zcLayer .btn1').on('click',function(){
	           	$('.zcLayerBg').css('display','none');
	           	$('.zcLayer').css('display','none');
           });
          $('.zcLayerBg,.zcLayer .btn2').on("click",function(){
          	window.location.href=url;
          })
		}
	})
});
