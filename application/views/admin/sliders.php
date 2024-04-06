<!DOCTYPE html>
<html>
<head>
  <title>Manage Sliders</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/massivestyle.css">
</head>
<body>
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Manage Sliders</h3><br>
  <div class="row">
  <div class="card bg-secondary mb-3">  
    <?php foreach ($slider as $news_item): ?>
    <div class="col-sm-3 text-center animate-box">
      <p><?php echo $news_item['title'];?></p>
      <img src="<?php echo base_url ();?>/uploads/<?php echo $news_item['data_file'];?>" class="img cover" alt="<?php echo $news_item['title']?>">
    <a href="<?php echo site_url('editslider/'.$news_item['slug']);?>">EDIT</a></br>
    <a href="<?php echo site_url('deleteslider/'.$news_item['slug']);?>">DELETE</a>    
    </div>
    <?php endforeach ?>
  </div>
</div>
</div>

<!-- Footer -->
<?php echo $links; ?>
<footer class="container-fluid bg-4 text-center">
  <p> &copy; massPlug</p> 
</footer>

</body>

