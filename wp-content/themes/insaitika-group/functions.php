<?php

/*
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', 'insaitikagroup_scripts');
function insaitikagroup_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('stylesheet', get_template_directory_uri() . '/fonts/stylesheet.css', array(), 1.0);
    wp_enqueue_style('normalize', get_template_directory_uri() . '/styles/normalize.css', array(), 1.0);
    wp_enqueue_style('layout', get_template_directory_uri() . '/styles/layout.css', array('normalize'), 1.0);

    wp_enqueue_script('jquery');
    wp_register_script('commentjs', get_stylesheet_directory_uri() . '/js/ajax_comment.js', array('jquery'), null);
    wp_localize_script('commentjs', 'ajax', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_enqueue_script('commentjs');

}


/*
 *  Add new theme features
 */

add_action('after_setup_theme', 'insaitikagroup_setup');
function insaitikagroup_setup()
{
    add_theme_support('post-thumbnails');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_theme_support(
        'custom-logo',
        array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        )
    );


}


/*
 *  Add ajax comments
 */

add_action('wp_ajax_sendcomment', 'sendcomment');
add_action('wp_ajax_nopriv_sendcomment', 'sendcomment');

function sendcomment(){

    $comment = wp_handle_comment_submission( wp_unslash( $_POST ));

    if ( is_wp_error( $comment ) ) {
        $data = (int) $comment->get_error_data();
        if ( ! empty( $data ) ) {
            wp_die(
                '<p>' . $comment->get_error_message() . '</p>',
                __( 'Comment Submission Failure' ),
                array(
                    'response'  => $data,
                    'back_link' => true,
                )
            );
        } else {
            exit;
        }
    }

    $user            = wp_get_current_user();
    $cookies_consent = ( isset( $_POST['wp-comment-cookies-consent'] ) );

    do_action( 'set_comment_cookies', $comment, $user, $cookies_consent );

    // код из файла comments.php вашей текущей темы
    wp_list_comments(
        array(
            'avatar_size' => 60,
            'style'       => 'ol',
            'short_ping'  => true,
        ),
        array( $comment )
    );

    die();
}

