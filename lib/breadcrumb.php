<?php
/*---------------------
  パンくず
----------------------*/
function breadcrumb()
{

  $wp_obj     = get_queried_object();
  $page_id    = $wp_obj->ID;
  
  if ($wp_obj->post_parent !== 0) {
      $parent_ids = array_reverse(get_post_ancestors($page_id));
      foreach ($parent_ids as $parent_id) {

      }
  }

    $home = '<ul class="breadcrumb"><li><a href="' . get_bloginfo('url') . '" >ホーム</a></li>';
    $page = '<ul id="breadcrumb" class="breadcrumb"><li><a href="' . get_bloginfo('url') . '" >ホーム</a></li>';
    $blog = '<ul class="breadcrumb"><li><a href="' . get_bloginfo('url') . '" >ホーム</a></li><li><a href="' . home_url('/blog') . '" >ブログ</a></li>';
    $archive = '<ul class="breadcrumb"><li><a href="' . get_bloginfo('url') . '" >ホーム</a></li><li><a href="' . home_url('/blog') . '" >ブログ</a></li>';
    $webiner = '<ul class="breadcrumb"><li><a href="' . get_bloginfo('url') . '" >ホーム</a></li><li><a href="' . home_url('/webiner?action=post') . '" >ウェビナー</a></li>';



    if (is_front_page()) {

    } else if (is_single()) {

        echo $blog;
        the_title('<li>', '</li>');

    } else if (is_page()) {

        if($wp_obj->post_parent !== 0) {

          $div = '<ul id="breadcrumb" class="breadcrumb"><a href="' . get_bloginfo('url') . '" >ホーム</a></li>';
          echo $div;
          $parent_array = array_reverse(get_post_ancestors($page_id));
          foreach ($parent_array as $parent_id) {
            echo '<a href="">' .get_the_title($parent_id) . ' > </a>';
          }
          the_title('<li>', '</li>');
        } else {
          echo $page;
          the_title('<li>', '</li>');
        }
    } else if (is_archive()) {
      $category = get_the_category(); //カテゴリー情報を取得
      $cat_id   = $category[0]->cat_ID; //カテゴリーID
      $cat_name = $category[0]->cat_name; //カテゴリー名
      $cat_slug = $category[0]->category_nicename; //カテゴリースラッグ

      echo $archive;
      echo '<li>', $cat_name ,'</li>';
    } else if (is_search()) {

        echo $home;
        echo '<li>「' . get_search_query() . '」の検索結果</li>';
    } else if (is_404()) {

        echo $home;
        echo '<li>ページが見つかりません</li>';
    }
    echo "</ul></div>";
}

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_month()) {
        $title = single_month_title('', false);
    }
    return $title;
});
