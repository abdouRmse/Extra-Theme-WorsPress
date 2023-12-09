<?php 
/*
**  this function is made by me to implement my style files
**  my by @abdenour
*/
    function ak_get_styles(){
        wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/layouts/css/bootstrap/bootstrap.min.css');

        // my costum css:
        wp_enqueue_style( 'main-css', get_template_directory_uri().'/style.css');

        /*
        **  in the case of fontawesome we have to way to import it, this is the firsr where i create 
        **  font-awesome folder in my /laouts/css an declare the files here
        **  the second is using the kit fontawesome , it is in the comment of my ak_get_scripts function
        **
         */
        wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/layouts/css/font-awesome/css/fontawesome.css');
        wp_enqueue_style( 'fontawesome-brands', get_template_directory_uri().'/layouts/css/font-awesome/css/brands.css');
        wp_enqueue_style( 'fontawesome-solid', get_template_directory_uri().'/layouts/css/font-awesome/css/solid.css');

    }

    add_action( 'wp_enqueue_scripts', 'ak_get_styles');


