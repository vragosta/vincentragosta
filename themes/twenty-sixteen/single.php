<?php get_header(); ?>

<section id="pagination-controls">
	<div>
		<?php previous_post_link( '%link', '&#10216;' ); ?>
		<a href="<?php echo home_url( '/portfolio/' ); ?>"><i class="fa fa-th-large"></i></a>
		<?php next_post_link( '%link', '&#10217;' ); ?>
	</div>
</section>

<?php get_footer(); ?>
