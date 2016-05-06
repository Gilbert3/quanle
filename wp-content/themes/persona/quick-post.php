<?php
/**
 * The template for displaying Quick Status and Quick Image popup
 *
 */
?>

<form id="new-status-popup" autocomplete="off" class="new-post-popup" action="#">
	<a class="close enable" href="">x</a>
	<h3><?php echo __('快速发表状态', 'persona'); ?></h3>
	<textarea class="new-status" name="new-status" placeholder="<?php echo __('填写要发布的状态...', 'persona'); ?>"></textarea>
	<input class="status-title" type="text" placeholder="<?php echo __('状态标题...', 'persona'); ?>" value="<?php echo __('状态时间 - ', 'persona'); echo date(get_option('date_format')); ?>" data-value="<?php echo __('状态时间 - ', 'persona'); echo date(get_option('date_format')); ?>" />
	<a href="" class="submit disable"><?php echo __('提交', 'persona'); ?></a>
</form>