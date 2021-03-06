<?php
global $porto_settings, $porto_layout;

$search_size = $porto_settings['search-size'];
?>
<header id="header" class="header-corporate header-14 <?php echo $search_size ?> sticky-menu-header">
    <?php if ($porto_settings['show-header-top']) : ?>
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <?php
                    // show currency and view switcher
                    $currency_switcher = porto_currency_switcher();
                    $view_switcher = porto_view_switcher();

                    if ($currency_switcher || $view_switcher)
                        echo '<div class="switcher-wrap">';

                    echo $currency_switcher;

                    if ($currency_switcher && $view_switcher)
                        echo '<span class="gap switcher-gap">|</span>';

                    echo $view_switcher;

                    if ($currency_switcher || $view_switcher)
                        echo '</div>';

                    // show welcome message
                    if ($porto_settings['welcome-msg'])
                        echo '<span class="welcome-msg">' . force_balance_tags($porto_settings['welcome-msg']) . '</span>';
                    ?>
                </div>
                <div class="header-right">
                    <?php
                    // show top navigation
                    $top_nav = porto_top_navigation();
                    echo $top_nav;
                    ?>
                    <?php
                    $minicart = porto_minicart();
                    $searchform = porto_search_form();
                    $header_social = porto_header_socials();

                    if ($minicart || $searchform || $header_social)
                        echo '<div class="block-inline">';

                    // show search form
                    echo $searchform;

                    // show social links and welcome message
                    echo $header_social;

                    // show minicart
                    echo $minicart;

                    if ($minicart || $searchform || $header_social)
                        echo '</div>';
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="header-main">
        <div class="container">
            <div class="header-left">
                <?php // show logo ?>
                <?php if ( is_front_page() && is_home() ) : ?><h1 class="logo"><?php else : ?><div class="logo"><?php endif; ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>" rel="home">
                        <?php if($porto_settings['logo'] && $porto_settings['logo']['url']) {
                            $logo_width = '';
                            $logo_height = '';
                            if ( isset($porto_settings['logo-retina-width']) && isset($porto_settings['logo-retina-height']) && $porto_settings['logo-retina-width'] && $porto_settings['logo-retina-height'] ) {
                                $logo_width = (int)$porto_settings['logo-retina-width'];
                                $logo_height = (int)$porto_settings['logo-retina-height'];
                            }

                            echo '<img class="img-responsive standard-logo" width="'.$logo_width.'" height="'.$logo_height.'" src="' . esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['logo']['url'])) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" />';

                            $retina_logo = '';
                            if (isset($porto_settings['logo-retina']) && isset($porto_settings['logo-retina']['url'])) {
                                $retina_logo = $porto_settings['logo-retina']['url'];
                            }

                            if ($retina_logo) {
                                echo '<img class="img-responsive retina-logo" width="'.$logo_width.'" height="'.$logo_height.'" src="' . esc_url(str_replace( array( 'http:', 'https:' ), '', $retina_logo)) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" style="max-height:'.$logo_height.'px;display:none;" />';
                            } else {
                                echo '<img class="img-responsive retina-logo" width="'.$logo_width.'" height="'.$logo_height.'" src="' . esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['logo']['url'])) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" style="display:none;" />';
                            }
                        } else {
                            bloginfo( 'name' );
                        } ?>
                    </a>
                <?php if ( is_front_page() && is_home() ) : ?></h1><?php else : ?></div><?php endif; ?>
            </div>
            <div class="header-right">
                <?php
                // show contact info and top navigation
                $contact_info = $porto_settings['header-contact-info'];

                if ($contact_info)
                    echo '<div class="header-contact">' . force_balance_tags($contact_info) . '</div>';
                ?>
                <?php
                if ($porto_settings['show-header-top']) {
                    // show search form
                    echo porto_search_form();
                }

                // show mobile toggle
                ?>
                <a class="mobile-toggle"><i class="fa fa-reorder"></i></a>
                <?php
                if ($porto_settings['show-header-top']) {
                    // show minicart
                    $minicart = porto_minicart();

                    echo $minicart;
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    // show main menu
    $main_menu = porto_main_menu();
    if ($main_menu) :
        ?>
        <div class="main-menu-wrap">
            <div id="main-menu" class="container <?php echo $porto_settings['menu-align'] ?>">
                <?php
                echo $main_menu;
                ?>
            </div>
        </div>
    <?php endif; ?>

</header>