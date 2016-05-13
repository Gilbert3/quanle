<form method="get" id="searchform" action="<?php echo home_url(); ?>" >
	<fieldset>   
		<input autocomplete="off" placeholder="<?php echo __('输入关键字进行搜索...', 'persona'); ?>" type="text" id="s" name="s" value="<?php echo get_search_query(); ?>" />
	</fieldset> 
</form>