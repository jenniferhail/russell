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

    	<div id="copyright">
    		<aside class="widget">
	        	&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> | Site by <a href="http://bypine.co" rel="nofollow">Pine</a>
	        </aside>
    	</div>

	</div>

</footer><!-- #colophon -->

<?php wp_footer(); ?> 
</body>
</html>