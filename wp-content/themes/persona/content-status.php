<?php
/**
 * The template for displaying posts in the Status post format
 *
 */

$post_id = get_the_ID();
?>

	<article id="post-<?php echo $post_id; ?>" data-id="<?php echo $post_id; ?>" <?php post_class(); ?>>

		<a href="<?php echo get_post_format_link('status'); ?>" class="format-all"></a>

		<?php if( current_user_can( 'edit_post', $post_id ) ){  ?>

			<a href="" class="admin-toolbar display"></a>
			<ul class="admin-menu">
				<li><a href="" class="title not-trashed" data-title="<?php the_title(); ?>"><?php echo __('编辑标题', 'persona'); ?></a></li>
				<li><a href="" class="trash not-trashed"><?php echo __('删除文章', 'persona'); ?></a></li>
			</ul>

		<?php } else { ?>

			<a href="" class="share-button logged-out inactive"></a>
			<?php get_template_part( 'sharebox', 'template' ); ?>

		<?php } ?>

		<div class="author">
			<span><?php the_author(); ?></span> &bull;
			<a href="<?php the_permalink(); ?>" class="post-date" title="<?php the_title(); ?>"><?php the_time(get_option('date_format')); ?></a> &bull;
		
		</div>

		<?php if( current_user_can( 'edit_post', $post_id ) ){  ?>
			<a href="" class="share-button logged-in inactive"><?php echo __('分享', 'persona'); ?></a>
			<?php get_template_part( 'sharebox', 'template' ); ?>
		<?php } ?>
		

		<div class="avatar">
			<?php echo get_avatar(get_the_author_meta('ID'), 130); ?>
			<div class="mark"></div>
		</div>

		<div class="status-content content">
			<?php the_content(''); ?>
		</div>

		<div class="clear"></div>

		<?php comments_template( '', true ); ?>
		
	</article>
