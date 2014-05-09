<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

		 <div id="content" class="site-content not-found" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( '404 Not Found', 'dom-theme' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="notfound-content">
					<?php get_search_form(); ?>
					
					<h2><?php _e( 'This is somewhat embarrassing, isn\'t it?', 'dom-theme' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'dom-theme' ); ?></p>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
		
<!--Content End-->
			
<?php get_footer(); ?>