<?php
/* Template Name:weyuBlog */
?>

<?php
/*$pagedB = get_query_var('paged');
$pagedB = max( 1, $pagedB );

$offset_start = 1;
$offset = ( $pagedB - 1 ) * $per_page + $offset_start;
*/

$per_page = 8;

$args = array(
    'posts_per_page' => $per_page,
    //    'paged'          => $pagedB,
    //    'offset'         => $offset, // Starts with the second most recent post.
    'orderby'        => 'date',  // Makes sure the posts are sorted by date.
    'order'          => 'DESC',  // And that the most recent ones come first.
);

/*Setting up our custom query */
//query_posts($args);
$post_list = new WP_Query($args);

/*$total_rows = max( 0, $post_list->found_posts - $offset_start );
$total_pages = ceil( $total_rows / $per_page );
*/
if ($post_list->have_posts()) :
?>
    <div class="recentBigBox">
        <?php
        while ($post_list->have_posts()) :


            $post_list->the_post();
        ?>
            <div class="recentItem">
                <a class="recentTitle" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
            </div>

        <?php

        endwhile;
        ?>
    </div>

<?php
endif;
?>

<style>
    .recentBigBox {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        flex-wrap: wrap;
        align-items: flex-start;
        min-height: 50vh
    }

    .recentItem {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        padding-bottom: 15px;
        padding-top: 10px;
        border-bottom-style: solid;
        border-bottom-width: 1px;
        border-bottom-color: black;
    }

    .recentTitle {
        text-align: left;
        color: black;
        width: 100%;
        font-size: 16px;
        white-space: initial;
    }

    .recentTitle {
        text-align: left;
        color: black;
        width: 100%;
        font-size: 14px;
        white-space: initial;
    }
</style>