<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package CodingSimply
 * @subpackage Coding_Simply
 * @since Coding Simply 1.0
 */
?>

            </div><!-- .site-content -->
        </div>
    </div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				/**
				 * Fires before the Coding Simply footer text for footer customization.
				 *
				 * @since Coding Simply 1.0
				 */
				do_action( 'codingsimply_credits' );
			?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-86849990-1', 'auto');
	  ga('send', 'pageview');

	</script>
</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
