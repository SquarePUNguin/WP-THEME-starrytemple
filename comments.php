<br>
<div id="comments" class="comments-area">
    <?php

    // The comment Query
    $comments = get_comments([
        'post_id' => $post->ID,
        'status' => 'approve',
        'post_status' => 'publish',
        'hierarchical' => true
    ]);
    // Comment Loop
    if ($comments) {
        wp_list_comments($comments);
    }
    ?>
</div>
<?php comment_form() ?>
<style>
    
</style>