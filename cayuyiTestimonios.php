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
    'post_type' => "testimonios",
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
$i = 0;
if ($post_list->have_posts()) :
?>
    <div class="testimonialsBigBox">
        <?php
        while ($post_list->have_posts()) :
            $post_list->the_post();
            if ($i == 2) :
                $i = 0;
            endif;
            if ($i == 0) :
        ?>
                <div class="testimonialRow">

                <?php
            endif;

                ?>
                <div class="testimonialItem">
                    <div class="testimonialImage">
                        <?php the_post_thumbnail('full'); ?>
                    </div>

                    <div class="testimonialExcerpt">
                        <p><?php the_content(); ?></p>
                    </div>

                </div>

                <?php
                if ($i == 1) :
                ?>
                </div>

        <?php
                endif;

                $i = $i + 1;
            endwhile;
        ?>
    </div>

<?php
endif;
?>

<style>
    .testimonialsBigBox {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .testimonialRow {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: nowrap;
        min-height: 230px;
    }

    .testimonialRow:nth-child(odd) {
        background-color: #e4e4e4;
    }

    .testimonialRow:nth-child(even) {
        background-color: #cbc7c6;
    }

    .testimonialItem {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-evenly;
        width: 45%;
        margin-left: 25px;
    }

    .testimonialImage {
        text-align: center;
        width: 33%;
        border-radius: 150px;
        overflow: hidden;
    }

    .testimonialImage img {
        width: 100%;
    }

    .testimonialTitle p {
        text-align: center;
        color: black;
        margin-left: 1%;
        width: 60%;
        font-size: 20px;
        white-space: initial;
    }

    .testimonialExcerpt {
        width: 65%;
    }

    .testimonialExcerpt p {
        font-weight: bold;
        text-align: left;
        color: black;
        width: 100%;
        font-size: 12px;
        white-space: initial;
    }

    .testimonialLink {
        background-color: #d91887;
        border-color: #d91887;
        border-width: 2px;
        border-style: solid;
        border-radius: 23px;
        color: white;
        font-size: 16px;
        font-weight: bold;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 108px;
        height: 33px;
    }

    .testimonialLink:hover {
        background-color: white;
        color: #d91887;
    }
</style>