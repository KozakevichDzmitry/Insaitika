<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package insaitikaGroup
 */

if ( post_password_required() ) : return; endif; ?>

    <ol class="comment-list">
        <?php
        // Получаем комментарии поста с ID XXX из базы данных
        $ID = get_the_ID();
        $comments = get_comments(array(
            'post_id' => $ID,
            'status' => 'approve' // комментарии прошедшие модерацию
        ));

        // Формируем вывод списка полученных комментариев
        wp_list_comments(array(
            'per_page' => 10, // Пагинация комментариев - по 10 на страницу
            'reverse_top_level' => true, // Показываем последние комментарии в начале
            'reverse_children' => true, // Показываем последние комментарии в начале
        ), $comments);
        ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-below" class="comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'sydney' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '← Older Comments', 'sydney' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments →', 'sydney' ) ); ?></div>
        </nav><!-- #comment-nav-below -->
    <?php endif; // check for comment navigation
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'sydney' ); ?></p>
    <?php endif; ?>

    <?php
    $args = array(
        'comment_notes_after'  => '',
        'id_form'              =>  " commentform_$ID",
        'id_submit'            =>  "submit_$ID",
    );

    comment_form($args);

    ?>


