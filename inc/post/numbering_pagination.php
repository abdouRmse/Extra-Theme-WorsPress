<?php

function numbering_pagination(){

    global $wp_query;

    $all_pages  = $wp_query->max_num_pages;

    $current_page = max(1,get_query_var( "paged" ));


    if($all_pages > 1){
        return paginate_links( array(
            'base'                  =>  get_pagenum_link()."%_%",
            'format'                =>  '/page/%#%',
            'current'               =>  $current_page,

        ) );
    }

}
