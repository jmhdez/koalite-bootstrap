<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span12 clearfix" role="main">
				
					<div class="page-header"><h1><span><?php _e("Resultados para","bonestheme"); ?>:</span> <?php echo esc_attr(get_search_query()); ?></h1></div>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							<h3>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</h3>
							<h3>
								<small><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> | Categor&iacute;a: <?php the_category(', '); ?></small>
							</h3>								
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_excerpt('<span class="read-more">' . __("Leer más sobre","bonestheme") . ' "'.the_title('', '', false).'" &raquo;</span>'); ?>
					
						</section> <!-- end article section -->
						
						<footer>
					
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>
						
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Anteriores', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Siguientes &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>			
					
					<?php else : ?>
					
					<!-- this area shows up if there are no results -->
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No hay resultados", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("No he encontrado nada parecido a lo que buscas. ¡Suerte la próxima vez!", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    			    
			</div> <!-- end #content -->

<?php get_footer(); ?>