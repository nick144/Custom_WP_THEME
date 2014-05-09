<div class="clear"></div>
<!--Footer Begin-->
	<div class="social">
		<div class="half" align="right">
			<ul id="social-icons">
				<li><a href="<?php echo get_option('bg_facebook_link'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-fb.png" /></a></li>
				<li><a href="<?php echo get_option('bg_twitter_link'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-tw.png" /></a></li>
				<li><a href="<?php echo get_option('bg_pinterest_link'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-pt.png" /></a></li>
				<li><a href="<?php echo get_option('bg_instagram_link'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-ig.png" /></a></li>
				<li><a href="<?php echo get_option('bg_tumblr_link'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/social-tm.png" /></a></li>
			</ul>
		</div>
		<div class="half">
			<div id="newsletter">
				<!-- Begin MailChimp Signup Form -->
				<label>Sign Up for Promotions &amp; Updates</label>
				<div id="mc_embed_signup">
				<form action="http://bellagemelli.us8.list-manage.com/subscribe/post?u=07321b31da018314d4fdb9d65&amp;id=bf71cbab49" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					
				<div class="indicates-required"></div>
				<div class="mc-field-group">
					<input type="email" value="" name="EMAIL" class="required email" placeholder="email" id="mce-EMAIL">
				</div>

					<div id="mce-responses">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				    <div style="position: absolute; left: -5000px;"><input type="text" name="b_07321b31da018314d4fdb9d65_bf71cbab49" value=""></div>
					<div class="mail-chimp-submit"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				</form>
				</div>

				<!--End mc_embed_signup-->
			</div>
			
		</div>
	</div>
	<div class="clear"></div>
	<div class="footer" align="center">
		<ul id="footer-nav">
			<?php

							$site_map = array(
								'theme_location'  => 'footer_nav',
								'menu'            => '',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '%3$s',
								'depth'           => 0,
								'walker'          => ''
							); 
						
						
							wp_nav_menu($site_map); ?>
		</ul>
	</div>
	<div class="clear"></div>
	<div class="copyright">&copy;
			<?php 
		
				if(get_option('on_footer_copy')):
				
				echo stripslashes(get_option('on_footer_copy')); 
				
				else:
			?>
			
			2014 BELLA GEMELLI. Privacy Policy Terms
			
			<?php endif; ?>
			
	</div>
	<!--Footer End-->
</div>
<?php wp_footer(); ?> 
</body>
</html>