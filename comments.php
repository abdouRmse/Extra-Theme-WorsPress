<?php

/** to make a custom comments page */
foreach($comments as $comment){
    //comment_author();
}

if(comments_open()){ // verify if comments are enabled
    $arguments = array(
        "max_depth" =>  3,
        "style" =>  'ul',
        "avatar_size"   =>  64 //...
    );

?>

    <h4><?php  comments_number( "No comments", "1 comment", "% comments") ?></h4>
    <?php if(wp_count_comments(get_the_ID())->approved != 0){ //if the current post have at least 1 comment?> 

    <ul class='comments-ul'>
        <?php     
            wp_list_comments($arguments);  // list the comments in this post 
        ?>
    </ul>

    <?php } ?>
<?php
   
}else{
    echo "comments disable";
}
    
    $args = array(
        "fields"=>array(
            'author'=>'<div class="form-group inputs"><label for="name">Name</label><input type="text" name="author" class="form-control" id="inputName" placeholder="Your name"></div>',
            'email'=>'<div class="form-group inputs"><label for="inputEmail4">Email<span style="font-size:11px;color:grey;margin-left:7px;">(your email will not be published !)</label><input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email"></div>',
            'url'=>'<div class="form-group inputs"><label for="inputAddress">Address</label><input type="text" name="url" class="form-control" id="inputWeb" placeholder="Your Website"></div>',
            'cookies'=>""
        ),
        "comment_notes_before" => "",
        "title_reply"=>"<h3 class='replay_title'>add Comment</h3>",
        "title_reply_to"=> '<h3 id="reply-title-header">Add a reply to %s</h3>',
        "label_submit"=>"send",
        "class_submit"=>"btn btn-primary btn-my-style",
        "class_container"=>"comment-cont",
        "class_form"=>"class-form",
        "comment_field"=>'<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" placeholder="comments"></textarea>'
    );
    comment_form($args);


?>