<div id="footer-widget-box">
	<div class="footer-widget">		
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info">			
			Copyright ©&nbsp; <?php date('Y'); bloginfo('name');?><span class="plxiaoshi"> &nbsp; | &nbsp; Theme by <a title="主题设计者：懿古今" href="http://yigujin.wang/unite" target="_blank">miniUnite</a></span>
		</div><!-- .site-info -->
</footer><!-- .site-footer -->
	</div>
</div>	
<div class="tools">
    <a href="#" class="tools_top" title="返回顶部"></a>
	<?php wp_reset_query(); if ( is_single() || is_page() ) { ?>
		<a href="#respond" class="tools_comments" title="发表评论"></a>
	<?php } else {?>
		<a href="<?php echo stripslashes(get_option('ygj_lyburl')); ?>#respond" class="tools_comments" title="给我留言" target="_blank" rel="nofollow"></a>
	<?php } ?>
</div>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<?php wp_footer(); ?>
</body></html>