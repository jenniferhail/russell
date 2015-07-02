<?php
/**
 * The footer template
 *
 * Contains the closing of <div id="main"> and all content after.
 *
 * @package Russell
 */
?>

    </div><!-- #main -->

</div><!-- #page -->

<footer id="colophon" role="contentinfo" class="footer">

	<div id="primary-foot">

		<div id="secondary-b" class="widget-area" role="complementary">
			<?php if ( dynamic_sidebar('sidebar-2') ) : else : endif ?>
		</div><!-- #secondary-b .widget-area -->

		<div id="secondary-c" class="widget-area" role="complementary">
			<?php if ( dynamic_sidebar('sidebar-3') ) : else : endif ?>
		</div><!-- #secondary-c .widget-area -->

    	<div id="copyright">
    		<aside class="widget">
	        	&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?><br>
	        	<a href="http://jenniferhail.com" rel="nofollow">Theme by Jennifer Hail</a>
	        </aside>
    	</div>

	</div>

</footer><!-- #colophon -->

<?php wp_footer(); ?> 
</body>
</html>