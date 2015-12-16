 define(function(require, exports, module) {
	'use strict';
var $ = require("jquery"),
    _ = require("../plug/jquery.easing.1.3.mine.js"),
	_ = require("../plug/custombox.min.js"),
	_ = require("../module/custom.js")
 //侧栏弹框
var showBtn="footer a:last-child" //显示按钮
var model=".sidebar .myPageBg"              //模态框(按钮2)
var box=".sidebar .myPage"        //模态内容框
var main=".sidebar"                  //主体内容   
	 $('#myinfo').on('click', function(e) {
		 if ($('body').data('goballogin')) {
			 var bol=$(main).css("display")
			 if(bol=="none"){
				 $(main).css("display","block").animate({opacity:1})  //缓动出现模态框
				 $(box).animate({left:'0px',opacity:1},{duration:500,easing: 'easeInOutQuint'})
			 }
			 if(bol=="block"){
				 $(main).css("display","none").animate({opacity:0})  //缓动出现模态框
				 $(box).animate({left:'-1200px',opacity:0},{duration:500,easing: 'easeInOutQuint'})
			 }
		 } else {
			 window.location.href='/index.php?c=tuiguang&a=run';
		 }
	 });
	 $(model).click(function(){
		 var bol=$(main).css("display")
		 if(bol=="block"){
			 $(main).css("display","none").animate({opacity:0})  //缓动出现模态框
			 $(box).animate({left:'-1200px',opacity:0},{duration:500,easing: 'easeInOutQuint'})
		 }
	 })
	 /*查看余额*/
	
	 $('.cont-bottom span').on('click',function(){
		 if($(this).text() == '余额：点击查看'){
			 $.post('index.php?c=user&a=getmoney',{
			 },function(data){
				 if(data.result){
					 $('.cont-bottom span').html('余额：'+data.result.money+'元');
				 }
			 },'json')
			 return;
		 }
	 })
	 $('#btn_get_yzms').on('click',function(){
		 if(!checkmobile($('input[name="mobile"]').val())){
			 $('input[name="mobile"]').focus();
			 //showalertmsg('手机号码格式不正确',2000,'no');
			 $.customBounce.del("1","手机号码格式不正确","&#xe625;");

			 return false;
		 }
		 if($('input[name="piccode"]').val() == ''){
			 $('input[name="piccode"]').focus();
			 //showalertmsg('请先填写图形验证码',2000,'no');
			 $.customBounce.del("1","请先填写图形验证码","&#xe625;");
			 return false;
		 }
		 $('#btn_get_yzms').attr('disabled',true).html('正在发送中..');
		 $.post('/index.php?c=publics&a=sendmobile',{
			 'mobile':$('input[name="mobile"]').val(),
			 'piccode':$('input[name="piccode"]').val()
		 },function(data){
			 if(data.result){
				 timeload();
			 }else{
				 //showalertmsg(data.error.msg,2000,'no');
				 alert(data.error.msg);
				 $('#__picchanged').attr('src',"/index.php?c=publics&a=vcode"+'&times='+parseInt(100*Math.random()));
				 $('#btn_get_yzms').removeAttr('disabled').html('获取验证码');
				 return;
			 }
		 },'json')
	 })

	 $('#__picchanged').on('click',function(){
			$(this).attr('src',"index.php?c=publics&a=vcode"+'&times='+parseInt(100*Math.random()));
	 })
	 
	 $('#_login').on('click',function(){
		 //检查手机
		 if(!checkmobile($('input[name="mobile"]').val())){
			 $('input[name="mobile"]').focus();
			 alert('手机号码格式不正确');
			 return;
		 }
		 //检查验证码
		 if(!checkcode($('input[name="code"]').val())){
			 $('input[name="code"]').focus();
			 alert('验证码不正确');
			 return;
		 }


		 $(this).attr('disabled',true).html('正在确认中...');
		 //发送数据
		 $.post('/index.php?c=login&a=regin',{
			 "mobile":$('input[name="mobile"]').val(),
			 "code":$('input[name="code"]').val(),
		 },function(data){
			 if(data.result){
				 $('body').data('goballogin',1);
				 window.location.reload();
				 return;
			 }else{
				 $('#__picchanged').attr('src',"/index.php?c=publics&a=vcode"+'&times='+parseInt(100*Math.random()));
				 alert(data.error.msg);
				 $('input[name="mobile"]').focus();
				 $('#_login').removeAttr('disabled').html('确认');
				 return;
			 }
		 },'json');
		 return;
	 });
	 $('#_cancel').on('click',function(){
		 Custombox.close();
	 })


	 //检查手机号码是否正确
	 function checkmobile(mob){
		 if(mob==""){
			 return false;
		 }
		 if(mob!=""){
			 var reg = /^1[3|4|5|7|8][0-9]{9}$/;
			 if(!reg.test(mob)){
				 return false;
			 }
		 }
		 return true;
	 }

//检查是一个6位的数字
	 function checkcode(intcode){
		 if(intcode==""){
			 return false;
		 }
		 if(intcode!=""){
			 var reg = /^[0-9]{6}$/;
			 if(!reg.test(intcode)){
				 return false;
			 }
		 }
		 return true;
	 }
	 //倒计时发送
	 function timeload(){
		 var backtime = 60;
		 var int=self.setInterval(function(){
			 backtime--;
			 if(backtime < 0){
				 $('#btn_get_yzms').removeAttr('disabled').html('获取验证码');
				 window.clearInterval(int);
			 }else{
				 $('#btn_get_yzms').html(backtime+'秒后重新发');
			 }
		 },1000);
	 }
	 
	 	function getPositionSuccess(position){
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            $.get('index.php?c=publics&a=location',{
            	'lat':lat,
            	'lng':lng
            },function(data){
            	//TODO
            	
            },'json')
    }
            
            
            
    function getPositionError(error){
        switch(error.code){
            case error.TIMEOUT :
                //dom.info.innerHTML = "连接超时，请重试";
                break;
            case error.PERMISSION_DENIED :
                //dom.info.innerHTML = "您拒绝了使用位置共享服务，查询已取消";
                break;
            case error.POSITION_UNAVAILABLE : 
                //dom.info.innerHTML = "亲爱的火星网友，非常抱歉<br />我们暂时无法为您所在的星球提供位置服务";
                break;
        }
    }

    if(!$('body').data('hasgetlocation ')){ //没有取得地址位置信息
		if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(getPositionSuccess,getPositionError,{
            	timeout:5000
            });
        }
	}

});


