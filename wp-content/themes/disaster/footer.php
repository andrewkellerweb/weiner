			</div><!-- .container -->
		</div><!-- .site-main #main -->
		
		<?php get_sidebar( 'bottom' ); ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<?php get_template_part( 'menu', 'subsidiary' ) ?>
			</div><!-- .container -->
		</footer><!-- #colophon .site-footer -->
		
	</div><!-- #page .site -->

	<?php get_template_part( 'style', 'switcher' ); ?>
	
<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58323540-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>