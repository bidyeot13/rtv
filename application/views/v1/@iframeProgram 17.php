<?php  //require_once('config.php');  ?>


<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <style>

*::before, *::after {
    box-sizing: border-box;
}
*::before, *::after {
    box-sizing: border-box;
}
.feature_news_block {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ddd;
    /* margin: 10px 0 5px; */
    padding: 0 0 30px;
    position: relative;
}
.feature_news_caption{display: block}
.feature_news_caption > h4{
	position:relative; display: inline-block; background: #666; margin: 0px 0 0 0; padding:6px 20px; font-size: 18px; color: #fff; text-shadow:1px 0 #666
}
.feature_news_caption > h4:after{
	left: 100%;
	height: 0;
	width: 7px;
	position: absolute;
	top: 0;
	content: " ";
	pointer-events: none;
	margin-left: 0;
	margin-top: 0;
	border-top: 30px solid #666;
	border-right: 8px solid transparent;
}
* {
    box-sizing: border-box;
}
.container-fluid {
    text-align: left;
}
body {
	margin:0 auto; padding:0;
    color: #444;
    font-family: SolaimanLipi;
    font-size: 16px;
    line-height: 20px;
}
body {
	margin:0 auto; padding:0;
    color: #333;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857;
}
body:not([id]) {
    cursor: auto !important;
}
html {
    font-size: 10px;
}
html {
    font-family: sans-serif;
}
</style>

</head>
<body> <!--  topmargin="0" leftmargin="0" -->
  <div class="container">
    <div class="row">
      <?php 
	  
echo "<div class='feature_news_block' style='height:880px;'>
					<a href='#'><div class='feature_news_caption'><h4>অনুষ্ঠান</h4></div></a>
					<div class='responsive-video' style='padding-top:10px'>";
					
      foreach ($rtvProgramrand as $row)  { 
        echo "<div class='col-sm-12 col-md-12 col-xs-12 col-lg-6'>"; ?> 
        <img src="<?php echo base_url().'assets/programs/image/'.$row->prog_image;?>" class="img-thumbnail" alt="program image" width="100%" height="100%">
        <?php 
        echo "<h5> ";
        foreach ($rtvProgramcat as $cat)  { 
          if($cat->cat_id == $row->prog_cat)
          {
            echo $cat->cat_name .' । '.$row->prog_title ;
          }
        }
        echo "</h5> ";
        echo "</div>";	
      }
	  
				echo "</div>
				</div>
			</div>";	
	  
      ?>
    </div>
  </div>
</body>
</html>
