<article class="article__post" id="post_<?php the_ID();?>">
    <div class="entry-header cf">
        <h1 class="article__post-title"><?php the_title(); ?></h1>
        <p class="article__post-meta">
            <time class="article__post-date" datetime="<?php the_date('c'); ?>"><?php the_time('M N, Y'); ?></time>
            <span>/</span>
            <span class="article__post-categories">
         <?php the_category('/ '); ?>
         </span>
        </p>
    </div>
    <div class="article__post-content">
        <?php the_content(); ?>
        <p class="article__post-tags">
            <?php the_tags('<span>Tagged in: </span>', ', '); ?>
        </p>
    </div><!-- .article__content -->
