<?php

/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action('et_after_main_content');

if ('on' === et_get_option('divi_back_to_top', 'false')) : ?>

    <span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if (!is_page_template('page-template-blank.php')) : ?>

    <footer id="main-footer">
        <?php get_sidebar('footer'); ?>


        <?php
        if (has_nav_menu('footer-menu')) : ?>

            <div id="et-footer-nav">
                <div class="container">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'depth'          => '1',
                        'menu_class'     => 'bottom-nav',
                        'container'      => '',
                        'fallback_cb'    => '',
                    ));
                    ?>
                </div>
            </div> <!-- #et-footer-nav -->

        <?php endif; ?>

        <div id="footer-bottom">

            <!-- ESTE CONTENEDOR ES PARA FOOTER DE ESCRITORIO PERSONALIZADO -->
            <div class="fCont">
                <div id="columnA" class="fColumn">
                    <div class="footerLogo">
                        <img src="/wp-content/uploads/2020/10/LOGO-FONDO-NEGRO.png" alt="">
                    </div>
                </div>

                <div id="columnB" class="fColumn">
                    <h2 class="footerContactTitle">Contacto</h2>
                    <a class="footerContactInfo" href="https://www.instagram.com/amomisrizos.yuyi/">
                        <img src="/wp-content/uploads/2020/09/ICONO-INSTAGRAM.png" alt="">
                        <h4 class="footerContactText">@amomisrizos.yuyi</h4>
                    </a>
                    <a class="footerContactInfo" href="https://www.facebook.com/amomisrizosyuyi">
                        <img src="/wp-content/uploads/2020/09/ICONO-FACEBOOK.png" alt="">
                        <h4 class="footerContactText">Amo mis rizos by Yuyi</h4>
                    </a>
                </div>
                <div id="columnC" class="fColumn">
                    <a class="footerContactInfo" href="https://www.youtube.com/channel/UCjvSm_0Nl8aLvyVMBbgszog">
                        <img src="/wp-content/uploads/2020/09/ICONO-YOUTUBE.png" alt="">
                        <h4 class="footerContactText">Zambiruca Yuyi Yulia</h4>
                    </a>
                    <a class="footerContactInfo" href="https://wa.me/593996919777">
                        <img src="/wp-content/uploads/2020/09/ICONO-WHATSAPP.png" alt="">
                        <h4 class="footerContactText">+593 996 91 9777</h4>
                    </a>
                    <a class="footerContactInfo" href="mailto:yulia_7@hotmail.es">
                        <img src="/wp-content/uploads/2020/09/ICONO-MENSAJES.png" alt="">
                        <h4 class="footerContactText">yulia_7@hotmail.es</h4>
                    </a>
                </div>
                <div id="columnD" class="fColumn">
                    <h2 class="footerContactTitle">Mantente actualizado</h2>
                    <?php echo do_shortcode('[contact-form-7 id="588" title="Footer"]'); ?>
                </div>
            </div>

            <!-- ESTE CONTENEDOR ES PARA FOOTER DE MOVIL PERSONALIZADO -->

            <div class="fMob">
                <div id="rowA" class="fRow">
                    <div class="footerLogo">
                        <img src="/wp-content/uploads/2020/10/LOGO-FONDO-NEGRO.png" alt="">
                    </div>
                </div>

                <div id="rowB" class="fRow">

                    <h2 class="footerContactTitle">Contacto</h2>
                    <a class="footerContactInfo" href="https://www.instagram.com/amomisrizos.yuyi/">
                        <img src="/wp-content/uploads/2020/09/ICONO-INSTAGRAM.png" alt="">
                        <h4 class="footerContactText">@amomisrizos.yuyi</h4>
                    </a>
                    <a class="footerContactInfo" href="https://www.facebook.com/amomisrizosyuyi">
                        <img src="/wp-content/uploads/2020/09/ICONO-FACEBOOK.png" alt="">
                        <h4 class="footerContactText">Amo mis rizos by Yuyi</h4>
                    </a>
                    <a class="footerContactInfo" href="https://www.youtube.com/channel/UCjvSm_0Nl8aLvyVMBbgszog">
                        <img src="/wp-content/uploads/2020/09/ICONO-YOUTUBE.png" alt="">
                        <h4 class="footerContactText">Zambiruca Yuyi Yulia</h4>
                    </a>
                    <a class="footerContactInfo" href="https://wa.me/593996919777">
                        <img src="/wp-content/uploads/2020/09/ICONO-WHATSAPP.png" alt="">
                        <h4 class="footerContactText">+593 996 91 9777</h4>
                    </a>
                    <a class="footerContactInfo" href="mailto:yulia_7@hotmail.es">
                        <img src="/wp-content/uploads/2020/09/ICONO-MENSAJES.png" alt="">
                        <h4 class="footerContactText">yulia_7@hotmail.es</h4>
                    </a>
                </div>
                <div id="rowC" class="fRow">

                    <h2 class="footerContactTitle">Mantente actualizado</h2>
                    <?php echo do_shortcode('[contact-form-7 id="588" title="Footer"]'); ?>
                </div>
            </div>
            <div class="container clearfix">
                <?php
                if (false !== et_get_option('show_footer_social_icons', true)) {
                    get_template_part('includes/social_icons', 'footer');
                }

                echo et_get_footer_credits();
                ?>
            </div> <!-- .container -->

        </div>
        <style>
            #footer-bottom {
                background-color: black;
            }

            .fMob {
                display: none;
            }

            .fCont {
                width: 95%;
                display: flex;
                flex-direction: row;
                align-items: flex-start;
                justify-content: space-between;
                padding-bottom: 20px;
                margin: auto;
                max-width: 3000px !important;
            }

            .fIcon {
                width: 30px;
                height: 30px;
            }

            .fColumn {
                display: flex;
                width: 20%;
                margin: 20px;
                padding: 10px;
                flex-direction: column;
                align-items: flex-start;
                justify-content: center;
            }

            .fTitle {
                font-size: 15px;
                font-weight: bold;
                color: #243d71;
            }

            .fItem {
                font-size: 13px;
                font-weight: normal;
                color: #243d71;
                text-decoration: none;
            }

            .fContact {
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                font-size: 10px;
            }

            .footerLogo {
                width: 100%;
            }

            .footerLogo img {
                width: 100%;
            }

            .footerContactTitle {
                color: white;
                font-weight: bold;
                padding: 0;
                margin-bottom: 20px;
            }

            .footerContactInfo {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                margin-bottom: 20px;
            }

            .footerContactInfo img {
                width: 30px;
                height: 30px;
                margin-right: 10px;
            }

            .footerContactText {
                padding: 0;
                color: white;
                font-weight: bold;
            }

            @media screen and (max-width: 600px) {

                .fCont {
                    display: none;
                }

                .fColumn {
                    width: 100%;
                    margin: 0;
                    align-items: center;
                }

                .fMob {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    margin-bottom: 20px;
                    max-width: 3000px !important;
                }

                .footerContactTitle {
                    width: 100%;
                    text-align: center;
                }

                .footerContactInfo {
                    width: 70%;
                }

                .footerContactInfo img {
                    width: 50px !important;
                    height: 50px !important;
                }

                .footerContactText {
                    font-size: 23px;
                }

                .fRow {
                    display: flex;
                    width: 90%;
                    margin-bottom: 30px;
                    flex-direction: row;
                    align-items: center;
                    justify-content: center;
                    flex-wrap: wrap;
                }

            }
        </style>
    </footer> <!-- #main-footer -->
    </div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) 
?>

</div> <!-- #page-container -->
<?php wp_footer(); ?>
</body>

</html>