<?php

$posts = new WP_Query([
  "post_status" => "publish",
  "post_type" => "post",
  "orderby" => "date",
  "offset" => absint($args["offset"]),
  "s" => sanitize_text_field($args["search"]),
  "posts_per_page" => absint($args["quantity"]),
  'no_found_rows' => true
]);
if ($posts->have_posts()) {
  while ($posts->have_posts()) {
    $posts->the_post();
?>
    <div class="post">
      <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
      <div <?php if (has_post_thumbnail()) { ?> style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url()) ?>)" <?php } ?>>
        <?php the_excerpt() ?>
      </div>
    </div>
<?php
  }
  wp_reset_postdata();
} else {
  if ($args["offset"] != 0) {
    echo "END";
  }
}
?>
