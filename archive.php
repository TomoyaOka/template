<?php
/*----------------------
  アーカイブページ
-----------------------*/
get_header(); ?>
<div class="archive">
  <p class="archive__title"><?php echo get_the_archive_title() ?></p>
  <div class="archive__content">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
    ?>

        <article class="archive__box">
          <div class="archive__box-item">
            <p><a href="<?php echo get_permalink() ?>"><?php echo get_the_title(); ?></a></p>
          </div>
        </article>

      <?php } ?>
  <?php } ?>
  </div>
</div>
<?php get_footer(); ?>