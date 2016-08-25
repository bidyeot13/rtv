<!doctype html>
<html>
<head><title><?php  echo $title;  ?> | RTV Online</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">    
	<meta name="keywords" content=""/>
	<meta name="distribution" content="Global"/>
	<meta name="description" content=""/>
	<meta name="robots" content="ALL"/>
	<meta name="robots" content="index, follow"/>
	<meta name="googlebot" content="index, follow"/>
	<meta http-equiv="refresh" content="1000"/>
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<script>if(top.location!= self.location) {top.location = self.location.href}</script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-3.3.0.min.css" media="all">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jasny-bootstrap.min.css" media="all">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome-4.2.0.min.css" media="all">
	<link rel="stylesheet" href="<?php echo base_url(); ?>templates/v1/css/style-1.0.css" media="all">
	<link rel="stylesheet" href="<?php echo base_url(); ?>templates/v1/css/rtvstyle.css" media="all">
	<link rel="stylesheet" href="<?php echo base_url(); ?>lib/opinion-poll/simple_poll.css" media="all"> 

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-3.3.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jasny-bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/pie-chart.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/phoneticunicode.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/unijoy.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/rtvjs.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>lib/opinion-poll/script.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>



<script type="text/javascript">



$(document).ready(function(){
	$("ul.header_top_menu li").hover(
		function(){$(this).find('ul').stop(true, true).show(); },
		function (){$(this).find('ul').hide();}
		);
});


function mega_menu_summary(cat_id,pid){
	var URL = '<?php echo base_url(); ?>templates/rtv-v1/ajax/mega_menu_summary.html';

	$.ajax({
		url:URL,
		type:"POST",
		data:{cat_id:cat_id},
		beforeSend:function(){
			$('div.mega_list_block > #sub_mega_sum-'+pid).html('<div style="padding:10px; text-align:left">লোডিং...</div>');
		},
		success:function(msg){
			$('div.mega_list_block > #sub_mega_sum-'+pid).html(msg);
		},			 	
		error:function(jqXHR, textStatus, errorMessage){
		}			
	});
}

function google_search(srchInputElm){
	var keyword = srchInputElm.val().trim().toLowerCase().replace(/\s/g,'+');
	if(keyword==''){
		srchInputElm.css({'background':'#FF9','color':'#444'}).focus()
	}else{
		var URL = 'http://67.227.189.112/~rtvnews24/search/google/?q='+keyword+'&cx='+encodeURIComponent('partner-pub-2223768610047094:1073516270')+'&cof='+encodeURIComponent('FORID:10')+'&ie=UTF-8&sa=Search';
		window.location.href = URL;
	}
}    

$(function(){

	$('div.mega_list_block > div.sub_mega_list > ul > li').hover(function(){			
		if(!$(this).hasClass('active')){
			var cat_id 	= $(this).attr('data-val');
			var pid		= $(this).attr('parent-data');
			$('div.mega_list_block > div.sub_mega_list > ul > li').removeClass('active');
			$(this).addClass('active');
			if(cat_id>0) mega_menu_summary(cat_id,pid);
		}
	});
	
	$('#menu_category > ul > li.mega_parent').hover(function(){			
		var pos = $('div.mega_list_block',this).position();
			// setup compare position
			var com_pos = pos.left+450, limit_pos = 990;
			if(com_pos>limit_pos){
				var diff_pos = com_pos - limit_pos;
				$('div.mega_list_block',this).css('margin-left','-'+diff_pos+'px');
			}
			
			$('div.mega_list_block > div.sub_mega_list > ul > li').removeClass('active');
			var cat_id 	= $('div.mega_list_block > div.sub_mega_list > ul > li:first-child',this).addClass('active').attr('data-val');
			var pid 	= $('div.mega_list_block > div.sub_mega_list > ul > li:first-child',this).addClass('active').attr('parent-data');
			if(cat_id>0) mega_menu_summary(cat_id,pid);
		});

	var corner_index = 0;
	var last_index = $('#top_content .top_corner_news > ul > li:last-child').index();

	var corner_news_interval = setInterval(function(){
		var cur_index = $('#top_content .top_corner_news > ul > li:visible').index();		
		var nxt_index = cur_index + 1;
		if(nxt_index>last_index) nxt_index = 0;
		$('#top_content .top_corner_news > ul > li:eq('+(cur_index)+')').fadeOut();
		$('#top_content .top_corner_news > ul > li:eq('+(nxt_index)+')').fadeIn();
	},1000*5);

	var brk_list_width = 0;
	$('.headlines li').each(function(index, element) {
		brk_list_width = brk_list_width + $(this).innerWidth() + 25;
	});

	$('.headlines ul').css('width',brk_list_width);

	var total_hl_list_width = 0;
	$('.hl_list li').each(function(index, element) {
		total_hl_list_width = total_hl_list_width + $(this).innerWidth() + 25;
	});

	$('.hl_list ul').css('width',total_hl_list_width);

	$('#details_content .rpt_info_section > div.rpt_more').click(function(){
		if($('i',this).hasClass('fa-arrow-circle-o-down')){
			$('i',this).removeClass('fa-arrow-circle-o-down').addClass('fa-arrow-circle-o-up');
			$('#details_content .rpt_info_section > div.rpt_more_list_block').slideDown();	
		}else{
			$('i',this).removeClass('fa-arrow-circle-o-up').addClass('fa-arrow-circle-o-down');
			$('#details_content .rpt_info_section > div.rpt_more_list_block').slideUp();						
		}
	});

	var cur_dtl_font_size = 15, dtl_font_low_limit = 15, dtl_font_high_limit = 30;
	$('#details_content .smallFontIcon').click(function(){
		if((cur_dtl_font_size - 1) >= dtl_font_low_limit){
			cur_dtl_font_size 		= cur_dtl_font_size - 1;
			var line_hght_size 		= cur_dtl_font_size + 4;
			$('#details_content .dtl_section').css({
				'font-size' 	: cur_dtl_font_size + 'px',
				'line-height'	: line_hght_size + 'px'
			});
		}
	});
	
	$('#details_content .bigFontIcon').click(function(){						
		if((cur_dtl_font_size + 1) <= dtl_font_high_limit){
			cur_dtl_font_size 		= cur_dtl_font_size + 1;
			var line_hght_size 		= cur_dtl_font_size + 4;
			$('#details_content .dtl_section').css({
				'font-size' 	: cur_dtl_font_size + 'px',
				'line-height'	: line_hght_size + 'px'
			});
		}
	});
	
	$('#details_content .dtl_section > .dtl_img_section > ul > li.pre-photo').click(function(){						
		var cur_photo_obj = $('#details_content .dtl_section > .dtl_img_section > ul > li.active');
		var cur_photo_index = cur_photo_obj.index();			
		var pre_photo_obj = $('#details_content .dtl_section > .dtl_img_section > ul > li.photo:nth-child('+(cur_photo_index)+')');
		if(pre_photo_obj.hasClass('photo')){
			$(cur_photo_obj).removeClass('active').fadeOut();
			$(pre_photo_obj).addClass('active').fadeIn();
		}else{
			var album_url = $(this).attr('data-album-url');
			window.location.href = album_url;
		}
	});
	
	$('#details_content .dtl_section > .dtl_img_section > ul > li.nxt-photo').click(function(){						
		var cur_photo_obj = $('#details_content .dtl_section > .dtl_img_section > ul > li.active');
		var cur_photo_index = cur_photo_obj.index();			
		var nxt_photo_obj = $('#details_content .dtl_section > .dtl_img_section > ul > li.photo:nth-child('+(cur_photo_index+2)+')');
		if(nxt_photo_obj.hasClass('photo')){				
			$(cur_photo_obj).removeClass('active').fadeOut();
			$(nxt_photo_obj).addClass('active').fadeIn();
		}else{
			var album_url = $(this).attr('data-album-url');
			window.location.href = album_url;
		}
	});				
	

	$('.most_view_tab_block .second-layer .btn').click(function(){
		var rpt_type = '';
		if($('.most_view_tab_block .most_clicks').hasClass('active')){
			if(!$(this).hasClass('active')){					
				if($(this).hasClass('news')) var URL = 'templates/rtv-v1/ajax/most_viewed_news38f0.html?cat_id=';
				else if($(this).hasClass('videos')) var URL = 'templates/rtv-v1/ajax/most_viewed_videos.html';
				else if($(this).hasClass('photos')) var URL = 'templates/rtv-v1/ajax/most_viewed_photos.html';
				
				$('.most_view_tab_block .second-layer .btn').removeClass('active');
				$(this).addClass('active');
				
				if($('.most_view_tab_block .third-layer .btn.active').hasClass('todays')) var data = 'todays';
				else if($('.most_view_tab_block .third-layer .btn.active').hasClass('one_month')) var data = 'one_month';
				else if($('.most_view_tab_block .third-layer .btn.active').hasClass('three_month')) var data = 'three_month';
					// Load cart data update			
					$.ajax({
						url:URL,
						type:"POST",
						data:{data:data},
						beforeSend:function(){
							$('.most_view_tab_block .most_viewed_display_block').html('<div style="padding:5px 0">লোডিং...</div>');
						},
						success:function(msg){
							$('.most_view_tab_block .most_viewed_display_block').html(msg);
						},			 	
						error:function(jqXHR, textStatus, errorMessage){
						}			
					});
				}
			}
		});

$('.most_view_tab_block .third-layer .btn').click(function(){
	var rpt_type = '';
	if($('.most_view_tab_block .most_clicks').hasClass('active')){
		if(!$(this).hasClass('active')){
			
			if($('.most_view_tab_block .second-layer .btn.active').hasClass('news')) var URL = 'templates/rtv-v1/ajax/most_viewed_news38f0.html?cat_id=';
			else if($('.most_view_tab_block .second-layer .btn.active').hasClass('videos')) var URL = 'templates/rtv-v1/ajax/most_viewed_videos.html';
			else if($('.most_view_tab_block .second-layer .btn.active').hasClass('photos')) var URL = 'templates/rtv-v1/ajax/most_viewed_photos.html';
			
			if($(this).hasClass('todays')) var data = 'todays';
			else if($(this).hasClass('one_month')) var data = 'one_month';
			else if($(this).hasClass('three_month')) var data = 'three_month';

			$('.most_view_tab_block .third-layer .btn').removeClass('active');
			$(this).addClass('active');
			
					// Load cart data update			
					$.ajax({
						url:URL,
						type:"POST",
						data:{data:data},
						beforeSend:function(){
							$('.most_view_tab_block .most_viewed_display_block').html('<div style="padding:5px 0">লোডিং...</div>');
						},
						success:function(msg){
							$('.most_view_tab_block .most_viewed_display_block').html(msg);
						},			 	
						error:function(jqXHR, textStatus, errorMessage){
						}			
					});
					
				}
			}
		});

if($("#mobile_header .cat_collapse_bar").is(':visible')){

	$("#mobile_header .cat_collapse_bar").click(function(){
		$('#mobile_menu_category > div').slideToggle();
	});

}

if($("#mobile_footer .footer-morelink-bar").is(':visible')){

	$("#mobile_footer .footer-morelink-bar").click(function(){
		$('#mobile_footer .moreLinks').slideToggle();
	});

}

if($('#srch_keyword').is(':visible')){
	var topSrchBtnInterval = '',top_btn_click_val = 0;
	$('.top_srch_entry_type > .bn_entry_type').click(function(){
		$('#srch_keyword').focus(); top_btn_click_val = 1;
	});
	$('#srch_keyword').on('focus',function(){
		$('.top_srch_entry_type').show();
	});
	$('#srch_keyword').on('blur',function(){
		var topSrchBtnInterval = setInterval(function(){
			if(top_btn_click_val==0){
				$('.top_srch_entry_type').hide();
			}else top_btn_click_val = 0;
			clearInterval(topSrchBtnInterval);
		},200);
	});
	makePhoneticEditor('srch_keyword');
	if($('#dtl_srch_keyword').is(':visible')) makePhoneticEditor('dtl_srch_keyword');
}
if($('.srch_keyword').is(':visible')){
	$('.srch_btn').click(function(){
		google_search($('.srch_keyword'));
	});

	$('.srch_keyword').keypress(function(e) {
		var p = e.which;
		if(p==13) google_search($(this));
	});
}

$('.bn_entry_type').click(function(){
	$('.bn_entry_type').removeClass('active');
	$(this).closest('.srch_form').find('input[name="q"]').focus();
	if($(this).hasClass('unijoy')){
		$('.bn_entry_type.unijoy').addClass('active');
		makeUnijoyEditor('srch_keyword');
		if($('#dtl_srch_keyword').is(':visible')) makeUnijoyEditor('dtl_srch_keyword');
	}else if($(this).hasClass('phonetic')){
		$('.bn_entry_type.phonetic').addClass('active');
		makePhoneticEditor('srch_keyword');
		if($('#dtl_srch_keyword').is(':visible')) makePhoneticEditor('dtl_srch_keyword');
	}else if($(this).hasClass('english')){
		$('.bn_entry_type.english').addClass('active');
	}
});		

		/**
		 * TOOLTIPS SETUP
		 */
		 $(".tooltips").tooltip({placement : 'top'});
		 $(".tooltips-bottom").tooltip({placement : 'bottom'});		
		 
		 /*Home Page Photo Slider*/
		 var currentLeadNews = 1;
		 var totalLeadNews = $('.photo_slider_block .img a').length;
		 $('.pre_btn').click(function(){
		 	
		 	$('.photo_slider_block .img a:nth-child('+(currentLeadNews+1)+')').hide();
		 	if(currentLeadNews==totalLeadNews)
		 	{
		 		var url = $('.photo_slider_block .album_title a').attr('href');
		 		window.location = url;
		 	}
		 	if(currentLeadNews>1)
		 	{
		 		currentLeadNews = currentLeadNews - 1;
		 		$('.photo_slider_block .img a:nth-child('+(currentLeadNews+1)+')').fadeIn(100);
		 	}
		 	else
		 	{
		 		currentLeadNews = 2;
		 		$('.photo_slider_block .img a:nth-child('+(currentLeadNews+1)+')').fadeIn(100);
		 	}
		 });
		 
		 $('.nxt_btn').click(function(){
		 	
		 	$('.photo_slider_block .img a:nth-child('+(currentLeadNews+1)+')').hide();
		 	if(currentLeadNews==totalLeadNews)
		 	{
		 		var url = $('.photo_slider_block .album_title a').attr('href');
		 		window.location = url;
		 	}
		 	if(currentLeadNews<totalLeadNews)
		 	{
		 		currentLeadNews = currentLeadNews + 1;
		 		$('.photo_slider_block .img a:nth-child('+(currentLeadNews+1)+')').fadeIn(100);
		 	}
		 	else
		 	{
		 		currentLeadNews = 1;
		 		$('.photo_slider_block .img a:nth-child('+(currentLeadNews+1)+')').fadeIn(100);
		 	}
		 });

		 $('input[name="poll_ans"]').click(function(){
		 	$('.simple_poll .err_msg').fadeOut().html('');	
		 });
		 $('.simple_poll .poll_submit').click(function(){
		 	var vote_index = $('input[name="poll_ans"]:checked').val();
		 	if(vote_index>=0){
		 		$('#poll_form').submit();
		 	}else{
		 		$('.simple_poll .err_msg').fadeIn().html('<i class="fa fa-info"></i>অনুগ্রহ করে আপনার পছন্দ নির্বাচন করুন।');
		 	}
		 });
		 load_pie_chart('.poll_comp_data','pollCompChartContainer','','','#eee');
		});
var navpos = $('#menu_category').offset();

$(window).bind('scroll', function() {
	if ($(window).scrollTop() > navpos.top) {
		$('#menu_category').addClass('wrapper sticky');
	}
	else {
		$('#menu_category').removeClass('wrapper sticky');
	}
});



</script>



</head>
<body><center>
	<div id="top_header">
		<div class="wrapper top_header_content">
			<div class="row">
				<div class="col-xs-12 col-md-5">
					<div class="cur_date_desc">ঢাকা, সোমবার | ১৫ অাগস্ট ২০১৬ | ৩১ শ্রাবণ ১৪২৩</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<span class="header_srch srch_form">
						<input class="bn-font srch_keyword" id="srch_keyword" name="q" placeholder="সার্চ" value="" />
						<div class="top_srch_entry_type">
							<span class="bn_entry_type unijoy tooltips-bottom" data-toggle="tooltip" data-placement="top" data-original-title="ইউনিজয়" onclick="switched=false;">অ</span>
							<span class="bn_entry_type active phonetic tooltips-bottom" data-toggle="tooltip" data-placement="top" data-original-title="ফনেটিক" onclick="switched=false;">ফ</span>
							<span class="bn_entry_type english eng-font tooltips-bottom" data-toggle="tooltip" data-placement="top" data-original-title="English" onclick="switched=true;">A</span>
						</div>
						<span>
							<span><i class="fa fa-search srch_btn"></i></span>          
							<span class="bangla-font"><a href="#"><img src="templates/v1/images/bangla-font.png" border="0" /></a></span>
						</div>
						<div class="col-xs-12 col-md-3"><ul class="list-inline top_social_btn">
							<li><a class="fb-link" href="https://www.facebook.com/rtvonline" target="_blank"><i class="fa fa-facebook-square fa-lg"></i></a></li>
							<li><a class="twitter-link" href="#" target="_blank"><i class="fa fa-twitter-square fa-lg"></i></a></li>
							<li><a class="gplus-link" href="#" target="_blank"><i class="fa fa-google-plus-square fa-lg"></i></a></li>
							<li><a class="youtube-link" href="#" target="_blank"><i class="fa fa-youtube-square fa-lg"></i></a></li>
							<li><a class="linkedin-link" href="#" target="_blank"><i class="fa fa-linkedin-square fa-lg"></i></a></li>
							<li><a class="pinterest-link" href="#" target="_blank"><i class="fa fa-pinterest-square fa-lg"></i></a></li>
							<li><a class="feed-link" href="#" target="_blank"><i class="fa fa-rss-square fa-lg"></i></a></li>
						</ul></div>
					</div>
				</div>
			</div>       
			<div id="header">
				<div class="wrapper">
					<div class="row">
						<div class="col-xs-12 col-md-3">
							<div class="logoimg"><a href="http://67.227.189.112/~rtvnews24"><img src="<?php echo base_url(); ?>templates/v1/images/main-logo.png" border="0" /></a></div>
							<div class="visible-xs"><div class="adsSpace">Ad Space</div></div>
						</div>
						<div class="col-xs-12 col-md-9"></div>
					</div>
				</div></div>
				<div class="container-fluid">
					<div class="row visible-md visible-lg">
						<div id="menu_category"><ul class="list-inline header_top_menu"><li><a  href="<?php echo NEWS_SITE ?>" title="Home"><i class="fa fa-home fa-lg"></i></a></li><li>
							<a href="<?php echo NEWS_SITE ?>bangladesh">বাংলাদেশ</a><ul class="header_hover_bottom_menu" style="display:none; margin:0; padding:0"><li class="first_sub_cat"><a href="<?php echo NEWS_SITE ?>bangladesh/national">জাতীয়</a></li><li ><a href="<?php echo NEWS_SITE ?>national/politics">রাজনীতি</a></li></ul></li><li>
							<a href="<?php echo NEWS_SITE ?>country">দেশজুড়ে</a><ul class="header_hover_bottom_menu" style="display:none; margin:0; padding:0"><li class="first_sub_cat"><a href="<?php echo NEWS_SITE ?>country/dhaka">ঢাকা</a></li><li ><a href="<?php echo NEWS_SITE ?>country/chittagong">চট্টগ্রাম</a></li><li ><a href="<?php echo NEWS_SITE ?>country/rajshahi">রাজশাহী</a></li><li ><a href="<?php echo NEWS_SITE ?>country/khulna">খুলনা</a></li><li ><a href="<?php echo NEWS_SITE ?>country/barisal">বরিশাল</a></li><li ><a href="<?php echo NEWS_SITE ?>country/sylhet">সিলেট</a></li><li ><a href="<?php echo NEWS_SITE ?>country/rangpur">রংপুর</a></li><li ><a href="<?php echo NEWS_SITE ?>country/mymensingh">ময়মনসিংহ</a></li></ul></li><li>
							<a href="<?php echo NEWS_SITE ?>international">আন্তর্জাতিক</a><ul class="header_hover_bottom_menu" style="display:none; margin:0; padding:0"><li class="first_sub_cat"><a href="<?php echo NEWS_SITE ?>international/usa">যুক্তরাষ্ট্র</a></li><li ><a href="<?php echo NEWS_SITE ?>international/uk">যুক্তরাজ্য</a></li><li ><a href="<?php echo NEWS_SITE ?>international/india">ভারত</a></li><li ><a href="<?php echo NEWS_SITE ?>international/pakistan">পাকিস্তান</a></li><li ><a href="<?php echo NEWS_SITE ?>international/arab">আরব বিশ্ব</a></li><li ><a href="<?php echo NEWS_SITE ?>international/asia">এশিয়া</a></li><li ><a href="<?php echo NEWS_SITE ?>international/africa">আফ্রিকা</a></li><li ><a href="<?php echo NEWS_SITE ?>international/europe">ইউরোপ</a></li><li ><a href="<?php echo NEWS_SITE ?>international/australia">অস্ট্রেলিয়া</a></li><li ><a href="<?php echo NEWS_SITE ?>international/others">অন্যান্য</a></li></ul></li><li>
							<a href="<?php echo NEWS_SITE ?>economy">অর্থনীতি</a><ul class="header_hover_bottom_menu" style="display:none; margin:0; padding:0"><li class="first_sub_cat"><a href="<?php echo NEWS_SITE ?>economy/share-market">শেয়ার বাজার</a></li><li ><a href="<?php echo NEWS_SITE ?>economy/banking">ব্যাংকিং</a></li><li ><a href="<?php echo NEWS_SITE ?>economy/insurance">বীমা</a></li><li ><a href="<?php echo NEWS_SITE ?>economy/industry">শিল্প</a></li><li ><a href="<?php echo NEWS_SITE ?>economy/agriclulure">কৃষি</a></li><li ><a href="<?php echo NEWS_SITE ?>economy/garments">পোষাক শিল্প</a></li><li ><a href="<?php echo NEWS_SITE ?>economy/import-export">আমদানি-রপ্তানি</a></li><li ><a href="<?php echo NEWS_SITE ?>economy/tourismhtml">পর্যটন</a></li><li ><a href="<?php echo NEWS_SITE ?>economy/others">অন্যান্য</a></li></ul></li><li>
							<a href="<?php echo NEWS_SITE ?>sports">খেলাধুলা</a><ul class="header_hover_bottom_menu" style="display:none; margin:0; padding:0"><li class="first_sub_cat"><a href="<?php echo NEWS_SITE ?>sports/cricket">ক্রিকেট</a></li><li ><a href="<?php echo NEWS_SITE ?>sports/football">ফুটবল</a></li><li ><a href="<?php echo NEWS_SITE ?>sports/others">অন্যান্য</a></li><li ><a href="<?php echo NEWS_SITE ?>sports/athletics">অ্যাথলেটিকস</a></li><li ><a href="<?php echo NEWS_SITE ?>sports/tenis">টেনিস</a></li></ul></li><li>
							<a href="<?php echo NEWS_SITE ?>entertainment">বিনোদন</a><ul class="header_hover_bottom_menu" style="display:none; margin:0; padding:0"><li class="first_sub_cat"><a href="<?php echo NEWS_SITE ?>entertainment/dhallywood">ঢালিউড</a></li><li ><a href="<?php echo NEWS_SITE ?>entertainment/bollywood">বলিউড</a></li><li ><a href="<?php echo NEWS_SITE ?>entertainment/hollywood">হলিউড</a></li><li ><a href="<?php echo NEWS_SITE ?>entertainment/others">অন্যান্য</a></li><li ><a href="<?php echo NEWS_SITE ?>entertainment/drama">নাটক</a></li><li ><a href="<?php echo NEWS_SITE ?>entertainment/rtv">আরটিভি</a></li><li ><a href="<?php echo NEWS_SITE ?>entertainment/music-dance">সঙ্গীত ও নৃত্য</a></li><li ><a href="<?php echo NEWS_SITE ?>entertainment/stage">মঞ্চ</a></li><li ><a href="<?php echo NEWS_SITE ?>entertainment/celebrity">সেলিব্রেটি</a></li></ul></li><li>
							<a href="<?php echo NEWS_SITE ?>lifestyle">লাইফস্টাইল</a><ul class="header_hover_bottom_menu" style="display:none; margin:0; padding:0"><li class="first_sub_cat"><a href="<?php echo NEWS_SITE ?>lifestyle/fashion">ফ্যাশন</a></li><li ><a href="<?php echo NEWS_SITE ?>lifestyle/beauty-tips">রূপচর্চা</a></li><li ><a href="<?php echo NEWS_SITE ?>lifestyle/travel">ভ্রমণ</a></li><li ><a href="<?php echo NEWS_SITE ?>lifestyle/consultation">পরামর্শ</a></li><li ><a href="<?php echo NEWS_SITE ?>lifestyle/food">খাবার</a></li><li ><a href="<?php echo NEWS_SITE ?>lifestyle/style">স্টাইল</a></li><li ><a href="<?php echo NEWS_SITE ?>lifestyle/interior">গৃহসজ্জা</a></li><li ><a href="<?php echo NEWS_SITE ?>lifestyle/others">অন্যান্য</a></li></ul></li><li>
							<a href="<?php echo NEWS_SITE ?>crime">অপরাধ</a></li><li>
							<a class="active" href="<?php echo base_url(); ?>">অনুষ্ঠান</a>
								<ul class="header_hover_bottom_menu" style="display:none; margin:0; padding:0">
									<li class="first_sub_cat"><a href="<?php echo NEWS_SITE ?>entertainment/dhallywood">ঢালিউড</a></li>
									<li><a class="active" href="<?php echo NEWS_SITE ?>entertainment/bollywood">বলিউড</a></li>
									<li><a href="<?php echo NEWS_SITE ?>entertainment/hollywood">হলিউড</a></li>
									<li><a href="<?php echo NEWS_SITE ?>entertainment/others">অন্যান্য</a></li>
									<li ><a href="<?php echo NEWS_SITE ?>entertainment/drama">নাটক</a></li>
									<li ><a href="<?php echo NEWS_SITE ?>entertainment/rtv">আরটিভি</a></li>
									<li ><a href="<?php echo NEWS_SITE ?>entertainment/music-dance">সঙ্গীত ও নৃত্য</a></li>
									<li ><a href="<?php echo NEWS_SITE ?>entertainment/stage">মঞ্চ</a></li>
									<li ><a href="<?php echo NEWS_SITE ?>entertainment/celebrity">সেলিব্রেটি</a></li>
								</ul>
							</li><li>
							<a href="<?php echo NEWS_SITE ?>photo-gallery">ছবি</a></li><li>
							<a href="<?php echo NEWS_SITE ?>video-gallery">ভিডিও</a></li><li>
							<a href="<?php echo NEWS_SITE ?>others">অন্যান্য</a><ul class="header_hover_bottom_menu" style="display:none; margin:0; padding:0"><li><a class="lead_parent_cat" href="<?php echo NEWS_SITE ?>/others">অন্যান্য</a></li><li class="first_sub_cat"><a href="<?php echo NEWS_SITE ?>others/technology">তথ্যপ্রযুক্তি</a></li><li ><a href="<?php echo NEWS_SITE ?>others/healthhtml">স্বাস্থ্য</a></li><li ><a href="<?php echo NEWS_SITE ?>others/law-order">আইন-বিচার</a></li><li ><a href="<?php echo NEWS_SITE ?>others/education">ক্যাম্পাস</a></li><li ><a href="<?php echo NEWS_SITE ?>others/probash">প্রবাস</a></li><li ><a href="<?php echo NEWS_SITE ?>others/nature">পরিবেশ ও জীববৈচিত্র</a></li><li ><a href="<?php echo NEWS_SITE ?>others/religion">ধর্ম</a></li><li ><a href="<?php echo NEWS_SITE ?>others/interview">সাক্ষাৎকার</a></li><li ><a href="<?php echo NEWS_SITE ?>others/media">মিডিয়া</a></li><li ><a href="<?php echo NEWS_SITE ?>others/sufferings">জনদুর্ভোগ</a></li><li ><a href="<?php echo NEWS_SITE ?>others/arts-literature">শিল্প-সাহিত্য</a></li></ul></li><li>
							<a href="<?php echo NEWS_SITE ?>archive">আর্কাইভ</a></li></ul>
							
							<!-- <ul class="list-inline header_bottom_menu" style=display:none><li><a  href="others/law-order">আইন-বিচার</a></li><li><a  href="others/sufferings">জনদুর্ভোগ</a></li><li><a  href="exclusive">এক্সক্লুসিভ</a></li><li><a  href="others/technology">তথ্যপ্রযুক্তি</a></li><li><a  href="others/probash">প্রবাস</a></li><li><a  href="kids">কিডস</a></li><li><a  href="others/education">ক্যাম্পাস</a></li><li><a  href="others/healthhtml">স্বাস্থ্য</a></li><li><a  href="feature">ফিচার</a></li><li><a  href="free-opinion">মুক্তমত</a></li><li><a  href="others">অন্যান্য</a></li><li><a  href="about-us">আমাদের কথা</a></li><li><a  href="terms-policy">নিয়ম-নীতি</a></li><li><a  href="contact-us">যোগাযোগ</a></li></ul> -->
							<ul class="list-inline header_bottom_menu" style=>
								<li class="first_sub_cat"><a <?php if($cssvalue == 1){ echo "class='active'"; } ?> href="<?php echo base_url().'news'; ?>">সংবাদ</a></li>
								<li><a <?php if($cssvalue == 5){ echo "class='active'"; } ?> href="<?php echo base_url().'program/talkshow'; ?>">টক শো</a></li>
								<li><a <?php if($cssvalue == 4){ echo "class='active'"; } ?> href="<?php echo base_url().'program/drama'; ?>">নাটক</a></li>
								<li><a <?php if($cssvalue == 2){ echo "class='active'"; } ?> href="<?php echo base_url().'program/music'; ?>">সংঙ্গীত</a></li>
								<li><a <?php if($cssvalue == 7){ echo "class='active'"; } ?> href="<?php echo base_url().''; ?>">ইভেন্ট</a></li>
								<li><a <?php if($cssvalue == 8){ echo "class='active'"; } ?> href="<?php echo base_url().'#'; ?>">অন্যান্য</a></li>
								<li><a <?php if($cssvalue == 6){ echo "class='active'"; } ?> href="<?php echo base_url().'schedule'; ?>">অনুষ্ঠান সূচী</a></li>
							</ul>
						</div>
					</div>
