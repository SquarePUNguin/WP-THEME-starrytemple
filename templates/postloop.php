<?php
function setter($val1, $standart)
{
    $val1=filter_var($val1,FILTER_SANITIZE_STRING);
    if (!isset($val1)) {
        $val1 = $standart;
    }
}
if (isset($args)) {
    setter($args["offset"], 0);
    setter($args["search"], "");
    setter($args["quantity"], get_option('posts_per_page'));
}
$posts = new WP_Query([
    "post_status" => "publish",
    "post_type"=>"post",
    "order_by" => "date",
    "offset" => $args["offset"],
    "s" => $args["search"],
    "posts_per_page" => $args["quantity"]
]);
if ($posts->have_posts()) {
    while ($posts->have_posts()) {
        $posts->the_post();
        ?>
        <div class="post">
            <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
            <div <?php if (has_post_thumbnail()) { ?> style="background-image:url(<?php the_post_thumbnail_url() ?>)" <?php } ?>>
                <p><?php the_excerpt() ?></p>
            </div>
        </div>
        <?php
    }
} else {
    if ($args["offset"] != 0) {
        echo "END";
    }
}
?>