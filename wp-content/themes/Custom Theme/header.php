<!DOCTYPE html>
<html>
	<head>
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="wrapper">
			<header id="header">
				<?php
					if(has_post_thumbnail(get_queried_object_id())){
						?>
						<figure id="banner-figure">
							<?php echo get_the_post_thumbnail(get_queried_object_id()); ?>
						</figure>
						<?php
					}
				?>
				
				<section id="blog-title">
					<h1><?php echo get_bloginfo( 'name' ); ?></h1>
					<h3><?php echo get_bloginfo( 'description' ); ?></h3>
				</section>
			</header>