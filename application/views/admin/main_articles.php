<!DOCTYPE html>
<html>
<head>
  <title>Manage Main Articles</title>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/mystyle.css">  

</head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo site_url();?>main/panel">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Publish an Article
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo site_url();?>main/create_mainarticle">Main Article</a></li>
          <li><a href="<?php echo site_url();?>main/create_galler">Photography</a></li>
        </ul>
      </li>
      <li><a href="<?php echo site_url();?>main/view_photogaller">Photography</a></li>
      <li><a href="<?php echo site_url();?>main/view_topstories">Published Ads</a></li>
    </ul>
  </div>
</nav>

<body>
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Manage Main Articles</h3><br>
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
  <div class="card bg-secondary mb-3">
      <?php foreach ($news as $main_item): ?>    
    <div class="col-sm-3 text-center animate-box">
      <p><?php echo $main_item['title'];?></p>
      <img src="<?php print HTTP_UPLOAD_THUMB_PATH.($main_item['data_file'])?>" class="thumb-tile cover" alt="<?php echo $main_item['title'];?>">
    <a href="<?php echo site_url('editmain/'.$main_item['slug']);?>">EDIT</a><br>
    <a href="<?php echo site_url('deletemain/'.$main_item['slug']);?>">DELETE</a>  
    </div>
    <?php endforeach ?>
  </div>
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

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
