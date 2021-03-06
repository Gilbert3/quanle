<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 */

$post_id = get_the_ID();
?>

	<article id="post-<?php echo $post_id; ?>" data-id="<?php echo $post_id; ?>" <?php post_class(); ?>>

		<a href="<?php echo get_post_format_link('gallery'); ?>" class="format-all"></a>

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

		<?php if(!is_singular()){ ?>
			<div class="gallery-content content">
				<?php the_content(''); ?>
			</div>
		<?php } ?>

		<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

		<?php if( current_user_can( 'edit_post', $post_id ) ){  ?>
			<a href="" class="share-button logged-in inactive"><?php echo __('分享', 'persona'); ?></a>
			<?php get_template_part( 'sharebox', 'template' ); ?>
		<?php } ?>
		
		<?php if(has_excerpt()){ ?>
			<p class="excerpt"><?php the_excerpt(); ?></p>
		<?php } ?>

		<div class="meta-info">
			
			<a href="<?php the_permalink(); ?>" class="post-date" title="<?php the_title(); ?>"><?php echo get_the_date(); ?></a>
			<div class="category">
				<?php echo __('分类:', 'persona'); the_category(', '); ?>
			</div>

		</div>

		<?php if(is_singular()){ ?>
			<?php the_tags('<ul class="tags"><li>','</li><li>','</li></ul>'); ?>
			<div class="gallery-content content">
				<?php the_content(''); ?>
			</div>
		<?php } ?>

		<div class="clear"></div>

		<?php comments_template( '', true ); ?>
		
	</article>
