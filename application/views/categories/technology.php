<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>MassPlug - <?php echo $title?></title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CLato:300,400" rel="stylesheet"> 
    
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css"/>

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.carousel.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/owl.theme.default.css" />
    
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/mystyle.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>
  <body>
  
    <!-- Header -->
    <header id="header">
      <!-- Nav Header -->
      <div id="nav-header">
        <div class="container">
          <nav id="main-nav">
            <div class="nav-logo">
              <a href="#" class="logo"><img src="" alt=""></a>
            </div>
            <ul class="main-nav nav navbar-nav">
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li><a href="<?php echo site_url();?>categories/entertainment">Entertainment</a></li>
                    <li><a href="<?php echo site_url();?>categories/photography">Photography</a></li>
                    <li><a href="<?php echo site_url();?>categories/lifestyle">Lifestyle</a></li>
                    <li><a href="<?php echo site_url();?>categories/fashion">Fashion</a></li>
                    <li><a href="<?php echo site_url();?>categories/music">Music</a></li>
                    <li class="active"><a href="<?php echo site_url();?>categories/technology">Tech</a></li>                    
            </ul>
          </nav>
          <div class="button-nav">
            <button class="search-collapse-btn"><i class="fa fa-search"></i></button>
            <button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
            <div class="search-form">
              <form method="get" action="<?php echo site_url();?>search/article_search" enctype="multipart/form-data">
                <input class="input" type="text" name="search" placeholder="Search">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /Nav Header -->
    </header>
    <!-- /Header -->
    
    <!-- SECTION -->
    <div class="section">
      <!-- CONTAINER -->
      <div class="container">
        <!-- ROW -->
        <div class="row">
          <!-- Main Column -->
          <div class="col-md-12">
            <!-- section title -->
            <div class="section-title">
              <h2 class="title">Technology</h2>
            </div>
            <!-- /section title -->
            
            <!-- row -->
            <div class="row">
              <!-- Column 1 -->
              <?php foreach ($technology_news as $news_item): 
              $time_stamp = $news_item['time_stamp'];
              $unix_time = mysql_to_unix($time_stamp);
              ?>                              
              <div class="col-md-3 col-sm-6">
                <!-- ARTICLE -->
                
                <article class="article">
                  <div class="article-img">
                    <a href="<?php echo site_url('article/'.$news_item['slug']); ?>">
                      <img class="thumb-square-medium cover-object-fit" src="<?php print HTTP_UPLOAD_MEDIUM_PATH.($news_item['data_file'])?>" alt="">
                    </a>
                    <ul class="article-info">
                    </ul>
                  </div>
                  <div class="article-body">
                    <h4 class="article-title"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?></a></h4>
                    <ul class="article-meta">
                      <li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units)?> ago</li>
                      <li><i class=""></i> </li>
                    </ul>
                  </div>
                </article>              

                <!-- /ARTICLE -->
              </div>
              <?php endforeach ?>
              <!-- /Column 1 -->              
            </div>
            <!-- pagination -->
            <div align="center" class="article-pagination">
              <ul> 
              <?php echo $links ?>
              </ul>
            </div>
            <!-- /pagination -->            
            <!-- /row -->
          </div>
          <!-- /Main Column -->
        </div>
        <!-- /ROW -->
      </div>
      <!-- /CONTAINER -->
    </div>
    <!-- /SECTION -->
    
    <!-- FOOTER -->
    <footer id="footer">
      <!-- Top Footer -->
      <div id="top-footer" class="section">
        <!-- CONTAINER -->
        <div class="container">
          <!-- ROW -->
          <div class="row">
            <!-- Column 1 -->
            <div class="col-md-4">
              <!-- footer about -->
              <div class="footer-widget about-widget">
                <div class="footer-logo">
                  <a href="#" class="logo"><img src="<?php echo base_url();?>images/logo-white-red.png" alt="logo" alt=""></a>
                  <p><?php echo $about_us?></p>
                </div>
              </div>
              <!-- /footer about -->
              
              <!-- footer social -->
              <div class="footer-widget social-widget">
                <div class="widget-title">
                  <h3 class="title">Follow Us</h3>
                </div>
                <ul>
                  <li><a href="facebook.com/massplug-magazine" class="facebook"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="twitter.com/massplug" class="twitter"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>

                </ul>
              </div>
              <!-- /footer social -->
              
              <!-- footer subscribe -->

              <!-- /footer subscribe -->
            </div>
            <!-- /Column 1 -->
            
            <!-- Column 2 -->
            <div class="col-md-4">
              <!-- footer article -->
              <div class="footer-widget">
                <div class="widget-title">
                  <h2 class="title">Music</h2>
                </div>

                <!-- ARTICLEx3 -->
                <?php foreach ($music_limit3 as $news_item): 
                $time_stamp = $news_item['time_stamp'];
                $unix_time = mysql_to_unix($time_stamp);       
                ?>           
                <article class="article widget-article">
                  <div class="article-img">
                    <a href="<?php echo site_url();?>article/<?php echo $news_item['slug']?>">
                      <img class="thumb-square-small cover-object-fit" src="<?php print HTTP_UPLOAD_MOBILE_PATH.($news_item['data_file'])?>" alt="">
                    </a>
                  </div>
                  <div class="article-body">
                    <h4 class="article-title"><a href="<?php echo site_url();?>article/<?php echo $news_item['slug']?>"><?php echo $news_item['title']?></a></h4>
                    <ul class="article-meta">
                      <li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units)?> ago</li>
                      <li><i class=""></i> </li>
                    </ul>
                  </div>
                </article>
                <?php endforeach ?> 
                <!-- /ARTICLEx3 -->
              </div>
              <!-- /footer article -->
            </div>
            <!-- /Column 2 -->
            
            <!-- Column 3 -->
            <div class="col-md-4">
              <!-- footer galery -->
              <div class="footer-widget galery-widget">
                <div class="widget-title">
                <h2 class="title">Photography</h2>
              </div>
              <ul>
                <?php foreach ($gallery_limit8 as $galler_item): ?>
                <li><a href="<?php echo site_url('photography/'.$galler_item['slug']); ?>"><img class="thumb-square-small cover-object-fit" src="<?php print HTTP_UPLOAD_MOBILE_PATH.($galler_item['data_file'])?>" alt=""></a></li>
                <?php endforeach ?>
              </ul>
              </div>
              <!-- /footer galery -->
              
            </div>
            <!-- /Column 3 -->
          </div>
          <!-- /ROW -->
        </div>
        <!-- /CONTAINER -->
      </div>
      <!-- /Top Footer -->
      
      <!-- Bottom Footer -->
      <div id="bottom-footer" class="section">
        <!-- CONTAINER -->
        <div class="container">
          <!-- ROW -->
          <div class="row">
            <!-- footer links -->
            <div class="col-md-6 col-md-push-6">
              <ul class="footer-links">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <li><a href="<?php echo site_url();?>categories/music">Music</a></li>
                <li><a href="<?php echo site_url();?>categories/photography">Photography</a></li>
                <li><a href="<?php echo site_url();?>categories/fashion">Fashion</a></li>
                <li><a href="<?php echo site_url();?>categories/entertainment">Entertainment</a></li>
                <li><a href="<?php echo site_url();?>categories/lifestyle">Lifestyle</a></li>                
              </ul>
            </div>
            <!-- /footer links -->
            
            <!-- footer copyright -->
            <div class="col-md-6 col-md-pull-6">
              <div class="footer-copyright">
                <span>
Copyright &copy;<?php echo date("Y")?> All rights reserved | <a href="<?php echo base_url();?>" target="_blank">MassPlug</a>
</span>
              </div>
            </div>
            <!-- /footer copyright -->
          </div>
          <!-- /ROW -->
        </div>
        <!-- /CONTAINER -->
      </div>
      <!-- /Bottom Footer -->
    </footer>
    <!-- /FOOTER -->
    
    <!-- Back to top -->
    <div id="back-to-top"></div>
    <!-- Back to top -->
    
    <!-- jQuery Plugins -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

  </body>
</html>
