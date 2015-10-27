<?php get_header(); ?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<?php
	if(have_posts()){
		while(have_posts()){
			echo the_content();
		}
	}

?>

<?php get_footer(); ?>