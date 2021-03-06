<?php
/**
 * The template for displaying the header.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" href="<?php echo home_url( 'wp-content/themes/twenty-sixteen/assets/images/favicon.ico' ); ?>" type="image/x-icon" />
		<link rel="shortcut icon" href="<?php echo home_url( 'wp-content/themes/twenty-sixteen/assets/images/favicon.ico' ); ?>" type="image/x-icon" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php \VincentRagosta\get_partial( 'template-parts/header/nav' ); ?>
