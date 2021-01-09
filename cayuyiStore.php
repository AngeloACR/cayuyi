<?php
/* Template Name:cayuyiStore */
?>

<?php
/*$pagedB = get_query_var('paged');
$pagedB = max( 1, $pagedB );

$offset_start = 1;
$offset = ( $pagedB - 1 ) * $per_page + $offset_start;
*/

$per_page = 100;

$args = array(
    'post_type' => 'product',
    'posts_per_page' => $per_page,
    //    'paged'          => $pagedB,
    //    'offset'         => $offset, // Starts with the second most recent post.
    'orderby'        => 'date',  // Makes sure the posts are sorted by date.
    'order'          => 'DESC',  // And that the most recent ones come first.
);

/*Setting up our custom query */
//query_posts($args);
$post_list = new WP_Query($args);

$all_ids = get_posts(array(
    'post_type' => 'product',
    'numberposts' => -1,
    'post_status' => 'publish',
    'fields' => 'ids',
));

$home = get_home_url();
$src = $home . "/wp-admin/admin-ajax.php?action=myCart";
?>
<div class="bigBox">
    <?php
    $i = 0;
    foreach ($all_ids as $id) {

        $product = wc_get_product($id);
        /*$total_rows = max( 0, $post_list->found_posts - $offset_start );
    $total_pages = ceil( $total_rows / $per_page );
    */

    ?>
        <div class="postItem">
            <div class="postImage">
                <a href="<?php echo $product->get_permalink(); ?>"><?php echo $product->get_image('full') ?></a>
            </div>
            <div class="postTitle">
                <p><?php echo $product->get_title(); ?></p>
            </div>

            <div class="postAdd">
                <div class="qtyBox">
                    <input type="hidden" id="productId<?php echo $i; ?>" value="<?php echo $product->get_id(); ?>">
                    <input type="number" min="1" value="1" id="quantity<?php echo $i; ?>">
                </div>
                <div class="priceBox">
                    <p>$<?php echo $product->get_regular_price(); ?></p>
                </div>
                <div class="cartBox">

                    <div class="buttonBox">
                        <button class="addButton" id="addButton<?php echo $i; ?>">Añadir al carrito</button>
                    </div>
                </div>
            </div>

        </div>

    <?php
        $i = $i + 1;
    };
    ?>
    <div class="pagination clearfix">
        <?php // next_posts_link( '' );
        ?>
        <?php //previous_posts_link( '' ); 
        ?>
        <?php

        /*            $pag_args1 = array(
    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
    //            'total'   => $total_pages,
    'total'   => $post_list->max_num_pages,
    'current' => $pagedB,
    'format'       => '?pagedB=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'prev_next'    => true,
            'prev_text'    => sprintf( '<div class="alignleft"></div>', __( 'Newer Posts', 'text-domain' ) ),
            'next_text'    => sprintf( '<div class="alignright"></div>', __( 'Older Posts', 'text-domain' ) ),
            'add_args'     => false,
        );

            echo paginate_links($pag_args1);
            */    ?>
    </div>

    <?php
    ?>
</div>

<style>
    .buttonBox {
        width: 100%;
    }

    .postAdd {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        justify-content: space-between;
    }

    .buttonBox button {
        background-color: #d91887;
        cursor: pointer;
        border-color: #d91887;
        border-width: 2px;
        border-style: solid;
        border-radius: 23px;
        color: white;
        font-size: 12px;
        font-weight: bold;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 33px;
    }

    .buttonBox button:hover {
        background-color: white;
        color: #d91887;
    }

    .bigBox {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: wrap;
        align-items: flex-end;
    }

    .cartBox {
        width: 100%;
        display: flex;
        justify-content: space-around;
        align-items: flex-start;
    }

    .postItem {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 27%;
        margin-bottom: 25px;
    }

    .postImage {
        text-align: center;
        width: 100%;
    }

    .postImage img {
        width: 100%;
    }

    .postTitle {
        width: 100%;
    }

    .postTitle p,
    .priceBox p {
        text-align: center;
        color: black;
        width: 100%;
        font-size: 12px;
        font-weight: bold;
        white-space: initial;
    }

    .priceBox {
        width: 48%;
    }

    .qtyBox {
        width: 48%;
    }

    .qtyBox input {
        height: 33px;
        width: 100%
    }

    .postExcerpt p {
        text-align: left;
        color: black;
        width: 100%;
        font-size: 16px;
        white-space: initial;
    }

    .postLink {
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

    .postLink:hover {
        background-color: white;
        color: #d91887;
    }
</style>

<script>
    let addButtons = document.getElementsByClassName("addButton")
    var arr = Array.from(addButtons);
    arr.forEach(button => {
        button.addEventListener("click", function(e) {
            let id = e.target.id
            let index = id[id.length - 1];
            let qtyInput = document.getElementById(`quantity${index}`)
            let productIdInput = document.getElementById(`productId${index}`)
            let productId = productIdInput.value;
            let qty = qtyInput.value;
            addToCart(productId, qty)
        })
    });

    function addToCart(productId, qty) {

        let cartLink = `<?php echo $src; ?>&id=${productId}&qty=${qty}`;
        let ajax = new XMLHttpRequest();
        ajax.open("GET", cartLink, true);
        ajax.onreadystatechange = function(aEvt) {
            console.log(ajax)
            if (ajax.readyState == 4) {
                if (ajax.status == 200) {
                    let response = JSON.parse(ajax.responseText);
                    console.log(response);
                } else
                    console.log("Error loading page\n");
            }
        };
        ajax.send();
    }
</script>