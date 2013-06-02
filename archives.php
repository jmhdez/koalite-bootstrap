<?php get_header(); ?>

<div id="archives">

	<div class="row-fluid">
		<div class="span12">
			<?php get_search_form(); ?>
		</div>
	</div>

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
<?php get_footer(); ?>