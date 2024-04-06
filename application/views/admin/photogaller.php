<!DOCTYPE html>
<html>
<head>
  <title>Manage Photography Gallery</title>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"/>  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/mystyle.css">
</head>
<body>
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Manage Photography Gallery</h3><br>
  <?php if(!empty($this->session->flashdata('success_msg'))) { ?>
  <div class="row">
    <div class="col-lg-12">
        <?php echo $this->session->flashdata('success_msg'); ?>                      
    </div>  
  </div>  
<?php  } else { ?>
  <div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success">No Recent Activity</div>      
    </div>
  </div>  
<?php } ?>  
  <div class="row">
    <?php foreach ($gallery as $news_item): ?>
    <div class="col-sm-3">
      <p><?php echo $news_item['title'];?></p>
      <img src="<?php print HTTP_UPLOAD_THUMB_PATH.($news_item['data_file'])?>" class="thumb-tile cover" alt="<?php echo $news_item['title']?>">
    <a href="<?php echo site_url('editphotogaller/'.$news_item['slug']);?>">EDIT</a></br>
    <a href="<?php echo site_url('deletephotogaller/'.$news_item['slug']);?>">DELETE</a>  
    </div>
    <?php endforeach ?>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <div class="article-pagination">
    <ul><?php echo $links ?></ul>
  </div>  
  <p> &copy; MassPlug</p> 
</footer>

</body>
