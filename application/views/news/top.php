<!DOCTYPE html>
<html>
<head>
<title>massPlug | Read | Article</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/js/html5shiv.min.js"></script>
<script src="<?php echo base_url();?>assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="<?php echo site_url();?>">Home</a></li>
              <li><a href="<?php echo site_url('categories/entertainment')?>">Entertainment</a></li>
              <li><a href="<?php echo site_url('categories/photography')?>">Photography</a></li>
              <li><a href="<?php echo site_url('categories/music')?>">Music</a></li>
              <li><a href="<?php echo site_url('categories/fashion')?>">Fashion</a></li>               
            </ul>
          </div>
        </div>
        <div class="header_bottom">
          <div class="header_bottom_left"><a class="logo" href="<?php echo site_url();?>">mass<strong>Plug</strong> <span>Your trusted plug</span></a></div>
          <div class="header_bottom_right"><a href="<?php echo site_url();?>"><img src="../images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <div id="navarea">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav custom_nav">
            <li class=""><a href="<?php echo site_url();?>">Home</a></li>
            <li><a href="<?php echo site_url('categories/entertainment')?>">Entertainment</a></li>
            <li><a href="<?php echo site_url('categories/photography')?>">Photography</a></li>
            <li><a href="<?php echo site_url('categories/music')?>">Music</a></li>
            <li><a href="<?php echo site_url('categories/fashion')?>">Fashion</a></li>             
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <section id="mainContent">
    <div class="content_bottom">
      <div class="col-lg-8 col-md-8">
        <div class="content_bottom_left">
          <div class="single_page_area">
            <ol class="breadcrumb">
              <li><a href="<?php echo site_url()?>">Home</a></li>
              <li><a href="<?php echo site_url('categories/'.$top_item['category'])?>"><?php echo $top_item['category']?></a></li>
              <li class="active"><?php echo $top_item['title']?> </li>
            </ol>
            <h2 class="post_titile"><?php echo $top_item['title']?> </h2>
            <div class="single_page_content">
              <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>massPlug</a> <span><i class="fa fa-calendar"></i><?php echo $top_item['time_stamp']?></span> <a href=""><i class="fa fa-tags"></i><?php echo $top_item['category']?></a> </div>
              <img class="img-center" src="<?php echo base_url();?>/uploads/<?php echo $top_item['data_file'];?>" alt="">
              <p><?php echo $top_item['article'];?></p>
            </div>
          </div>
        </div>
        <div class="share_post"> <a class="facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a></div>
        <div class="similar_post">
          <h2>Similar Posts You May Like <i class="fa fa-thumbs-o-up"></i></h2>
          <ul class="small_catg similar_nav wow fadeInDown animated">
            <li>
              <?php foreach ($music_limit1 as $news_item): ?>
              <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="<?php echo site_url('article/'.$news_item['slug']); ?>"><img src="<?php echo base_url();?>/uploads/<?php echo $news_item['data_file'];?>" alt=""></a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?> </a></h4>
                  <p><?php echo $news_item['hooker']?> </p>
                </div>
              </div>
            <?php endforeach ?>
            </li>
            <li>
              <?php foreach ($fashion_limit1 as $news_item): ?>
              <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="<?php echo site_url('article/'.$news_item['slug']); ?>"><img src="<?php echo base_url();?>/uploads/<?php echo $news_item['data_file'];?>" alt=""></a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?> </a></h4>
                  <p><?php echo $news_item['hooker']?> </p>
                </div>
              </div>
            <?php endforeach ?>
            </li>
            <li>
              <?php foreach ($entertainment_limit1 as $news_item): ?>
              <div class="media wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"> <a class="media-left related-img" href="<?php echo site_url('article/'.$news_item['slug']); ?>"><img src="<?php echo base_url();?>/uploads/<?php echo $news_item['data_file'];?>" alt=""></a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?> </a></h4>
                  <p><?php echo $news_item['hooker']?> </p>
                </div>
              </div>
            <?php endforeach ?>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="content_bottom_right">
          <div class="single_bottom_rightbar">
            <h2>Recent Posts</h2>
            <ul class="small_catg popular_catg wow fadeInDown">
              <li>
                <?php foreach ($main_limit3 as $news_item): ?>
                <div class="media wow fadeInDown"> <a href="<?php echo site_url('article/'.$news_item['slug']); ?>" class="media-left"><img alt="" src="<?php echo base_url();?>/uploads/<?php echo $news_item['data_file'];?>"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?> </a></h4>
                    <p><?php echo $news_item['hooker']?> </p>
                  </div>
                </div>
                <?php endforeach ?>
              </li>
            </ul>
          </div>
          <div class="single_bottom_rightbar">
            <ul role="tablist" class="nav nav-tabs custom-tabs">
              <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="home" href="#mostPopular">Photography</a></li>
              <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="messages" href="#recentComent">Fashion</a></li>
            </ul>
            <div class="tab-content">
              <div id="mostPopular" class="tab-pane fade in active" role="tabpanel">
                <ul class="small_catg popular_catg wow fadeInDown">
                  <li>
                    <?php foreach ($gallery_limit3 as $news_item): ?>
                    <div class="media wow fadeInDown"> <a class="media-left" href="<?php echo site_url('photography/'.$news_item['slug']); ?>"><img src="<?php echo base_url();?>/uploads/<?php echo $news_item['data_file'];?>" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo site_url('photography/'.$news_item['slug']); ?>"><?php echo $news_item['title']?> </a></h4>
                        <p><?php echo $news_item['hooker']?> </p>
                      </div>
                    </div>
                  <?php endforeach ?>
                  </li>
                </ul>
              </div>
              <div id="recentComent" class="tab-pane fade" role="tabpanel">
                <ul class="small_catg popular_catg">
                  <li>
                    <?php foreach ($fashion_limit3 as $news_item): ?>
                    <div class="media wow fadeInDown"> <a class="media-left" href="<?php echo site_url('article/'.$news_item['slug']); ?>"><img src="<?php echo base_url();?>/uploads/<?php echo $news_item['data_file'];?>" alt=""></a>
                      <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?> </a></h4>
                        <p><?php echo $news_item['hooker']?> </p>
                      </div>
                    </div>
                  <?php endforeach ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_bottom_rightbar">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<footer id="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInLeft">
            <h2>Photography</h2>
            <ul class="flicker_nav">
            <?php foreach ($gallery_limit8 as $galler_item): ?> 
            <li><a href="<?php echo site_url('photography/'.$galler_item['slug']); ?>"><img src="<?php echo base_url ();?>/uploads/<?php echo $galler_item['data_file'];?>" alt=""></a></li>
            <?php endforeach ?>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInDown">
            <h2>Categories</h2>
            <ul class="labels_nav">
              <li><a href="<?php echo site_url('categories/music')?>">Music</a></li>
              <li><a href="<?php echo site_url('categories/entertainment')?>">Entertainment</a></li>
              <li><a href="<?php echo site_url('categories/fashion')?>">Fashion</a></li>
              <li><a href="<?php echo site_url('categories/photography')?>">Photography</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInRight">
            <h2>About Us</h2>
            <p>Your Trusted Plug for the latest on entertainment, music, fashion and photography </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_left">
            <p>Copyright &copy; <?php echo date("Y")?> <a href="<?php echo site_url()?>">massPlug</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_right">
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/wow.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/slick.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
</body>
</html>