<?php
/**
 * StoryCorps - Twenty Sixteen functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 */

# Useful global constants.
define( 'VINCENTRAGOSTA_COM_VERSION', '0.1.0' );
define( 'VINCENTRAGOSTA_COM_TEMPLATE_URL', get_template_directory_uri() );
define( 'VINCENTRAGOSTA_COM_PATH', get_template_directory() . '/' );
define( 'VINCENTRAGOSTA_COM_INC', VINCENTRAGOSTA_COM_PATH . 'includes/' );
define( 'VINCENTRAGOSTA_SITE_ADMIN', 1 );
define( 'VINCENTRAGOSTA_COM_IMAGE_SIZE', 'full' );

# Include compartmentalized functions.
require_once VINCENTRAGOSTA_COM_INC . 'functions/core.php';

# Include essential functions.
require_once VINCENTRAGOSTA_COM_INC . 'functions/essentials.php';

# Helper functions.
require_once VINCENTRAGOSTA_COM_INC . 'functions/helpers.php';

# Include widgets.
require_once VINCENTRAGOSTA_COM_INC . 'widgets/class-instagram.php';
require_once VINCENTRAGOSTA_COM_INC . 'widgets/class-notification.php';
require_once VINCENTRAGOSTA_COM_INC . 'widgets/class-text-column.php';

# Include api files.
// require_once VINCENTRAGOSTA_COM_INC . 'api/class-wp-rest-contact.php';

# Run the setup functions.
VincentRagosta\Functions\Core\setup();

# Run the essential functions.
VincentRagosta\Functions\Essentials\setup();
