<?php get_header();?>
<div id="content" class="site-content">	
<div class="clear"></div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php while ( have_posts() ) : the_post(); ?>
			
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="single_info">
					<span class="date"><?php the_time( 'Y/n/j H:i' ) ?></span>
					<span class="views"><?php if( function_exists( 'the_views' ) ) { print '  阅读 '; the_views(); print ' 次  ';  } ;?></span>
			<span class="comment"><?php comments_popup_link( ' 评论 0 条', ' 评论 1 条', ' 评论 % 条' ); ?></span>	<span class="edit"><?php edit_post_link('编辑', '  ', '  '); ?></span>
				</div>		
	</header><!-- .entry-header -->
	
	<div class="entry-content">
					<div class="single-content">			
	<?php the_content(); ?>
	<?php wp_link_pages(array('before' => '<div class="page-links">', 'after' => '', 'next_or_number' => 'next', 'previouspagelink' => '<span>上一页</span>', 'nextpagelink' => "")); ?><?php wp_link_pages(array('before' => '', 'after' => '', 'next_or_number' => 'number', 'link_before' =>'<span>', 'link_after'=>'</span>')); ?>
					<?php wp_link_pages(array('before' => '', 'after' => '</div>', 'next_or_number' => 'next', 'previouspagelink' => '', 'nextpagelink' => "<span>下一页</span>")); ?>			
			</div>
	<div class="clear"></div>
		<div class="single_info_w">
			<span class="s_cat"><strong>分类：</strong><?php the_category( ', ' ) ?></span>
		</div>
	</div><!-- .entry-content -->
	</article><!-- #post -->
													
	<nav class="nav-single">
		<?php previous_post_link('<strong>上一篇：</strong> %link','%title',true,'') ?>
		<?php next_post_link('<br/><strong>下一篇：</strong> %link','%title',true,'') ?>		
		<div class="clear"></div>				
	</nav>
	<?php comments_template( '', true ); ?>			
			<?php endwhile; ?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<div class="clear"></div>
</div><!-- .site-content -->
<?php get_footer();?>