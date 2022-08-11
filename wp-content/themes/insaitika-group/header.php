<?php
/**
 * The header
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
    <div class="container">
        <div class="header__logo">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo the_custom_logo(); ?></a>
        </div><!-- .header__logo -->
    </div><!-- .container -->
</header><!-- .header -->
