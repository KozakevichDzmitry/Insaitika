<?php
get_header();
?>
    <main class="main">
        <div class="container">
            <?php if (have_posts()) :
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', get_post_type()); ?>

                    <div id="comments" class="comments-area">

                    <?php  if ( comments_open() || get_comments_number() ) :
                        get_template_part('comments');
                    endif; ?>

                    </div><!-- #comments -->
                    </article><!-- .article__post -->
                <?php
                endwhile;

                    the_posts_navigation();

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>
        </div><!-- .container -->
    </main><!-- .main -->
<?php

get_footer();
