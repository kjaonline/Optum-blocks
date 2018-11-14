<?php /* Template Name: Home Template */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		
		/* Landing Page parts. Landing page will now be modularized */

		/* Splash Page. Uncomment if needed. */
		require 'index-parts/splash.php';

		?>
		<div class="home-grid">
			<div class="services">
				Services
			</div>
			<div class="products">
				Products
			</div>
			<div class="team">
				Team
			</div>
		</div>

		<div class="home-about">
			<div class="left">
				<h2>Why Optum Blocks</h2>
				<p>A Small Business Conquering Large Projects.</p>
				<a href="#">Find Out More</a>
			</div>
			<div class="right">
				<div>
					<h3>INTEGRITY</h3>
					<p>We are committed to the standards of excellence you strive to maintain by ensuring complete satisfaction in your project, through financial integrity and project expertise.</p>
				</div>
				<div>
					<h3>EXPERIENCE</h3>
					<p>Our highly skilled Construction Management team has had extensive experience with diversified construction projects and is well versed in governmental agency approval procedures.</p>
				</div>
				<div>
					<h3>REPUTATION</h3>
					<p>A major contractor in this region for 20 years, our hard-earned reputation is at stake. We are not satisfied until all your project goals are met or exceeded.</p>
				</div>
			</div>
		</div>

		<?php
			/* if ( have_posts() ) :

				
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-archive', get_post_format() );
				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;*/ 
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
