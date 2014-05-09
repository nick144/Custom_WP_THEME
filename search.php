<?php
/*
Template Name: Search Page
*/

get_header(); ?>

		 <div id="content" class="blog-content" role="main">

			<div class="blog-post">
				<div class="search-box">
					<?php
						global $wp_query;
						$total_results = $wp_query->found_posts;
					?>
				
					<h2><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>');?></h2>
					<p>Search Count : <?php echo $total_results; ?></p>
					<?php get_search_form(); ?>
				</div>
			
				<?php

					global $query_string;

					$query_args = explode("&", $query_string);
					$search_query = array();

					foreach($query_args as $key => $string) {
						$query_split = explode("=", $string);
						$search_query[$query_split[0]] = urldecode($query_split[1]);
					} // foreach

					$search = new WP_Query($search_query);
					
					if ( $search->have_posts() ) {
							
						while ( $search->have_posts() ) {
							$search->the_post(); 
							echo '<div class="blog search_result">';
							?>
							<h3><?php the_title(); ?></h3>
							<p><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink() ?>" class="read-more">Read More</a>
								
							<?php	
							echo '</div>';
							echo '<div class="blog-seperator"></div>';

						}
							
							
					} else { ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						
						<?php
					}

					wp_reset_postdata();
					
					
					
					
				?>
			</div>
			
		</div><!-- #content -->
			
<?php get_footer(); ?>