<?php
/*----------------------
  投稿ページ
-----------------------*/
get_header(); ?>


<article class="entry">
  <?php
  if (have_posts()) {
    while (have_posts()) {
      the_post();
  ?>


      <p class="entry__title"><?php the_title(); ?></p><!-- title出力 -->
      <div class="entry__content">
        <?php the_content(); ?><!-- 本文出力 -->
      </div>


    <?php } ?>
  <?php } ?>
</article>



<?php get_footer(); ?>