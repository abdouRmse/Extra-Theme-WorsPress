<?php 

/*
**  I have an essue in the menu where i can't drop down a li who have submenu, the first thing is
**  i have to implement the bootstrap-bandle-js in the wp_enqueue_script, becaue this part is
**  the responsable of the dropdown menu. 
**
**  the second essue is according the wp_bootstrap_walker that i use in this project.
**  where this library use data-toggle (the old version of bootstrap), but bootstrap 5 (the lastes)
**  use "data-bs-toggle" unstead "data-toggle" , so i have to add the function bellow to fix this
**  error. 
**
** */
add_filter( 'nav_menu_link_attributes', 'bootstrap5_dropdown_fix' );

function bootstrap5_dropdown_fix( $atts ) {
    if ( array_key_exists( 'data-toggle', $atts ) ) {
        unset( $atts['data-toggle'] );
        $atts['data-bs-toggle'] = 'dropdown';
    }
    return $atts;
}

/** end fix error */

?>