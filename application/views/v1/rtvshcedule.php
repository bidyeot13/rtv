  <div class="row">
  	<div id="main_content">
  		<div class="left_content"> 
        <div id="site_map"><ol class="breadcrumb"><li><a href="<?php echo NEWS_SITE; ?>"><i class="fa fa-home"></i>&nbsp;প্রচ্ছদ</a></li><li class="child"><a href="<?php echo base_url();?>"><i class="fa fa-list"></i>&nbsp;অনুষ্ঠান</a></li><li class="child active"><i class="fa fa-list"></i>&nbsp;আরটিভির অনুষ্ঠান সূচী</li></ol><!--end breadcrumb--><div class="clr"></div></div>

        <div id="video_home_page_content">
          <div class="video_gal_block">
            <div class="video_gal_caption video_cat-0">
              <h4><a href="video-gallery/rtv-news.html">আরটিভির  অনুষ্ঠান সূচী</a></h4>
            </div>
            <div class="video_list">
              <?php
              $i = 0;
              echo "<div class='row'>
              ";
              foreach ($rtvSchedule as $row)  {
                ?>
                <div class='col-sm-6'>
                  <div style="border:0px solid #ddd; margin:10px 0 0 0; position:relative;">
                    <div class="feature_news_block">
                      <a href="#"><div class="feature_news_caption"><h4><?php echo $row->din; ?></h4></div></a>
                      <div class="list_display_block" id="latest_list_block">
                        <ul class="list">
                          <?php 
                          echo "
                          <li><a href='#'>$row->time1 - $row->program1</a></li>
                          <li><a href='#'>$row->time2 - $row->program2</a></li>
                          <li><a href='#'>$row->time3 - $row->program3</a></li>
                          <li><a href='#'>$row->time4 - $row->program4</a></li>
                          <li><a href='#'>$row->time5 - $row->program5</a></li>
                          <li><a href='#'>$row->time6 - $row->program6</a></li>
                          <li><a href='#'>$row->time7 - $row->program7</a></li>
                          ";
                          ?>
                        </ul>

                      </div>

                    </div>
                  </div>
                </div>
                <?php 
              }
              echo "</div>";
              ?>
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
              <div class="morelink"><a href="exclusive.html">সাপ্তাহিক সূচী <i class="fa fa-angle-right"></i></a></div>
            </div>
          </div>
          





          <div class="list_display_block" id="popular_list_block">
            <ul>
              <li>
                <a href="others/723/&#xe0;&#xa6;&#x86;&#xe0;&#xa6;&#xb0;&#xe0;&#xa6;&#x9f;&#xe0;&#xa6;&#xbf;&#xe0;&#xa6;&#xad;&#xe0;&#xa6;&#xbf;-&#xe0;&#xa6;&#x85;&#xe0;&#xa6;&#xa8;&#xe0;&#xa6;&#xb2;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#x87;&#xe0;&#xa6;&#xa8;&#xe0;&#xa7;&#x87;&#xe0;&#xa6;&#xb0;-&#xe0;&#xa6;&#xaa;&#xe0;&#xa6;&#xb0;&#xe0;&#xa7;&#x80;&#xe0;&#xa6;&#x95;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xb7;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xae;&#xe0;&#xa7;&#x82;&#xe0;&#xa6;&#xb2;&#xe0;&#xa6;&#x95;-&#xe0;&#xa6;&#xaf;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xa4;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xb0;&#xe0;&#xa6;&#xbe;.html">
                  <font style="color:rgb(33, 33, 33)">আরটিভি অনলাইনের পরীক্ষামূলক যাত্রা</font>
                </a>
              </li>
              <li>
                <a href="bangladesh/690/&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xbf;&#xe0;&#xa6;&#xb6;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xac;&#xe0;&#xa7;&#x87;-&#xe0;&#xa6;&#x85;&#xe0;&#xa6;&#xb7;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#x9f;&#xe0;&#xa6;&#xae;-&#xe0;&#xa6;&#xb8;&#xe0;&#xa7;&#x81;&#xe0;&#xa6;&#x96;&#xe0;&#xa7;&#x80;-&#xe0;&#xa6;&#xa6;&#xe0;&#xa7;&#x87;&#xe0;&#xa6;&#xb6;-&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#x82;&#xe0;&#xa6;&#xb2;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xa6;&#xe0;&#xa7;&#x87;&#xe0;&#xa6;&#xb6;html.html"><font style="color:rgb(33, 33, 33)">বিশ্বে অষ্টম সুখী দেশ বাংলাদেশ</font></a></li><li><a href="country/754/&#xe0;&#xa6;&#x8f;&#xe0;&#xa6;&#xb6;&#xe0;&#xa6;&#xbf;&#xe0;&#xa7;&#x9f;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xb0;-&#xe0;&#xa6;&#xb8;&#xe0;&#xa6;&#xaa;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xa4;&#xe0;&#xa6;&#xae;-&#xe0;&#xa6;&#xaa;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xb0;&#xe0;&#xa6;&#xad;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xb6;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xb2;&#xe0;&#xa7;&#x80;-&#xe0;&#xa6;&#xa8;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xb0;&#xe0;&#xa7;&#x80;-&#xe0;&#xa6;&#xae;&#xe0;&#xa7;&#x87;&#xe0;&#xa7;&#x9f;&#xe0;&#xa6;&#xb0;-&#xe0;&#xa6;&#x86;&#xe0;&#xa6;&#x87;&#xe0;&#xa6;&#xad;&#xe0;&#xa7;&#x80;.html"><font style="color:rgb(33, 33, 33)">এশিয়ার সপ্তম প্রভাবশালী নারী মেয়র আইভী</font></a></li><li><a href="bangladesh/711/&#xe0;&#xa6;&#xb8;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xb0;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xa6;&#xe0;&#xa7;&#x87;&#xe0;&#xa6;&#xb6;&#xe0;&#xa7;&#x87;-&#xe0;&#xa6;&#x9c;&#xe0;&#xa6;&#x99;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#x97;&#xe0;&#xa6;&#xbf;&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xbf;&#xe0;&#xa6;&#xb0;&#xe0;&#xa7;&#x8b;&#xe0;&#xa6;&#xa7;&#xe0;&#xa7;&#x80;-&#xe0;&#xa6;&#xae;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xa8;&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xa8;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xa7;&#xe0;&#xa6;&#xa8;.html"><font style="color:rgb(33, 33, 33)">সারাদেশে জঙ্গিবিরোধী মানববন্ধন</font></a></li><li><a href="http://67.227.189.112/~rtvnews24"></a></li><li><a href="bangladesh/703/&#xe0;&#xa6;&#xae;&#xe0;&#xa7;&#x8b;&#xe0;&#xa6;&#xae;&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xa4;&#xe0;&#xa6;&#xbf;-&#xe0;&#xa6;&#xaa;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xb0;&#xe0;&#xa6;&#x9c;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#x9c;&#xe0;&#xa6;&#xb2;&#xe0;&#xa6;&#xa8;&#xe0;&#xa7;&#x87;-&#xe0;&#xa6;&#xb6;&#xe0;&#xa7;&#x81;&#xe0;&#xa6;&#xb0;&#xe0;&#xa7;&#x81;-&#xe0;&#xa6;&#xb6;&#xe0;&#xa7;&#x8b;&#xe0;&#xa6;&#x95;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xb9;-&#xe0;&#xa6;&#x86;&#xe0;&#xa6;&#x97;&#xe0;&#xa6;&#xb8;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#x9f;.html"><font style="color:rgb(33, 33, 33)">মোমবাতি প্রজ্জলনে শুরু শোকাবহ আগস্ট</font></a></li><li><a href="sports/741/&#xe0;&#xa6;&#x86;&#xe0;&#xa6;&#xb0;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#x9c;&#xe0;&#xa7;&#x87;&#xe0;&#xa6;&#xa8;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#x9f;&#xe0;&#xa6;&#xbf;&#xe0;&#xa6;&#xa8;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xb0;-&#xe0;&#xa6;&#x95;&#xe0;&#xa7;&#x8b;&#xe0;&#xa6;&#x9a;-&#xe0;&#xa6;&#xb9;&#xe0;&#xa6;&#xb2;&#xe0;&#xa7;&#x87;&#xe0;&#xa6;&#xa8;-&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#x89;&#xe0;&#xa6;&#x9c;&#xe0;&#xa6;&#xbe;.html"><font style="color:rgb(33, 33, 33)">আর্জেন্টিনার কোচ হলেন বাউজা</font></a></li><li><a href="bangladesh/720/&#xe0;&#xa6;&#x95;&#xe0;&#xa7;&#x81;&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xbf;&#xe0;&#xa6;&#xb0;-&#xe0;&#xa6;&#xb9;&#xe0;&#xa6;&#xb2;-&#xe0;&#xa6;&#xa5;&#xe0;&#xa7;&#x87;&#xe0;&#xa6;&#x95;&#xe0;&#xa7;&#x87;-&#xe0;&#xa6;&#xac;&#xe0;&#xa6;&#xa8;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xa6;&#xe0;&#xa7;&#x81;&#xe0;&#xa6;&#x95;-&#xe0;&#xa6;&#x93;-&#xe0;&#xa6;&#xa6;&#xe0;&#xa7;&#x87;&#xe0;&#xa6;&#xb6;&#xe0;&#xa7;&#x80;&#xe0;&#xa7;&#x9f;-&#xe0;&#xa6;&#x85;&#xe0;&#xa6;&#xb8;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xa4;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xb0;-&#xe0;&#xa6;&#x89;&#xe0;&#xa6;&#xa6;&#xe0;&#xa7;&#x8d;&#xe0;&#xa6;&#xa7;&#xe0;&#xa6;&#xbe;&#xe0;&#xa6;&#xb0;-&#xe0;&#xa6;&#x86;&#xe0;&#xa6;&#x9f;&#xe0;&#xa6;&#x95;-&#xe0;&#xa7;&#xac;.html"><font style="color:rgb(33, 33, 33)">কুবির হল থেকে বন্দুক ও দেশীয় অস্ত্র উদ্ধার, আটক ৬</font></a></li></ul></div>
              </div>

             </div>
                <div class="clr"></div>
              </div>
            </div>
         
