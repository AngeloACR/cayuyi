<?php

// https://kinsta.com/es/aprender/acelerar-wordpress/
// Add custom Theme Functions here

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles', 11);
function my_theme_enqueue_styles()
{

    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}

function _remove_script_version($src)
{
    $parts = explode('?', $src);
    return $parts[0];
}
add_filter('script_loader_src', '_remove_script_version', 15, 1);
add_filter('style_loader_src', '_remove_script_version', 15, 1);

/* function grd_woocommerce_script_cleaner()
{

    // Remove the generator tag
    remove_action('wp_head', array($GLOBALS['woocommerce'], 'generator'));
    // Unless we're in the store, remove all the cruft!
    if (!is_woocommerce() && !is_cart() && !is_checkout()) {
        wp_dequeue_style('woocommerce_frontend_styles');
        wp_dequeue_style('woocommerce-general');
        wp_dequeue_style('woocommerce-layout');
        wp_dequeue_style('woocommerce-smallscreen');
        wp_dequeue_style('woocommerce_fancybox_styles');
        wp_dequeue_style('woocommerce_chosen_styles');
        wp_dequeue_style('woocommerce_prettyPhoto_css');
        wp_dequeue_script('selectWoo');
        wp_deregister_script('selectWoo');
        wp_dequeue_script('wc-add-payment-method');
        wp_dequeue_script('wc-lost-password');
        wp_dequeue_script('wc_price_slider');
        wp_dequeue_script('wc-single-product');
        wp_dequeue_script('wc-add-to-cart');
        wp_dequeue_script('wc-cart-fragments');
        wp_dequeue_script('wc-credit-card-form');
        wp_dequeue_script('wc-checkout');
        wp_dequeue_script('wc-add-to-cart-variation');
        wp_dequeue_script('wc-single-product');
        wp_dequeue_script('wc-cart');
        wp_dequeue_script('wc-chosen');
        wp_dequeue_script('woocommerce');
        wp_dequeue_script('prettyPhoto');
        wp_dequeue_script('prettyPhoto-init');
        wp_dequeue_script('jquery-blockui');
        wp_dequeue_script('jquery-placeholder');
        wp_dequeue_script('jquery-payment');
        wp_dequeue_script('fancybox');
        wp_dequeue_script('jqueryui');
    }
}
add_action('wp_enqueue_scripts', 'grd_woocommerce_script_cleaner', 99);
 */
function wpsites_disable_self_pingbacks(&$links)
{
    foreach ($links as $l => $link)
        if (0 === strpos($link, get_option('home')))
            unset($links[$l]);
}

add_action('pre_ping', 'wpsites_disable_self_pingbacks');

/* add_action('wp_footer', 'enableUpdateCart');

function enableUpdateCart()
{
?>
    <script>
        let updateButtons = document.getElementsByClassName("updateButton");
        console.log(updateButtons)
        updateButtons[0].removeAttribute("ariaDisabled");
        updateButtons[0].removeAttribute("disabled");
        console.log(updateButtons[0])
    </script>
<?php
} */

// SMTP Authentication
add_action('phpmailer_init', 'send_smtp_email');
function send_smtp_email($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host       = SMTP_HOST;
    $phpmailer->SMTPAuth   = SMTP_AUTH;
    $phpmailer->Port       = SMTP_PORT;
    $phpmailer->Username   = SMTP_USER;
    $phpmailer->Password   = SMTP_PASS;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->From       = SMTP_FROM;
    $phpmailer->FromName   = SMTP_NAME;
}

include_once('cayuyiShorts.php');
include_once('testimonialsCPT.php');
include_once('confirmOrderCPT.php');
include_once('confirmPayment.php');
include_once('cayuyiAddToCart.php');
