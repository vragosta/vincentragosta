	<?php get_template_part( 'partials/content', 'mobile-menu' ); ?>

	<footer id="footer" class="flex-center">

		<section class="menu">
			<a href="">Home</a>
			<a href="">Code Shop</a>
			<a href="">Portfolio</a>
			<a href="">About</a>
			<a href="">Resume</a>
			<a href="">Blog</a>
			<a href="">Contact</a>
		</section>

		<section class="flex-center">
			<div id="contact-info" class="padding-left-right">
				<h3><span>For more information, call today at </span><a href="">(917) 547-8578</a></h3>
			</div>

			<div id="copyright" class="padding-left-right">
				<p>&copy <?php echo date( 'Y' ); ?> Vincent Ragosta. All rights reserved. Brooklyn Web Design and Wordpress Expert</p>
			</div>

			<div id="docs" class="padding-left-right">
				<a href="">Terms of Service</a>
				<a href="">Return Policy</a>
				<a href="">Privacy Policy</a>
			</div>

			<?php get_template_part( 'partials/aside', 'social' ); ?>
		</section>
	</footer>

	</body>
</html>
<?php wp_footer(); ?>
