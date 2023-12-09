<?php 

 /*
    **
    **  ADD COSTUM MENU SUPPORT
    **  ADDED BY @abdenour
    **
*/

    function ak_register_costum_menu(){
        register_nav_menus( array(
            "main-nav-menu" => __("the main menu"),
            "footer-nav-menu" => __("the footer menu"),
            "test-menu" => __("the testing menu")
        ));

    }

    /*
    **  show the nav-menu
    **
    */
    function ak_select_menu($navbar){
        wp_nav_menu(array(
            'theme_location' => $navbar, // wich menu we have to show
            'menu_class' => "navbar-nav me-auto mb-2 mb-lg-0", // give the class to the ul nav (bootstrap class)
            "container" => false, // by default the contaner of the ul is a div
            'depth' => 2, 
            'walker' => new WP_Bootstrap_Navwalker() /* WP_Bootstrap_Navwalker is get from github , is did to style the childs of the navbar, it work with this */
        ));
    }

    add_action('init',"ak_register_costum_menu"); // init: when wordpress finish uploading
