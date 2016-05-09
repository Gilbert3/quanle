<?php get_header(); ?>
        <section class='col-md-8' >
			
			<header class="archive-header well">
				<h1 class="archive-title">
					搜索结果：<?php the_search_query(); ?>
				</h1>
				<div class="navbar navbar-default">
					<form class="navbar-form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<div class="input-group">
							<input type="text" class="form-control" value="<?php the_search_query(); ?>" name="s" id="s" >
							<span class="input-group-btn">
							<button type="submit" class="btn btn-danger" id="searchsubmit"> 搜 索 </button>
							</span>
						</div>
					</form>
				</div>
			</header>
			
            
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<!--分类页列表模块-->
			<article class="well clearfix">
				<header class="entry-header">
					<?php if ( has_post_thumbnail() ) {?>
						<a href="<?php the_permalink() ?>" class="entry-cover hidden-xs">
						<?php echo get_the_post_thumbnail($post_id, 'full');?>
						</a>
					<?php }?>
					<h1 class="entry-title">
						<a href="<?php the_permalink() ?>" title="<?php the_title();?>">
							<?php the_title(); ?>
						</a>
					</h1>
					<div class="clearfix entry-meta">
						<span class="pull-left">
							<time class="entry-date fa fa-calendar" datetime="<?php the_time("Y/m/d H:i:s");?>">
								&nbsp;<?php past_date() ?>
							</time>
							<span class="dot">|</span>
							<span class="categories-links fa fa-folder-o"> <?php the_category(','); ?></span>
							<span class="dot">|</span>
							<span class="fa fa-user"> <?php the_author_posts_link(); ?></span>
						</span>
						<span class="visible-lg visible-md visible-sm pull-left">
							<span class="dot">|</span>
							<span class="fa fa-comments-o comments-link"> <a href="<?php the_permalink() ?>#comments"><?php comments_number('暂无评论', '1 条评论', '% 条评论'); ?></a></span>
							<span class="dot">|</span>
							<span class="fa fa-eye"> <?php echo specs_get_post_views(get_the_ID());?> views</span>
						</span>
					</div>
                    
				</header>
				<div class="entry-summary">
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300,"……"); ?>
				</div>
				<footer class="entry-footer clearfix visible-lg visible-md visible-sm">
					<div class="pull-left footer-tag">
						<?php if ( get_the_tags() ) { the_tags('', ' ', ''); } else{ echo '<p class="label label-specs">本文暂无标签</p>';  } ?>
					</div>
					
					
					<a class="pull-right more-link" href="<?php the_permalink() ?>">阅读全文&raquo;</a>
				</footer>
			</article>
            <?php endwhile; else: ?>
			<article class="alert alert-warning"><?php _e('非常抱歉，没有相关文章。'); ?></article>
			<?php endif; ?>
			<!--分类页列表模块-->
            
        </section>
        <!--侧边栏-->
		<?php get_sidebar(); ?>
		<!--分页-->
		<div class="col-md-8 content-page">
			<?php specs_pages(3);?>
		</div>
<?php get_footer(); ?>