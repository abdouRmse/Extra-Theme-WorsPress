<style>
	.widget{
		margin-bottom: 20px;
	}
	.widget-wrap{
		background: white;
    	padding: 20px;
	}
	.textwidget{
		font-size: 13px;
	}
	.latest-posts-container{
		background: white;
    	padding: 15px;
		font-size: 13px;
		margin-top: 20px;
	}
	.latest-posts-container ul{
		list-style: none;
		padding: 0;
		margin: 0px;
	}
	.latest-posts-container .widgettitle{
		display: flex;
    	justify-content: space-between;
	}
	.widgettitle i{
		font-size: 18px;
	}
</style>

<div id="text-7" class="widget widget_text">

	<div class="widget-wrap">

		<h4 class="widgettitle">
			Statistics about <span class="category"><?php echo get_queried_object()->name; echo " "; ?></span>
		</h4><!-- .widgettitle -->

		<div class="textwidget">
			Number of comments: <a href="http://google.com/"><?php echo get_categorie_comments(); ?></a>
		</div><!-- .textwidget -->
		<div class="textwidget">
			Number of posts: <a href="http://google.com/"><?php echo get_category_posts_count(); ?></a>
		</div><!-- .textwidget -->
	</div><!-- .widget-wrap -->

</div><!-- #text-7 -->

<div class="latest-posts-container">
	<?php $post_number = 3; ?>
	<h4 class="widgettitle">Latest <?php  echo $post_number .' ' ?>posts</h4>
			<ul>
				<?php
					$argument = array(
						'posts_per_page' 	=> $post_number,
						'cat'				=> get_queried_object()->cat_ID,
					);
					$latest_posts = new WP_Query($argument);

					if($latest_posts->have_posts()){
						while($latest_posts->have_posts()){
							$latest_posts->the_post();
							?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<?php the_title();?>
									</a>
								</li>
							<?php
						}
					}
				?>
			</ul>
		</div>

<div class="latest-posts-container">
	<?php $top_pot_number = 1; ?>
	<h4 class="widgettitle">Top post <i class="fa-star fa"></i></h4>
			<ul>
				<?php
					$argument_top = array(
						'posts_per_page' 	=> $top_pot_number,
						'orderby'			=> 'comment_count'
					);
					$top_post = new WP_Query($argument_top);

					if($top_post->have_posts()){
						while($top_post->have_posts()){
							$top_post->the_post();
							?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<?php the_title();?>
									</a>
								</li>
							<?php
						}
					}
				?>
			</ul>
		</div>