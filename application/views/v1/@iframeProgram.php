<?php  //require_once('config.php');  ?>


<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
  <div class="container">
    <div class="row">
      <?php 
      foreach ($rtvProgramrand as $row)  { 
        echo "<div class='col-sm-12 col-md-12 col-xs-12 col-lg-6'>"; ?> 
        <img src="<?php echo base_url().'assets/programs/image/'.$row->prog_image;?>" class="img-thumbnail" alt="program image" width="304">
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
      ?>
    </div>
  </div>
</body>
</html>

