<?php
    wp_nav_menu( array(
        'theme_location'  => 'primary',
        'menu'            => 'main',
        'container'       => 'ul',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'n_nav',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 1,
        'walker'          => '',
    ) );

?>
