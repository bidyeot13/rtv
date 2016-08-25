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
     position:relative; 
     display: inline-block;
     background: #666; 
     margin: 0px 0 0 0; 
     padding:8px 20px; 
     font-size: 12px !important; 
     color: #fff; 
     text-shadow:1px 0 #666;
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

a:link {
 text-decoration: none;

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

/*
if (!empty($rtvProgramrand)) {
	echo "ffffffffff";
} else echo "000";
*/



foreach ($rtvProgramrand as $row)  { 

  
  $c_name = $row->cat_code; 
   $c_name_bn='';
  if($c_name == 'fiction')
  {
    $c_name ='drama';
    $c_name_bn='নাটক';
  }
  else if ($c_name == 'nonfiction') {
     $c_name ='talkshow';
     $c_name_bn='টক শো';
  }
   else if ($c_name == 'eid') {
     
     $c_name_bn='ঈদ স্পেশাল';
  }
  else $c_name_bn='অন্যান্য'; 




  echo "<div class='col-sm-12 col-md-12 col-xs-12 col-lg-6'>
  <a href ='".base_url()."program/$c_name?id=$row->prog_id' target='top'>
  <img src='".base_url()."assets/programs/image/$row->prog_image' class='img-thumbnail' alt='program image' width='100%' height='100%'>
  <h5> <span style='color:#f9131b'>$c_name_bn : </span>$row->prog_title </h5> </a>
</div>";	
}

echo "</div>
</div>";	
?>
</div>
</div>

</body>
</html>
