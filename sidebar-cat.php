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