<div class="row">
	<div id="main_content">
		<div class="left_content"> 
			<div id="site_map"><ol class="breadcrumb"><li><a href="<?php echo NEWS_SITE; ?>"><i class="fa fa-home"></i>&nbsp;প্রচ্ছদ</a></li><li class="child"><a href="<?php echo base_url();?>"><i class="fa fa-list"></i>&nbsp;অনুষ্ঠান</a></li><li class="child active"><i class="fa fa-list"></i>&nbsp;সংবাদ</li></ol><!--end breadcrumb--><div class="clr"></div></div>

			<div id="video_home_page_content">
				<div class="video_gal_block">
					<div class="video_gal_caption video_cat-0">
						<h4><a href="video-gallery/rtv-news.html">আরটিভি সংবাদ</a></h4>
					</div>
					<div class="video_list">
						<?php
						$i = 0;
						echo "<div class='row'>
						<div class='col-sm-12'>";
							if(!empty($onedailyNews))
							{
								foreach ($onedailyNews as $row)  {
									echo "<div class='embed-responsive embed-responsive-4by3'> <iframe class='embed-responsive-item'   src='https://www.youtube.com/embed/$row->news_video' frameborder='0' allowfullscreen></iframe></div>";
									echo "<div class='rtvnewstitle'>
									<h3>$row->news_title</h3>
								</div> ";
								if(!empty($row->news_details))
								{
									echo "<div class= 'col-sm-12'>
									<p class='rtvnewsdetails'>$row->news_details</p>
								</div> ";
							}
						}
					}
					else
					{
						echo "<h5> Not Found</h5>";
					}
					echo "</div>";
					echo "</div>";
					?>

					<div class="dividor"></div>


					<div class="video_gal_block">
						<div class="video_gal_caption video_cat-0">
							<h4><a href="video-gallery/rtv-news.html">আরো সংবাদ</a></h4>
						</div>
					</div>


					<?php
					$i = 0;
					echo "<div class='row'>";
					foreach ($dailyNews as $row)  {
						$newsid = $row->news_id; $title = $row->news_title;

						echo "
						<div class='col-xs-6 col-md-4'>"; 
							?>	
							<a href="<?php echo base_url().'newsdetails?id='.$newsid.'/'.$title; ?>">			
								<?php echo "<div class='cover_photo' style='background:#f7f7f7 url(".base_url()."assets/dailynews/image/$row->news_image) no-repeat center; background-size:contain'><i class='fa fa-play fa-lg'></i></div>
								<div class='title'>
									<h5>$row->news_title</h5>
								</div>
							</a>
						</div>";
					}
					echo "</div>";
					?>
					<div id="pagination">
						<ul class="tsc_pagination">

							<!-- Show pagination links -->
							<?php foreach ($links as $link) {
								echo "<li>". $link."</li>";
							} ?>
						</div>


					</div>
				</div>
			</div>
		</div>

		<div class="right_content">
			<div>
				<div style="border:0px solid #ddd; margin:10px 0 0 0; position:relative;">
					<div class="feature_news_block">
						<a href="exclusive.html"><div class="feature_news_caption"><h4>আজ রাতে দেখবেন</h4></div></a>
						<div class="list_display_block" id="latest_list_block">
							<ul class="list">

								<?php 

								$tonights = "";
								foreach ($tonight['query'] as $row) : {
									echo "
									<li><a href='#'>$row->time1 - $row->program1</a></li>
									<li><a href='#'>$row->time2 - $row->program2</a></li>
									<li><a href='#'>$row->time3 - $row->program3</a></li>
									<li><a href='#'>$row->time4 - $row->program4</a></li>
									<li><a href='#'>$row->time5 - $row->program5</a></li>
									<li><a href='#'>$row->time6 - $row->program6</a></li>
									<li><a href='#'>$row->time7 - $row->program7</a></li>
									";
								}
								endforeach;
								?>
							</ul>

						</div>
						<div class="morelink"><a href="schedule">সাপ্তাহিক সূচী <i class="fa fa-angle-right"></i></a></div>
					</div>
				</div>   
				<iframe src="<?php echo base_url().'program/iframe'; ?>" scrolling="no" frameborder="0" height="880" width="100%" style="margin-top:5px; position:relative;"></iframe>


			</div>
			<div class="clr"></div>
		</div>
	</div>

