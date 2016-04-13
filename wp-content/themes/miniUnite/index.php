<?php get_header();?>
<div id="content" class="site-content">	
	<div class="clear"></div>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	<?php
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$sticky = get_option( 'sticky_posts' );
		$args = array(
			'cat' => get_option('ygj_new_exclude'),
			'orderby' => date,
			'paged' => $paged
		);
		query_posts( $args );
 	?>
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<figure class="thumbnail">		
			<?php get_template_part( 'inc/thumbnail' ); ?>					
		</figure>
		<header class="entry-header">
			<h2 class="entry-title"><?php if( is_sticky() ) echo '<span style="color:#C01E22;">[置顶]</span>';?><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php echo cut_str($post->post_title,36); ?></a></h2>		
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<span class="entry-meta">
				<span class="date"><?php  the_time( 'Y/n/j H:i');?>&nbsp;&nbsp;</span>
				<span class="views"><?php if( function_exists( 'the_views' ) ) { print '  阅读 '; the_views(); print ' 次  ';  } ;?></span>&nbsp;&nbsp;
			<span class="comment"><?php comments_popup_link( ' 评论 0 条', ' 评论 1 条', ' 评论 % 条' ); ?></span>				
			</span>	
			<span class="cat">
				<?php 
					$category = get_the_category(); 
					if($category[0]){
					echo '<a href='.get_category_link($category[0]->term_id ).'>'.$category[0]->cat_name.'</a>';
					}
				?>
			</span>
			<br/>		
			
			<div class="archive-content">			 				
				<?php if (has_excerpt()){ the_excerpt();} else { echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 118,"..."); } ?>
			</div>
			
			<div class="clear"></div>
		</div><!-- .entry-content -->
		
		<span class="archive-tag"><?php the_tags('', ', ', '');?></span>
	</article><!-- #post -->
<?php endwhile; ?>
		<?php else : ?>
		<section class="content">
			<p>目前还没有文章！</p>
			<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/post-new.php">点击这里发布您的第一篇文章</a></p>
		</section>
		<?php endif; ?>				
		</main><!-- .site-main -->		
		<?php pagenavi(); ?>
	</section><!-- .content-area -->
<div class="clear"></div>
</div><!-- .site-content -->
<?php get_footer();?>