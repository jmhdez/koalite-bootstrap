<?php get_header(); ?>
			
			<?php
				$blog_hero = of_get_option('blog_hero');
				if ($blog_hero){
			?>
			<div class="clearfix row">
				<div class="hero-unit">
				
					<h1><?php bloginfo('title'); ?></h1>
					
					<p><?php bloginfo('description'); ?></p>
				
				</div>
			</div>
			<?php
				}
			?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							<div class="page-header">
								<h1 class="h2">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
								</h1>
								<h1>
									<small><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> | Categor&iacute;a: <?php the_category(', '); ?></small>
								</h1>								
							</div>
						</header> <!-- end article header -->
					
						<section class="post_content clearfix">
							<?php the_content( __("Leer más &raquo;","bonestheme") ); ?>
						</section> <!-- end article section -->
						
						<footer>
							<?php bootstrap_tags(); ?>
							
							<p class="postmetadata"><?php edit_post_link('Edit', '', ' | '); ?>  
							<?php comments_popup_link('Añadir comentario', '1 comentario &raquo;', '% comentarios &raquo;', 'btn btn-koalite'); ?></p>
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php comments_template(); ?>
					
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
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("No he encontrado nada", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Lo siento, pero sea lo que sea lo que estés buscando, no lo encuentro.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
		
			</div> <!-- end #content -->

<?php get_footer(); ?>