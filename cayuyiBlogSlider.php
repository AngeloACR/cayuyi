<?php
/* Template Name:weyuBlog */
?>

<?php
/*$pagedB = get_query_var('paged');
$pagedB = max( 1, $pagedB );

$offset_start = 1;
$offset = ( $pagedB - 1 ) * $per_page + $offset_start;
*/

$per_page = 3;

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
    <div class="sliderBigBox">
        <?php
        while ($post_list->have_posts()) :


            $post_list->the_post();
        ?>
            <div class="sliderItem">
                <div class="sliderImage">
                    <?php the_post_thumbnail('full'); ?>
                </div>
                <div class="sliderTitle">
                    <p><?php the_title(); ?></p>
                    <a class="sliderLink" href="<?php the_permalink() ?>">Leer más</a>
                </div>
            </div>

        <?php

        endwhile;
        ?>

    </div>

<?php
endif;
?>

<style>
    .sliderBigBox {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        align-items: flex-start;
        padding: 10px;
        background-color: black;
    }

    .sliderItem {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        width: 40%;
        margin: 10px;
        position: relative;
        background-color: black;
        min-height: 100%;
        overflow: hidden;
    }

    .sliderImage {
        position: absolute;
        text-align: center;
        display: flex;
        align-items: center;
        width: 100%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 10;
    }

    .sliderImage img {
        width: 100%;
    }

    .sliderTitle {
        width: 100%;
        margin-left: 20px;
        margin-right: 20px;
        z-index: 20;
        height: 50vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.6);
        border-style: solid;
        border-width: 1px;
        border-color: #f8e312;
    }

    .sliderTitle p {
        text-align: center;
        color: #f8e312;
        width: 100%;
        font-size: 20px;
        white-space: initial;
        margin-bottom: 10px;
    }

    .sliderLink {
        background-color: #f8e312;
        border-color: #f8e312;
        border-width: 2px;
        border-style: solid;
        border-radius: 23px;
        color: black;
        font-size: 16px;
        font-weight: bold;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 108px;
        height: 33px;
        z-index: 20;
    }

    .sliderLink:hover {
        background-color: black;
        color: #f8e312;
    }
</style>