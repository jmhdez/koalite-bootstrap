<?php get_header(); ?>

<div id="archives">

	<div class="row-fluid">

		<div class="span9">
			<h3>Posts</h3>
			<ul id="archives-posts">
				<?php
					global $post;
					$args = array( 'orderby' => 'post_date', 'order' => 'DESC', 'numberposts' => '10000' );
					$myposts = get_posts( $args );

					foreach( $myposts as $post ) : setup_postdata($post); ?>
					<li>
          	<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><small><?php the_date(); ?></small></p>
        	</li>
					<?php endforeach; ?>
			</ul>
		</div>


		<div class="span3">

			<div class="row-fluid">
				<h3>Buscar</h3>
				<form action="<?php echo home_url( '/' ); ?>" method="get">
					<div class="control-group">
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-search"></i></span><input type="text" class="input-medium" name="s" id="search" placeholder="<?php _e("Texto o título","bonestheme"); ?>" value="<?php the_search_query(); ?>" />		
							</div>
						</div>
					</div>
				</form>
			</div>


			<div class="row-fluid">
				<h3>Etiquetas</h3>
				<ul id="archives-tags">
					<?php 
						$tags = get_tags();
						foreach ($tags as $tag) {
							echo '<li><a href="' . get_tag_link($tag->term_id) . '" title="Posts sobre ' . $tag->name . '">' . $tag->name . '</a></li>' ;
						}
					?>
				</ul>
			</div>
		</div>


	</div>


</div>
<?php get_footer(); ?>