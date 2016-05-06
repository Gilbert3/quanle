<?php
/**
 * The Template for displaying 404 page.
 *
 */

get_header();

$options = get_option('persona_theme_options');

?>

	<div id="container">
		<div id="content">

			<div class="page-info">
				<h1><?php echo __('啊~哦~ 您要查看的页面不存在或已删除！', 'persona'); ?></h1>
			</div>

			<div class="post">
				<div class="content">
					<p><?php echo __('请检查您输入的网址是否正确，或者点击链接继续浏览网站.', 'persona'); ?></p>
					<ul>
						<li><a href="<?php echo get_home_url(); ?>"><?php echo __('网站首页', 'persona'); ?></a></li>
						<li><a href="<?php echo get_home_url(); ?>/guestbook"><?php echo __('如若不能解决您的问题，请进入留言栏目提出建议^_^', 'persona'); ?></a></li>
					</ul>
					
				</div>
			</div>

		</div> <!-- end content -->
	</div> <!-- end container -->

	<?php if($options['show_sidebar'] == true){ ?>

		<?php get_sidebar(); ?>

	<?php } ?>

<?php get_footer(); ?>