<?php get_header(); ?>

<div class="single-post-page">
      <?php 
         if(have_posts()){
            while(have_posts()){
               the_post();  ?>
                    <header class="row">
                        <div class="left-side col-12 col-lg-6">
                            <div class="infos-container">
                                <span class="infos">
                                    <?php the_author_posts_link(); ?>
                                </span>
                                <span class="infos">
                                    <?php the_date();?>
                                </span>

                            </div>
                            <div class="title-single-post">
                                <?php the_title( "<h1 class='post-title'>", "</h1>"); ?>
                            </div>    
                            <?php edit_post_link( "Edit Post <i class='fa-solid fa-up-right-from-square'></i>"); ?>

                            </div>
                        <div class="right-side thumbnail-div col-12 col-lg-6">
                            <a href="<?php ?>">
                                <?php the_post_thumbnail("", ['class'=>"img-responsive img-thumbnail",'title'=>'post image']) ?>
                            </a>
                        </div>
                    </header>
                    <div class="container content-div">
                        <?php the_content(); ?>
                    </div>
      <?php
            }
         }
      ?>
      <div class="d-flex flex-col justify-content-between post-pagination">
         <?php
            /** next and previous pagination */
            if(get_previous_post_link()){
               previous_post_link('%link','%title');
            }else{
               echo "<a style='color:grey'>prev</a>";
            }
            if(get_next_post_link()){
               next_post_link('%link','%title'); // add the pagination 
            }else{
               echo "<a style='color:grey'>next</a>";
            }
            
         ?>
      </div>
        <div class="container author_page">
            <!-- the fields of the_author_meta are getting from the data base wp_usermeta -->
            <h1 class="profile-header text-center">Author Informations</h1>
            <div class="author_main_info">
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-4">
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
    <!-- comment section -->
      <div class="container comment-container">
          <?php comments_template(); ?>
      </div>

      <!-- show related posts -->
    <?php
        $post_id = $post->ID;
        $post_category = wp_get_post_categories( $post_id );
        $post_count = 6;

        $argument = array(
            'orderby'           =>  "rand", // random
            'category__in'      =>  $post_category,
            'post__not_in'      =>  array($post_id),
            "posts_per_page"    =>  $post_count,
        );
        $related_posts = new WP_Query($argument);
        //var_dump($related_posts);
    ?>
      <div class="container all-posts">
            <!-- show all the posts of the author -->
            <h3>Related Posts</h3>
            <div class="container related_posts">
                <?php 
                    if($related_posts->have_posts()){
                        while($related_posts->have_posts()){
                        $related_posts->the_post();  ?>
                                <a href="<?php echo get_permalink() ?>">
                                    <?php the_title( "<h4 class='post-title'>", "</h4>"); ?>
                                </a>
                <?php
                        }
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>

        <!-- end show related posts -->

</div>
         


<?php  get_footer(); ?>
<?php //get_sidebar(); ?>

<?php //get_search_form() ?>

