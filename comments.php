<?php
/*
The comments page for Bones
*/

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="alert alert-info"><?php _e("This post is password protected. Enter the password to view comments.","bonestheme"); ?></div>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	
	<h3 id="comments"><?php comments_number('<span>' . __("No hay","bonestheme") . '</span> ' . __("comentarios","bonestheme") . '', '<span>' . __("Un","bonestheme") . '</span> ' . __("comentario","bonestheme") . '', '<span>%</span> ' . __("comentarios","bonestheme") );?> <?php _e("a","bonestheme"); ?> &#8220;<?php the_title(); ?>&#8221;</h3>

	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link( __("Anteriores","bonestheme") ) ?></li>
	  		<li><?php next_comments_link( __("Siguientes","bonestheme") ) ?></li>
	 	</ul>
	</nav>
	
	<ol class="commentlist">
		<?php wp_list_comments('type=all&callback=bones_comments'); ?>
	</ol>
	
	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link( __("Anteriores","bonestheme") ) ?></li>
	  		<li><?php next_comments_link( __("Siguientes","bonestheme") ) ?></li>
		</ul>
	</nav>
  
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
    	<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed 
	?>
	
	<?php
		$suppress_comments_message = of_get_option('suppress_comments_message');

		if (is_page() && $suppress_comments_message) :
	?>
			
		<?php else : ?>
		
			<!-- If comments are closed. -->
			<p class="alert alert-info"><?php _e("No se permiten más comentarios","bonestheme"); ?>.</p>
			
		<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<section id="respond" class="respond-form">

	<h3 id="comment-form-title"><?php comment_form_title( __("Deja tu comentario","bonestheme"), __("Deja tu comentario sobre","bonestheme") . ' %s' ); ?></h3>

	<div id="cancel-comment-reply">
		<p class="small"><?php cancel_comment_reply_link( __("Cancelar","bonestheme") ); ?></p>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
  	<div class="help">
  		<p><?php _e("Debes estar ","bonestheme"); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("registrado","bonestheme"); ?></a> <?php _e(" para dejar un comentario","bonestheme"); ?>.</p>
  	</div>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="form-vertical" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

	<p class="comments-logged-in-as"><?php _e("Registrado como","bonestheme"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("Cerrar sesión","bonestheme"); ?>"><?php _e("Salir","bonestheme"); ?> &raquo;</a></p>

	<?php else : ?>
	
	<ul id="comment-form-elements" class="clearfix">
		
		<li>
			<div class="control-group">
			  <label for="author"><?php _e("Nombre","bonestheme"); ?> <?php if ($req) echo "(obligatorio)"; ?></label>
			  <div class="input-prepend">
			  	<span class="add-on"><i class="icon-user"></i></span>
			  	<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php _e("Tu nombre","bonestheme"); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
			  </div>
		  	</div>
		</li>
		
		<li>
			<div class="control-group">
			  <label for="email"><?php _e("Email","bonestheme"); ?> <?php if ($req) echo "(obligatorio)"; ?></label>
			  <div class="input-prepend">
			  	<span class="add-on"><i class="icon-envelope"></i></span>
			  	<input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="<?php _e("Tu email","bonestheme"); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			  	<span class="help-inline">(<?php _e("no será publicado","bonestheme"); ?>)</span>
			  </div>
		  	</div>
		</li>
		
		<li>
			<div class="control-group">
			  <label for="url"><?php _e("Página Web","bonestheme"); ?></label>
			  <div class="input-prepend">
			  <span class="add-on"><i class="icon-home"></i></span>
			  	<input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php _e("Tu web","bonestheme"); ?>" tabindex="3" />
			  </div>
		  	</div>
		</li>
		
	</ul>

	<?php endif; ?>
	
	<div class="clearfix">
		<div class="input">
			<textarea class="span6" name="comment" id="comment" placeholder="<?php _e("Escribe aquí tu comentario...","bonestheme"); ?>" tabindex="4"></textarea>
		</div>
	</div>
	
	<div class="form-actions">
	  <input class="btn btn-koalite" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e("Enviar comentario","bonestheme"); ?>" />
	  <?php comment_id_fields(); ?>
	</div>
	
	<?php 
		//comment_form();
		do_action('comment_form()', $post->ID); 
	
	?>
	
	</form>
	
	<?php endif; // If registration required and not logged in ?>
</section>

<?php endif; // if you delete this the sky will fall on your head ?>
