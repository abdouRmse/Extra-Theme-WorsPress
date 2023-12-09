<?php get_header(); ?>
<div class="container main-post row">
   <div class="col-8">
      <?php 
         if(have_posts()){
            while(have_posts()){
               the_post();  ?>
               <div class="post-container col-lg-12 col-md-12">
                  <a href="<?php echo get_permalink() ?>">
                     <?php the_title( "<h4 class='post-title'>", "</h4>"); ?>
                  </a>
                  <div class="infos-container">
                     <span class="infos"><i class="fa-regular fa-user"></i><?php the_author_posts_link(); ?>,   <i class="fa-regular fa-calendar"></i><?php the_date();echo" ";?>at <?php the_time('g:i a'); ?>, <i class="fa-regular fa-comment"></i><?php comments_popup_link("No comments","1 comment", "% comments","comment-class", "Comments disabeled"); ?> </span>
                  </div>
                  <div class="thumbnail-div">
                     <a href="<?php echo get_permalink(); ?>">
                        <?php the_post_thumbnail("", ['class'=>"img-responsive img-thumbnail",'title'=>'post image']) ?>
                     </a>
                  </div>
                  <div class="content-div">
                     <?php the_excerpt(); ?>
                  </div>
                  <a class="read-more" href="<?php echo get_permalink() ;?>">Read more...</a>
                  <hr/>
                  <div class="cat-tag-container">
                     <span class="categorie"><i class="fa-solid fa-pen"></i>Categories: <?php the_category(", ",'multiple'); ?></span>
                     <?php if(get_the_tags( get_the_ID() )){ ?><span class="categorie"><i class="fa-solid fa-tags"></i><?php the_tags(); ?></span> <?php } ?>
                  </div>
               </div>
      <?php
            }
         }
      ?>
         <?php
         /***
          *  next and previous pagination
               if(get_previous_posts_link()){
                     previous_posts_link();
                  }else{
                     echo "<p style='color:grey'>prev</p>";
                  }
                  if(get_next_posts_link()){
                     next_posts_link(); // add the pagination 
                  }else{
                     echo "<p style='color:grey'>next</p>";
                  }
          *
         ***/
          ?>  
      <!--numbering pagination -->
      <div class='d-flex flex-col numbering-pagination'>
         <?php echo numbering_pagination(); ?>
      </div>   
  
   </div>
   <div class="col-4 container-sidebar">
      <?php if ( is_active_sidebar( 'main-sidebar' ) ) { ?>
         <ul id="sidebar">
            <?php dynamic_sidebar( "main-sidebar" ); ?>
         </ul>
      <?php } ?>
   </div>
</div>
         
<?php  ?>

<?php  get_footer(); ?>
<?php //get_sidebar(); ?>

<?php //get_search_form() ?>

