<form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
    <fieldset>
		<div class="clearfix">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-search"></i></span><input type="text" class="span2" name="s" id="search" placeholder="<?php _e("Search","bonestheme"); ?>" value="<?php the_search_query(); ?>" />		
			</div>
        </div>
    </fieldset>
</form>