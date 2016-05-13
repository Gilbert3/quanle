<?php
/*
Template Name: Archive page
*/
?>

<?php get_header();

$options = get_option('persona_theme_options');

$post_id = get_the_ID();
?>

	<div id="container">
		<div id="content">

			<article class="page">

				<a href="<?php the_permalink(); ?>" class="format-all"></a>

				<?php if( current_user_can( 'edit_post', $post_id ) ){  ?>

					<a href="" class="admin-toolbar display"></a>
					<ul class="admin-menu">
						<li><a href="" class="title not-trashed" data-title="<?php the_title(); ?>"><?php echo __('编辑标题', 'persona'); ?></a></li>
						<li><a href="" class="trash not-trashed"><?php echo __('删除文章', 'persona'); ?></a></li>
					</ul>

					<div class="share-wrapper">
						<a href="" class="share-button logged-in inactive"><?php echo __('分享', 'persona'); ?></a>
						<?php get_template_part( 'sharebox', 'template' ); ?>
					</div>

				<?php } else { ?>

					<a href="" class="share-button logged-out inactive"></a>
					<?php get_template_part( 'sharebox', 'template' ); ?>

				<?php } ?>

				<?php if(has_post_thumbnail()){ ?>
					<div class="featured-image-top">
						<?php the_post_thumbnail(); ?>
					</div>
				<?php } ?>

				<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				<?php if(has_excerpt()){ ?>
					<p class="excerpt"><?php the_excerpt(); ?></p>
				<?php } ?>

				<div class="meta-info">
					<?php if (!is_page()){ ?>
						<a href="<?php the_permalink(); ?>" class="post-date" title="<?php the_title(); ?>"><?php the_time(get_option('date_format')); ?></a>
						<div class="category">
							<?php echo __('分类:', 'persona'); the_category(', '); ?>
						</div> 
					<?php } ?>
				</div>

				<div class="content">

					<h2><?php echo __('年份归档:', 'persona') ?></h2>
					<ul>
						<?php wp_get_archives('type=yearly'); ?>
					</ul>
					<h2><?php echo __('月份归档:', 'persona') ?></h2>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
					<h2><?php echo __('最新文章:', 'persona') ?></h2>
					<ul>
						<?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 20) ); ?>
					</ul>

				</div>
			</article>

		</div> <!-- end content -->
	</div> <!-- end container -->

	<?php if($options['show_sidebar'] == true){ ?>

		<?php get_sidebar(); ?>

	<?php } ?>

<?php get_footer(); ?>


