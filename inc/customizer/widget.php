<?php 


function ak_register_sidebar(){
    register_sidebar( array(
        'name'          =>  "Main Sidebar",
        'id'            =>  "main-sidebar",
        'description'   =>  "This is the main sidebar is shown by default in the right of the pages.",
        'class'         =>  "sidebar",
        'before_widget' =>  "<div class='sidebar-content'> ",
        'after_widget'  =>  "</div>",
        'before_title'  =>  "<h3 class='sidebar-title'>",
        'after_title'   =>  "</h3>",
        'show_in_rest'  =>  false
    ));

}
add_action("widgets_init","ak_register_sidebar");