/*! jQuery.Simples3D (http://memocarilog.info/jquery/6014)
 * lastupdate: 2014-04-09
 * author: Saori Miyazaki http://memocarilog.info 
 * License: MIT 
*/
 
;(function($, undefined){

	$.fn.simple3D = function(options){
		
		var thisObj = this;
				
		var opts = $.extend({}, $.fn.simple3D.defaults, options );
			
		$(function(){	
	       
	        if (thisObj.length == 0) return false;
	        var item = thisObj[0];
		   	
			var childWidth = $(item).children().width()
			var childHeight = $(item).children().height()   
			
			var parentWidth = thisObj.width();
			var parentHeight = thisObj.height();
			
			var offset_x = childWidth - parentWidth;
			var offset_y = childHeight - parentHeight;
			
			var itemChild = thisObj.children();		
			
			if( opts.bgImage == false){	
				
				// childのスタート位置を設定
				var startX = (parentWidth -  childWidth) / 2;
				var startY = (parentHeight -  childHeight) / 2;
				thisObj.css({
					"position": "relative",
					"overflow": "hidden"
				});
				itemChild.css({
					"position": "absolute",
					"left":startX,
					"top":startY
				});
				
			// 	background true だったとき
			}　else {	
				thisObj.css({
					"overflow": "hidden"
				});
				itemChild.css({
					"position": "absolute",
					"left": itemChild.position().left,
					"top": itemChild.position().top,
					"background-position": "0px 0px"
				});
			}　//　background true だったとき終わり 
			if (opts.moveX > 5 || opts.moveY > 5) return false;
			var sort = [5, 4, 3, 2, 1];
			opts.moveX = sort[parseFloat(opts.moveX)-1];
	       	opts.moveY = sort[parseFloat(opts.moveY)-1];
			opts.moveX = Math.floor(opts.moveX) *6 / 10 + 1 ;
			opts.moveY = Math.floor(opts.moveY) *6 / 10 + 1 ;
			
			// 対象エリアをdocument全体にするか、指定エリアだけにするか
			var targetArea = (opts.targetAll == true) ? $(document) : thisObj ;
			
			// カーソルが動いた時の処理以下
			targetArea.mousemove(function(e){
					
					var cursorX = e.clientX - thisObj.offset().left;					
					cursorX = (cursorX > parentWidth) ? parentWidth : cursorX ;				
					var centerX = (cursorX / parentWidth * offset_x) - offset_x / 2 ;
					
					var cursorY = e.clientY - thisObj.offset().top + $('html').scrollTop();
					cursorY = (cursorY > parentHeight) ? parentHeight : cursorY ;							
					var centerY = (cursorY / parentHeight * offset_y) - offset_y / 2;
				 
					for (var i=1; i<= itemChild.length; i++){				
						
						if( opts.bgImage == false){							
							
							// Xの移動値算出と移動	
							var childLeft = parseFloat($(itemChild[i-1]).css('left'));													
							var newLeft =  centerX * (i / itemChild.length) - offset_x / 2;
							newLeft = Math.floor( (newLeft + childLeft) / opts.moveX );
							newLeft = (opts.reverseX == false) ? newLeft : -newLeft ;
							$(itemChild[i-1]).css('left', newLeft);
							
							// Yの移動値算出と移動	
							var childTop = parseFloat($(itemChild[i-1]).css('top'));
							var newTop = centerY * (i / itemChild.length) - offset_y / 2;
							newTop = Math.floor( (newTop + childTop) / opts.moveY );
							newTop = (opts.reverseY == false) ? newTop : -newTop ;
							$(itemChild[i-1]).css('top', newTop );
							
						} else {
						// backgroundを動かす場合										
						
							// Xの移動値算出	
							var bgPosX = parseFloat($(itemChild[i-1]).css('left'));
							var newLeft =  centerX * (i / itemChild.length) - offset_x / 2;
							newLeft = Math.floor( (newLeft + bgPosX) / opts.moveX );
							newLeft = (opts.reverseX == false) ? newLeft : -newLeft ;															
							// Yの移動値算出	
							var bgPosY = parseFloat($(itemChild[i-1]).css('top'));
							var newTop = centerY * (i / itemChild.length) - offset_y / 2　;
							newTop = Math.floor( (bgPosY + newTop)  / opts.moveY  );
							newTop = (opts.reverseY == false) ? newTop : -newTop ;
							
							// 背景画像移動
							$(itemChild[i-1]).css('background-position',newLeft+'px ' + newTop +'px');
									
						} // backgroundを動かす場合ここまで
					} // for文ここまで
			});	// カーソルが動いた時の処理ここまで
		});
	return this;		
	};
	
	// デフォルト値設定
	$.fn.simple3D.defaults = {
		moveX: 3 ,
		moveY: 3 ,
		bgImage: false,
		targetAll: false,
		reverseX: false,
		reverseY: false
	};	

})(jQuery);

	$("#simple3D").simple3D({
		moveX:5,
		moveY:3,
		bgImage:false,
		targetAll:true,
		reverseX: true,
		reverseY: true
	});






	$(document).ready(function(){$(".navbar-toggler").on("click",function(a){a.preventDefault(),$(".navbar").addClass("sticky")}),$('a[href^="#"]').on("click",function(a){a.preventDefault();var o=this.hash,s=$(o);$("html, body").stop().animate({scrollTop:s.offset().top-79},900,"swing"),$(".navbar-collapse.collapse").removeClass("show")}),$(window).scroll(function(){0<$(window).scrollTop()?$(".navbar").addClass("sticky"):$(".navbar").removeClass("sticky"),50<$(window).scrollTop()?$(".scroll-to-top").addClass("affix"):$(".scroll-to-top").removeClass("affix")});var a=$(".carousel-item"),o=$(window).height();a.eq(0).addClass("active"),a.height(o),a.addClass("full-screen"),$(".carousel img").each(function(){var a=$(this).attr("src"),o=$(this).attr("data-color");$(this).parent().css({"background-image":"url("+a+")","background-color":o}),$(this).remove()}),$(window).on("resize",function(){o=$(window).height(),a.height(o)})});



	
$(function() {
    $(window).scroll(function () {
		$('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
	});
});