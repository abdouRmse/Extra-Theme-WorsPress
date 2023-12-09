<?php

/*
**  this function is made by me to implement my style files
**  my by @abdenour
*/
function ak_get_scripts(){

    wp_enqueue_script( 'my-js-file', get_template_directory_uri().'/layouts/js/custom/toggle.js',array(),false,true);

   /**
    * drop down in responsive don't work , i use the cdn file dirextly in the footer
    */

    //wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/layouts/js/bootstrap/bootstrap.min.js',array(),false,true); //whene i removed this the toggle button is work
    wp_enqueue_script( 'bootstrap-bandle-js', get_template_directory_uri().'/layouts/js/bootstrap/bootstrap.bundle.min.js',array(),false,true);
    /*
    ** i added array('jquery') : bootstrap js is depend of jquery , so jquery will import before the bootstap automaticaly 
    **
    ** othe method to add jquery:
    **  
    **
    */
        //wp_enqueue_script('jquery');
    /*
    ** or i can deregister the exesting jquery and register
    ** with this method i make the jquery is made in the footer in the project
    ** like this :
    **
    ** inludes_url get the url of wp_include where i have get jquery
    ** there is a lot of function like this : home_url,site_url ...
    **
    */
        
        //wp_deregister_script( 'jquery' );
        //wp_register_script( "jquery", includes_url("/js/jquery/jquery.js"), array(), false,'', true ); // register jquery in the footer
        //wp_enqueue_script( "jquery" );

    // wp_enqueue_script( 'fontawesome-kits', 'https://kit.fontawesome.com/87f9ce0386.js',array(),false,true ); // kits to import fontawesome library
}

add_action( 'wp_enqueue_scripts', 'ak_get_scripts');
