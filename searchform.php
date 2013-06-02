<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
	<div class="control-group">
		<div class="controls">
		<label class="control-label" for="s">Buscar: </label>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-search"></i></span><input type="text" name="s" id="search" placeholder="<?php _e("Buscar","bonestheme"); ?>" value="<?php the_search_query(); ?>" />		
			</div>
		</div>
	</div>
</form>

