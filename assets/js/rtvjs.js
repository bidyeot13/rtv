
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

/****************** body js ****************/
<script type="text/javascript">
$('.tab_bar_block li').on('click',function(){
	if(!$(this).hasClass('active')){
		var tabIndex = $(this).attr('tabIndex');			
		$('.tab_bar_block li').removeClass('active');
		$(this).addClass('active');
		$('.list_display_block').hide();
		$('#' + tabIndex).fadeIn();
	}
});
</script>


<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>


