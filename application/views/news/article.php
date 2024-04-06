<?php
$time_stamp = $main_item['time_stamp'];
$unix_time = mysql_to_unix($time_stamp);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>MassPlug - Read Article</title>

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
				<div class="container-fluid row">
					<nav id="main-nav">
						<div class="nav-logo">
							<a href="#" class="logo"><img src="" alt=""></a>
						</div>
						<ul class="main-nav nav navbar-nav">
							<li><a href="<?php echo site_url();?>">Home</a></li>
							<li><a href="<?php echo site_url();?>categories/entertainment">Entertainment</a></li>
							<li><a href="<?php echo site_url();?>categories/photography">Photography</a></li>
							<li><a href="<?php echo site_url();?>categories/lifestyle">Lifestyle</a></li>
							<li><a href="<?php echo site_url();?>categories/fashion">Fashion</a></li>
							<li><a href="<?php echo site_url();?>categories/music">Music</a></li>
							<li><a href="<?php echo site_url();?>categories/technology">Tech</a></li>
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
					<div class="col-md-8">
 
						<!-- breadcrumb -->
						<ul class="article-breadcrumb">
							<li><a href="<?php echo site_url();?>">Home</a></li>
							<li><a href="<?php echo site_url();?>categories/<?php echo $main_item['category']?>"><?php echo $main_item['category']?></a></li>
							<li><?php echo $main_item['title']?></li>
						</ul>
						<!-- /breadcrumb -->
					
						<!-- ARTICLE POST -->
						<article class="article article-post">
							<div class="article-share">
								<a href="https://facebook.com/massplug-magazine" class="facebook"><i class="fa fa-facebook"></i></a>
								<a href="https://twitter.com/massplug" class="twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
							</div>
							<div class="article-main-img">
								<img src="<?php echo base_url();?>uploads/<?php echo $main_item['data_file'];?>" alt="">
							</div>
							<div class="article-body">
								<ul class="article-info">
									<li class="article-category"><a href="<?php echo site_url();?>categories/<?php echo $main_item['category']?>"><?php echo $main_item['category']?></a></li>
									<li class="article-type"><i class="fa fa-file-text"></i></li>
								</ul>
								<h1 class="article-title"><?php echo $main_item['title']?></h1>
								<ul class="article-meta">
									<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units)?> ago</li>
									<li><i class=""></i> </li>
								</ul>
								<p><?php echo $main_item['article']?></p>	
							</div>
						</article>
						<!-- /ARTICLE POST -->
						
						<!-- widget tags -->
						<div class="widget-tags">
							<ul>
								<li><a href="#">News</a></li>
								<li><a href="<?php echo site_url();?>categories/<?php echo $main_item['category']?>"><?php echo $main_item['category']?></a></li>
							</ul>
						</div>
						<!-- /widget tags -->
						
						<!-- article comments -->
						<div class="article-comments">
							<div class="section-title">
								<h2 class="title">Comments</h2>
							</div>
								
							<!-- comment -->
							<?php if ($comment_count < 1) 
                			{
                  				echo "No comments yet, be the first to comment";
                			}else
							foreach ($main_comments as $com):
							$comment_time = $com['time_stamp'];
							$unix_ctime = mysql_to_unix($comment_time);
							?>	
							<div class="media">

								<div class="media-left">
									<img src="img/av-1.jpg" alt="">
								</div>
							
								<div class="media-body">

									<div class="media-heading">
										<h5><?php echo $com['commenter_name'] ?> <span class="reply-time"><?php echo timespan($unix_ctime, $now, $units)?> ago</span></h5>
									</div>
									<p><?php echo $com['comment'] ?></p>				
									<a href="#" class="reply-btn">Reply</a>

								</div>
								
							</div>
							<?php endforeach ?>	
							<!-- /comment -->
						</div>
						<!-- /article comments -->
						
						<!-- reply form -->
						<div class="article-reply-form">
							<div class="section-title">
								<h2 class="title">Leave a reply</h2>
							</div>
								
							<?php echo form_open_multipart('comment/upload_main_comment');?>
								<input class="input" placeholder="Name" type="text" name="commenter_name" required>
								<textarea class="input" placeholder="Message" name="comment" required></textarea>
								
								<button class="input-btn">Send Message</button>
							</form>
						</div>
						<!-- /reply form -->
					</div>
					
					<!-- /Main Column -->
					
					<!-- Aside Column -->
					<div class="col-md-4">
						<!-- Ad widget -->
						<div class="widget center-block hidden-xs">
							<img class="center-block" src="" alt=""> 
						</div>
						<!-- /Ad widget -->
						
						<!-- social widget -->
						<div class="widget social-widget">
							<div class="widget-title">
								<h2 class="title">Stay Connected</h2>
							</div>
							<ul>
								<li><a href="https://facebook.com/massplug-magazine" class="facebook"><i class="fa fa-facebook"></i><br><span>Facebook</span></a></li>
								<li><a href="https://twitter.com/massplug" class="twitter"><i class="fa fa-twitter"></i><br><span>Twitter</span></a></li>
								<li><a href="#" class="instagram"><i class="fa fa-instagram"></i><br><span>Instagram</span></a></li>
							</ul>
						</div>
						<!-- /social widget -->
						
						<!-- subscribe widget Turn to Ad Maybe? -->
						<!-- /subscribe widget Turn to Ad Maybe? -->
						
						<!-- article widget -->
						<div class="widget">
							<div class="widget-title">
								<h2 class="title">Editors Pick</h2>
							</div>
							
							<?php foreach ($main_limit4random as $news_item):
							$time_stamp = $news_item['time_stamp'];
							$unix_time = mysql_to_unix($time_stamp)
							?>
							<!-- ARTICLE -->
							<article class="article widget-article">
								<div class="article-img">
									<a href="<?php echo site_url();?>article/<?php echo $news_item['slug']?>">
										<img class="thumb-square-small cover-object-fit" src="<?php print HTTP_UPLOAD_MOBILE_PATH.($news_item['data_file'])?>" alt="">
									</a>
								</div>
								<div class="article-body">
									<h4 class="article-title"><a href="<?php echo site_url();?>article/<?php echo $news_item['slug']?>"><?php echo $news_item['title']?></a></h4>
									<ul class="article-meta">
										<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units);?> ago</li>
										<li><i class=""></i> </li>
									</ul>
								</div>
							</article>
							<?php endforeach ?> 
							<!-- /ARTICLE -->
						</div>
						<!-- /article widget -->
						
							<!-- /owl carousel 4 -->
						</div>
						<!-- /article widget -->
					</div>
					<!-- /Aside Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->
		
		<!-- AD SECTION -->
		<div class="visible-lg visible-md">
			<img class="center-block" src="" alt="">
		</div>
		<!-- /AD SECTION -->
		
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
							<h2 class="title">Related Posts</h2>
						</div>
						<!-- /section title -->
						
						<!-- row -->
						<div class="row">
							<!-- Column 4x -->
							<?php foreach ($category_byvar as $news_item):
							$time_stamp = $news_item['time_stamp'];
							$unix_time = mysql_to_unix($time_stamp);
							?>							
							<div class="col-md-3 col-sm-6">
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img">
										<a href="<?php echo site_url();?>article/<?php echo $news_item['slug']?>">
											<img class="thumb-square-medium cover-object-fit" src="<?php print HTTP_UPLOAD_MEDIUM_PATH.($news_item['data_file'])?>" alt="">
										</a>
										<ul class="article-info">
										</ul>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="<?php echo site_url();?>article/<?php echo $news_item['slug']?>"><?php echo $news_item['title']?></a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units)?> ago</li>
											<li><i class=""></i> </li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<?php endforeach ?>	
							<!-- /Column 4x -->
						</div>
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
									<li><a href="https://facebook.com/massplug-magazine" class="facebook"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://twitter.com/massplug" class="twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
							<!-- /footer social -->
							
							<!-- footer subscribe -->

							<!-- /footer subscribe -->
						</div>
						<!-- /Column 1 -->
						<div class="col-md-4">
						</div>						
						<!-- Column 3 -->
						<div class="col-md-4">
							<!-- footer galery -->
							<div class="footer-widget galery-widget">
								<div class="widget-title">
								<h2 class="title">Photography</h2>
							</div>
							<ul>
								<?php foreach ($gallery_limit8 as $galler_item): ?>
								<li><a href="<?php echo site_url('photography/'.$galler_item['slug']); ?>"><img class="thumb-square-small" src="<?php print HTTP_UPLOAD_MOBILE_PATH.($galler_item['data_file'])?>" alt=""></a></li>
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
								<li><a href="#">About us</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">Advertisement</a></li>
								<li><a href="#">Privacy</a></li>
							</ul>
						</div>
						<!-- /footer links -->
						
						<!-- footer copyright -->
						<div class="col-md-6 col-md-pull-6">
							<div class="footer-copyright">
								<span>
Copyright &copy;<?php echo date("Y")?></script> All rights reserved | <a href="<?php echo base_url();?>" target="_blank">MassPlug</a>
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
