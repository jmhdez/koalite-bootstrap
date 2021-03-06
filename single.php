﻿<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
						
							<?php the_post_thumbnail( 'wpbs-featured' ); ?>
							
							<div class="page-header">
								<h1 class="h2">
									<?php the_title(); ?>
								</h1>
								<h1>
									<small><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> | Categor&iacute;a: <?php the_category(', '); ?></small>
								</h1>								
							</div>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
							
							<?php bootstrap_tags() ?>
							
							<?php related_posts() ?>
							
							<hr>
							
							<div class="row-fluid">
								<div class="span6">
									<?php previous_post('&laquo; Anterior</br>%', '', 'yes'); ?>
								</div>
								<div class="span6 alignright">
									<?php next_post('Siguiente &raquo;<br/>%', '', 'yes'); ?>
								</div>
							</div>

							
							<?php 
							// only show edit button if user has permission to edit posts
							if( $user_level > 0 ) { 
							?>
							<a href="<?php echo get_edit_post_link(); ?>" class="btn btn-success edit-post"><i class="icon-pencil icon-white"></i> <?php _e("Editar","bonestheme"); ?></a>
							<?php } ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php comments_template(); ?>
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Artículo no encontrado", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("No encuentro por ningún sitio ese artículo, lo siento. ¡Suerte la próxima vez!", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>