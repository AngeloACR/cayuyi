<?php


add_action('wp_ajax_nopriv_myCart', 'myCart');
add_action('wp_ajax_myCart', 'myCart');

function myCart()
{
    /*
    $nonce = $_REQUEST['nonce'];
    if ( !wp_verify_nonce( $nonce, "myCustomCartNonce")) {
        die("Get out, mf!");
    } */
    if (isset($_GET["qty"]) && isset($_GET["id"])) {
        $qty = $_REQUEST["qty"];
        $productId = $_REQUEST["id"];
        $added_to_cart = WC()->cart->add_to_cart($productId, $qty);
    }

    $response = array(
        'request'        => $added_to_cart
    );

    echo json_encode($response);

    wp_die();
}
