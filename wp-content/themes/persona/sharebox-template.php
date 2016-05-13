<?php
/**
 * The template for displaying ShareBox
 *
 */

$title     = str_replace(' ', '%20', get_the_title());
$url       = urlencode(get_permalink());
$summary   = urlencode(get_the_excerpt());
$image     = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
$blog_name = str_replace(' ', '%20', get_bloginfo('name'));

if(isset($image) == false){
	$first_image = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'numberposts' => 1, 'post_mime_type' => 'image', 'order'=>'ASC', 'orderby' => 'ID'));
	$image = wp_get_attachment_url( current($first_image)->ID );
	if(!$image){
		$image = persona_get_avatar_url(get_avatar( get_the_author_meta('ID'), 200 ));
	}
}

if (is_single()){
	$show_all = 1; 
} else {
	$show_all = 0;
}

?>


<div class="sharebox">
<!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
<a class="bds_tsina"></a>
<a class="bds_qzone"></a>
<a class="bds_tqq"></a>
<a class="bds_renren"></a>
</div>
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=401452" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- Baidu Button END -->
</div>