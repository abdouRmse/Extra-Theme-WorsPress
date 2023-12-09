<?php

/*
    **  excerpt custom
    **  change the length of words that excerpt show (default 55)
    **
    **  change the read more (default [...] me i want ...)
    **
*/
    function ak_excerpt_custom_length(){
        if(is_author()){
            return 30;
        }else{
            return 40;
        }
    } 
    
    function ak_excerpt_custom_more(){
        return " <a href=".get_permalink().">...Read more</a>";
    }

    add_filter( "excerpt_length", "ak_excerpt_custom_length" ); // error here
    add_filter( 'excerpt_more', 'ak_excerpt_custom_more' );
