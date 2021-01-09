<?php

function cayuyiBlogSlider()
{
    ob_start();
    get_template_part('cayuyiBlogSlider');
    return ob_get_clean();
}
add_shortcode('cayuyi_blog_slider', 'cayuyiBlogSlider');

function cayuyiTestimonios()
{
    ob_start();
    get_template_part('cayuyiTestimonios');
    return ob_get_clean();
}
add_shortcode('cayuyi_testimonios', 'cayuyiTestimonios');

function cayuyiBlog()
{
    ob_start();
    get_template_part('cayuyiBlog');
    return ob_get_clean();
}
add_shortcode('cayuyi_blog', 'cayuyiBlog');

function cayuyiRecentPosts()
{
    ob_start();
    get_template_part('cayuyiRecentPosts');
    return ob_get_clean();
}
add_shortcode('cayuyi_recent_posts', 'cayuyiRecentPosts');

function cayuyiStore()
{
    ob_start();
    get_template_part('cayuyiStore');
    return ob_get_clean();
}
add_shortcode('cayuyi_store', 'cayuyiStore');

function cayuyiConfirmPayment()
{
    ob_start();
    get_template_part('cayuyiConfirmPayment');
    return ob_get_clean();
}
add_shortcode('cayuyi_confirmacion', 'cayuyiConfirmPayment');
