<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE-edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>recipe</title>

		<link rel="stylesheet" href="<?php echo base_url('public/css/main.build.css');  ?>" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,900" rel="stylesheet" />
	</head>

	<body>
		
		<nav class="navbar navbar-default navbar-fixed-top fn-head">
			
			<div class="container">
				
				<div class="navbar-header">
					
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						
						<span class="sr-only">toggle</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a href="<?php echo base_url(); ?>" role="logo" class="navbar-brand">foodie</a>
				</div><!-- navbar-header -->
			</div><!-- navbar container -->

			<div class="container">
				
				<div id="navbar" class="navbar-header navbar-collapse collapse">
				
					<ul class="nav navbar-nav" id="main-navigation">

						<li>
							
							<a href="<?php echo base_url('/') ?>" data-category="home">Home</a>
						</li>

						<?php foreach(fn_get_categories() as $category): ?>
							
							<li>
								
								<a href="<?=base_url($category['category_name']) ?>" data-category="<?=$category['category_name'] ?>"><?=ucwords($category['category_title']) ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div><!-- navbar collapse -->
			</div>
		</nav><!-- navbar -->
	
		<div class="divider"></div>