    <div id="footer">
         	<div class="fleft">
            <p> &copy; <?php the_time('Y'); ?> <?php bloginfo(); ?>  All right reserved.</p>
            
             <?php if ( get_option('ptthemes_footerpages') <> "" ) { ?>
			<ul>
			<?php wp_list_pages('title_li=&depth=0&include=' . get_option('ptthemes_footerpages') . '&sort_column=menu_order'); ?>
			</ul>
		<?php } ?>
            
           </div>
            
         
        
        
        <p class="fr"> <span class="copyright ">test Theme by</span> <span cclass="templatic">   <a href="http://google.com" title="google.com">google.com</a>  </span>  </p>
        
     </div><!-- footer #end -->

 <?php wp_footer(); ?><?php if ( get_option('ptthemes_google_analytics') <> "" ) { echo stripslashes(get_option('ptthemes_google_analytics')); } ?>

</body>

</html>
		