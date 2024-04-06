<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>MassPlug - Home</title>

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

		<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/mystyle.css">

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
			<!-- Top Header -->
			<!--<div id="top-header" class="fixed">
				<div class="container">
					<nav id="main-nav">
					<div class="header-links">
						<ul>
				            <li><a href="<?php echo site_url();?>categories/entertainment">Entertainment</a></li>
				            <li><a href="<?php echo site_url();?>categories/music">Music</a></li>
				            <li><a href="<?php echo site_url();?>categories/photography">Photography</a></li>
				            <li><a href="<?php echo site_url();?>categories/fashion">Fashion</a></li>
				            <li><a href="<?php echo site_url();?>categories/lifestyle">Lifestyle</a></li>
				            <li><a href="<?php echo site_url();?>categories/technology">Tech</a></li>						
						</ul>
					</div>
					<div class="header-social">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
					</nav>
				</div>
			</div>
			<!-- /Top Header -->			
			
			<!-- Nav Header -->
			<div id="nav-header">
				<div class="container">
					<nav id="main-nav">
						<div class="nav-logo">
							<a href="#" class="logo"><img src="" alt=""></a>
						</div>
						<ul class="main-nav nav navbar-nav">
				            <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
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
							<h2 class="title">Recent News</h2>
						</div>
						<!-- /section title -->
						
						<!-- Tab content -->
						<div class="tab-content">
							<!-- tab1 -->
							<div id="tab1" class="tab-pane fade in active">
								<!-- row -->
								<div class="row">
									<!-- Column -->
								<?php foreach ($main_limit4 as $news_item):
								$time_stamp = $news_item['time_stamp'];
								$unix_time = mysql_to_unix ($time_stamp);
								?>	
									<div class="col-md-3 col-sm-6">
										<!-- ARTICLE -->
										<article class="article">
											
											<div class="article-img">
												
												<a href="<?php echo site_url('article/'.$news_item['slug']); ?>">
													<img class="thumb-square-large cover-object-fit" src="<?php print HTTP_UPLOAD_MEDIUM_PATH.($news_item['data_file'])?>" alt="">
												</a>
												<ul class="article-info">
	
												</ul>
											</div>
											<div class="article-body">
												<h4 class="article-title"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?></a></h4>
												<ul class="article-meta">
													<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units);?> ago</li>
													<li><i class=""></i> </li>
												</ul>
												
											</div>
											
										</article>
										<!-- /ARTICLE -->
									</div>
									<?php endforeach ?>
									<!-- /Column -->
								</div>	
								<!-- row -->
								<div class="row">
									<!-- Column -->
								<?php foreach ($main_limit6skip4 as $news_item): 
								$time_stamp = $news_item['time_stamp'];
								$unix_time = mysql_to_unix ($time_stamp);
								?>	
									<div class="col-md-4 col-sm-6">
										<!-- ARTICLE -->
										<article class="article widget-article">
											<div class="article-img">
												<a href="<?php echo site_url('article/'.$news_item['slug']); ?>">
													<img class="thumb-square-small cover-object-fit" src="<?php print HTTP_UPLOAD_MOBILE_PATH.($news_item['data_file'])?>" alt="">
												</a>
											</div>
											<div class="article-body">
												<h4 class="article-title"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?></a></h4>
												<ul class="article-meta">
													<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units);?> ago</li>
													<li><i class=""></i> </li>
												</ul>
											</div>
										</article>
										<!-- /ARTICLE -->
									</div>
									<!-- /Column -->
								<?php endforeach ?>	
								</div>
								<!-- /row -->
							</div>
							<!-- /tab1 -->
						</div>
						<!-- /tab content -->
					</div>
					<!-- /Main Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->
		
		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-8">
						<!-- row -->
						<div class="row">
							<!-- Column 1 -->
							<div class="col-md-6 col-sm-6">
								<!-- section title -->
								<div class="section-title">
									<h2 class="title">Fashion</h2>
								</div>
								<!-- /section title -->
								
								<!-- ARTICLE -->
								<article class="article">
								<?php foreach ($fashion_limit1 as $news_item):
								$time_stamp = $news_item['time_stamp'];
								$unix_time = mysql_to_unix($time_stamp);
								?>
									<div class="article-img">
										<a href="<?php echo site_url('article/'.$news_item['slug']); ?>">
											<img class="thumb-square-large cover-object-fit" src="<?php print HTTP_UPLOAD_LARGE_PATH.($news_item['data_file'])?>" alt="">
										</a>
										<ul class="article-info">
										</ul>
									</div>
									<div class="article-body">
										<h3 class="article-title"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?></a></h3>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units)?> ago</li>
											<li><i class=""></i> </li>
										</ul>
										<p><?php echo $news_item['hooker']?></p>
									</div>
								<?php endforeach?>	
								</article>
								<!-- /ARTICLE -->
								
								<!-- ARTICLE -->
							<?php foreach ($fashion_limit2skip1 as $news_item):
							$time_stamp = $news_item['time_stamp'];
							$unix_time = mysql_to_unix($time_stamp);
							?>								
								<article class="article widget-article">
									
									<div class="article-img">
										<a href="<?php echo site_url('article/'.$news_item['slug']); ?>">
											<img class="thumb-square-small" src="<?php print HTTP_UPLOAD_MOBILE_PATH.($news_item['data_file'])?>" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?></a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units)?> ago</li>
											<li><i class=""></i> </li>
										</ul>
									</div>
								</article>
							<?php endforeach ?>
								<!-- /ARTICLE -->
							</div>	
							<!-- /Column 1 -->
							
							<!-- Column 2 -->
							<div class="col-md-6 col-sm-6">
								<!-- section title -->
								<div class="section-title">
									<h2 class="title">Music</h2>
								</div>
								<!-- /section title -->
								
								<!-- ARTICLE -->
								<article class="article">
							<?php foreach ($music_limit1 as $news_item):
							$time_stamp = $news_item['time_stamp'];
							$unix_time = mysql_to_unix($time_stamp);
								?>
									<div class="article-img">
										<a href="<?php echo site_url('article/'.$news_item['slug']); ?>">
											<img class="thumb-square-large cover-object-fit" src="<?php print HTTP_UPLOAD_LARGE_PATH.($news_item['data_file'])?>" alt="">
										</a>
										<ul class="article-info">
										</ul>
									</div>
									<div class="article-body">
										<h3 class="article-title"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?></a></h3>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units)?> ago</li>
											<li><i class=""></i> </li>
										</ul>
										<p><?php echo $news_item['hooker']?></p>
									</div>
							<?php endforeach?>	
								</article>
								<!-- /ARTICLE -->
								
								<!-- ARTICLE -->
								<?php foreach ($music_limit2skip1 as $news_item):
								$time_stamp = $news_item['time_stamp'];
								$unix_time = mysql_to_unix($time_stamp);
								?>								
								<article class="article widget-article">
									<div class="article-img">
										<a href="<?php echo site_url('article/'.$news_item['slug']); ?>">
											<img class="thumb-square-small cover-object-fit" src="<?php print HTTP_UPLOAD_MOBILE_PATH.($news_item['data_file'])?>" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?></a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units)?> ago</li>
											<li><i class=""></i> </li>
										</ul>
									</div>
								</article>
								<?php endforeach ?>
								<!-- /ARTICLE -->
							</div>	
							<!-- /Column 2 -->
						</div>
						<!-- /row -->
						
						<!-- row -->
						<div class="row">
							<!-- section title -->
							<div class="col-md-12">
								<div class="section-title">
									<h2 class="title">Entertainment</h2>
								</div>
							</div>
							<!-- /section title -->
							
							<!-- Column -->
							<?php foreach ($entertainment_limit2 as $news_item):
							$time_stamp = $news_item['time_stamp'];
							$unix_time = mysql_to_unix($time_stamp);							
							?>
							<div class="col-md-6 col-sm-6">
								<!-- ARTICLE -->
								<article class="article">
									
									<div class="article-img">
										<a href="<?php echo site_url('article/'.$news_item['slug']); ?>">
											<img class="thumb-square-large cover-object-fit" src="<?php print HTTP_UPLOAD_LARGE_PATH.($news_item['data_file'])?>" alt="">
										</a>
										<ul class="article-info">
										</ul>
									</div>
									<div class="article-body">
										<h3 class="article-title"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?></a></h3>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units)?> ago</li>
											<li><i class=""></i> </li>
										</ul>
										<p><?php echo $news_item['hooker']?></p>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- /Column -->
							<?php endforeach ?>
						</div>
						<!-- /row -->
						
						<!-- row -->
						<div class="row">
							<!-- Columns 3x -->
						<?php foreach ($entertainment_limit3skip2 as $news_item):
						$time_stamp = $news_item['time_stamp'];
						$unix_time = mysql_to_unix($time_stamp);
						?>								
							<div class="col-md-4 col-sm-4">
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img">
										<a href="<?php echo site_url('article/'.$news_item['slug']);?>">
											<img class="thumb-square-medium cover-object-fit" src="<?php print HTTP_UPLOAD_THUMB_PATH.($news_item['data_file'])?>" alt="">
										</a>
										<ul class="article-info">
										</ul>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="<?php echo site_url('article/'.$news_item['slug']);?>"><?php echo $news_item['title']?></a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units)?> ago</li>
											<li><i class=""></i> </li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- /Columns 3x -->
						<?php endforeach ?>
						</div>
						<!-- /row -->
					</div>
					<!-- /Main Column -->
					
					<!-- Aside Column -->
					<div class="col-md-4">
						<!-- Ad widget -->
						<?php foreach ($top_limit1 as $news_item):?>
						<div class="widget center-block hidden-xs">
							<img class="thumb-ad cover-object-fit" src="<?php echo base_url();?>uploads/<?php echo $news_item['data_file']?>" alt="">
						</div>
						<?php endforeach ?> 
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
						
						<!-- subscribe widget/Turn To Ad Section? -->

						<!-- /subscribe widget/Turn to Ad Section? -->
						
						<!-- article widget -->
						<div class="widget">
							
							<!-- ARTICLE -->
							<?php foreach ($music_limit8skip3 as $news_item):
							$time_stamp = $news_item['time_stamp'];
							$unix_time = mysql_to_unix($time_stamp);
							?>								
							<article class="article widget-article">
								<div class="article-img">
									<a href="<?php echo site_url('article/'.$news_item['slug']); ?>">
										<img class="thumb-square-small" src="<?php print HTTP_UPLOAD_MOBILE_PATH.($news_item['data_file'])?>" alt="">
									</a>
								</div>
								<div class="article-body">
									<h4 class="article-title"><a href="<?php echo site_url('article/'.$news_item['slug']); ?>"><?php echo $news_item['title']?></a></h4>
									<ul class="article-meta">
										<li><i class="fa fa-clock-o"></i> <?php echo timespan($unix_time, $now, $units);?> ago </li>
										<li><i class=""></i> </li>
									</ul>
								</div>
							</article>
							<?php endforeach ?> 
							<!-- /ARTICLE -->
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
				
		<!-- FOOTER -->
		<footer id="footer">
			<!-- Top Footer -->
			<div id="top-footer" clas  s="section">
				<!-- CONTAINER -->
				<div class="container">
					<!-- ROW -->
					<div class="row">
						<!-- Column 1 -->
						<div class="col-md-4">
							<!-- footer about -->
							<div class="footer-widget about-widget">
								<div class="footer-logo">
									<a href="#" class="logo"><img src="images/logo-white-red.png" alt=""></a>
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
						</div>
						<!-- /Column 1 -->
						<div class="col-md-4">
						</div>
						
						<div class="col-md-4">
						<!-- gallery widget -->
						<div class="footer-widget galery-widget">
							<div class="widget-title">
								<h2 class="title">Photography</h2>
							</div>
							<ul>
								<?php foreach ($gallery_limit8 as $galler_item): ?>
								<li><a href="<?php echo site_url('photography/'.$galler_item['slug']); ?>"><img class="thumb-square-small cover-box-fit" src="<?php print HTTP_UPLOAD_MOBILE_PATH.($galler_item['data_file'])?>" alt=""></a></li>
								<?php endforeach ?>
							</ul>
						</div>
						<!-- /gallery widget -->							
							
						</div>	
						
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
					            <li><a href="<?php echo site_url();?>categories/entertainment">Entertainment</a></li>
					            <li><a href="<?php echo site_url();?>categories/music">Music</a></li>
					            <li><a href="<?php echo site_url();?>categories/photography">Photography</a></li>
					            <li><a href="<?php echo site_url();?>categories/fashion">Fashion</a></li>
					            <li><a href="<?php echo site_url();?>categories/technology">Tech</a></li>
					            <li><a href="<?php echo site_url();?>categories/lifestyle">Lifestyle</a></li>
							</ul>
						</div>
						<!-- /footer links -->
						
						<!-- footer copyright -->
						<div class="col-md-6 col-md-pull-6">
							<div class="footer-copyright">
								<span>
							Copyright &copy;<?php echo date("Y")?> All rights reserved | <a href="<?php echo base_url();?>">MassPlug</a>
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
