<?php
/**
 * The Template for displaying the pages.
 *
 */

get_header();

$options = get_option('persona_theme_options'); 

?>

	<div id="container">
		<div id="content">

			<div class="page-info">
				<p><?php echo __('共找到: ', 'persona'); global $wp_query; echo $wp_query->found_posts; ?>条</p>
				<?php get_search_form(); ?>
			</div>

			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php else : ?>

				<article class="post">
					<div class="content">
						<p><?php echo __('没有找到相关文章', 'persona') ?></p>
					</div>
				</article>
			<?php endif; ?>

			<?php persona_pagination('', 3); ?>

		</div> <!-- end content -->
	</div> <!-- end container -->

	<?php if($options['show_sidebar'] == true){ ?>

		<?php get_sidebar(); ?>

	<?php } ?>

<?php get_footer(); ?>