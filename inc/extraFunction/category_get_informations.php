<?php

    /** this functions ar used to get the comments and posts count in each category,
     * i used them in the sidebar-cat , this custom sidebar is used only in the category 
     * pages.
     */

    function get_categorie_comments(){
        $category = get_queried_object();
        $comment_count = 0;
        $all_comments = get_comments( array('status' => 'approve'));
        foreach ($all_comments as $comment){
            if(!in_category( $category->slug , $comment->comment_post_ID )){
                continue;
            }

            $comment_count++;

        }
        return $comment_count;
    }

    function get_category_posts_count(){
        $category = get_queried_object();
        return $category->count;
    }
