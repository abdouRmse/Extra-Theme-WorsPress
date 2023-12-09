<?php 
    // get the posts that i have to show in the profile page
    $posts_per_page = 4;
    $argument = array(
        'author' => get_the_author_meta('ID'),
        'posts_per_page' => $posts_per_page, //-1 => get all the posts of this author
        'order' => "DESC",
        'orderby' => "date",
    );
    $author_posts = new WP_Query($argument);
     
    // get the latest comments 
    $number_comments = 10;
    $argument_comments = array(
        'user_id' => get_the_author_meta('ID'),
        'status' => "approve",
        'number' => $number_comments,
        'post_status' => 'publish',
        'post_type' => 'post',
    );
    $latest_comments = get_comments( $argument_comments );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author</title>
</head>
<body>
    <?php get_header() ?>
    <div class="container-author-page">
        <div class="container author_page">
            <!-- the fields of the_author_meta are getting from the data base wp_usermeta -->
            <h1 class="profile-header text-center">User Informations</h1>
            <div class="author_main_info">
                <div class="row">
                    <div class="col-md-2">
                        <?php 
                            $arg = array(
                                "class"=>"img-responsive img-thumbnail",// ajouter les class a l'avatar
                            );
                            echo get_avatar(get_the_author_meta("ID"),140/** size avatar */,"","avatar",$arg) 
                        ?>
                    </div>
                    <div class="author-infos col-md-7">
                        <h3><span><?php echo the_author_meta("first_name")." ".the_author_meta("last_name");?></span>(<a href="#"><?php the_author_meta("nickname"); ?></a>)</h3>
                        <p>
                            <?php echo the_author_meta("description"); ?>
                        </p>
                        <h6><span>User posts count: </span><?php echo count_user_posts(get_the_author_meta("ID")) ?><span>user profile url: </span><?php the_author_posts_link(); ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="container row status-info">
            <div class="col-3">
                <div class="header">Posts Count</div><?php echo count_user_posts(get_the_author_meta("ID")) ?>
            </div>
            <div class="col-3">
                <div class="header">Comments Count</div><?php echo get_comments( array('post_author' => get_current_user_id(),'post_status' => 'publish','type'=> 'comment','count'=> true) ); //if count is false i get an object :> ?>
            </div>
            <div class="col-3">
                <div class="header">Total Post View</div><?php echo count_user_posts( get_the_author_meta( "ID")) ?>
            </div>
        </div>
        <div class="container all-posts">
            <!-- show all the posts of the author -->
            <h1>Latest Posts</h1>
            <div class="posts-container">
                <?php 
                    if($author_posts->have_posts()){
                        while($author_posts->have_posts()){
                        $author_posts->the_post();  ?>
                        <div class="post row">
                            <div class="thumbnail-div col-lg-2">
                                <a href="<?php echo get_permalink(); ?>">
                                    <?php the_post_thumbnail("", ['class'=>"img-responsive img-thumbnail",'title'=>'post image']) ?>
                                </a>
                            </div>
                            <div class="info-post col-lg-9">
                                <a href="<?php echo get_permalink() ?>">
                                    <?php the_title( "<h4 class='post-title'>", "</h4>"); ?>
                                </a>
                                <div class="infos-container">
                                    <span class="infos"><i class="fa-solid fa-pen"></i><?php the_category(", "); ?>, <i class="fa-regular fa-comment"></i><?php comments_popup_link("No comments","1 comment", "% comments","comment-class", "Comments disabeled"); ?>,<i class="fa-regular fa-calendar"></i><?php the_date();echo" ";?>at <?php the_time('g:i a'); ?>, </span>
                                </div>
                                <div class="content-div">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                <?php
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>

        <div class="container container_comments">
            <h1>Latest Comments</h1>
            <?php if($latest_comments){
                foreach($latest_comments as $comment){  ?>
                    <div class="comment">
                        <a href="<?php get_permalink($comment->comment_post_ID) ?>">
                            <h5><?php echo get_the_title( $comment->comment_post_ID );?></h5>
                        </a>
                        <span class="date"><?php echo $comment->comment_date; ?></span>
                        <?php echo $comment->comment_content; ?><br>
                    </div>
                <?php 
                }
            }else{
                $author = get_the_author_meta('nickname');
                echo "<span>$author don't have any comment</span>";
            } ?>
        </div>
    </div>
    <?php get_footer()?>
</body>
</html>