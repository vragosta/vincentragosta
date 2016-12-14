	<footer id="footer">
		<div id="footer-menu" class="full-width">
			<a href="">Home</a>
			<a href="">Code Shop</a>
			<a href="">Portfolio</a>
			<a href="">About</a>
			<a href="">Resume</a>
			<a href="">Blog</a>
			<a href="">Contact</a>
		</div>
		<div id="contact" class="flex-center">
			<h3><span>For more information, call today at </span><a href="">(917) 547-8578</a></h3>
		</div>
		<div id="copyright" class="flex-center">
			<p>&copy <?php echo date( 'Y' ); ?> Vincent Ragosta. All rights reserved. Brooklyn Web Design and Wordpress Expert</p>
		</div>
		<div id="docs" class="flex-center">
			<a href="">Terms of Service</a>
			<a href="">Return Policy</a>
			<a href="">Privacy Policy</a>
		</div>

		<?php get_template_part( 'partials/aside', 'social' ); ?>
	</footer>

	</body>
</html>
<?php wp_footer(); ?>
