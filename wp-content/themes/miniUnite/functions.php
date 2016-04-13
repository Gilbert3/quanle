<?php
//标题文字截断
function cut_str($src_str,$cut_length)
{
    $return_str='';
    $i=0;
    $n=0;
    $str_length=strlen($src_str);
    while (($n<$cut_length) && ($i<=$str_length))
    {
        $tmp_str=substr($src_str,$i,1);
        $ascnum=ord($tmp_str);
        if ($ascnum>=224)
        {
            $return_str=$return_str.substr($src_str,$i,3);
            $i=$i+3;
            $n=$n+2;
        }
        elseif ($ascnum>=192)
        {
            $return_str=$return_str.substr($src_str,$i,2);
            $i=$i+2;
            $n=$n+2;
        }
        elseif ($ascnum>=65 && $ascnum<=90)
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+2;
        }
        else 
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+1;
        }
    }
    if ($i<$str_length)
    {
        $return_str = $return_str . '';
    }
    if (get_post_status() == 'private')
    {
        $return_str = $return_str . '（private）';
    }
    return $return_str;
}

// 所有图片
function all_img($soContent){
	$soImages = '~<img [^\>]*\ />~';
	preg_match_all( $soImages, $soContent, $thePics );
	$allPics = count($thePics);
	if( $allPics > 0 ){ 
		$count=0;
			foreach($thePics[0] as $v){
				 if( $count == 4 ){break;}
				 else {echo $v;}
				$count++;
			}
	}
}

// 评论链接新窗口
function commentauthor($comment_ID = 0) {
    $url    = get_comment_author_url( $comment_ID );
    $author = get_comment_author( $comment_ID );
    if ( empty( $url ) || 'http://' == $url )
		echo $author;
    else
		echo "<a href='$url' rel='external nofollow' target='_blank' class='url'>$author</a>";
}

// 禁止无中文留言
if ( is_user_logged_in() ) {
} else {
function refused_spam_comments( $comment_data ) {
	$pattern = '/[一-龥]/u';  
	if(!preg_match($pattern,$comment_data['comment_content'])) {
		err('评论必须含中文！');
	}
	return( $comment_data );
}
add_filter('preprocess_comment','refused_spam_comments');
}

// 分页
require get_template_directory() . '/inc/functions/pagenavi.php';
// 面包屑导航
require get_template_directory() . '/inc/functions/breadcrumb.php';
// 评论模板
require get_template_directory() . '/inc/functions/comment-template.php';
// 评论通知
require get_template_directory() . '/inc/functions/notify.php';

// 自动缩略图
function catch_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
		echo get_bloginfo ( 'stylesheet_directory' );
		echo '/images/1.jpg';
  }
  return $first_img;
}

remove_action( 'wp_head','print_emoji_detection_script',7);     //解决4.2版本部分主题大量404请求问题
remove_action('admin_print_scripts', 'print_emoji_detection_script'); //解决后台404请求
remove_action( 'wp_print_styles',   'print_emoji_styles'    );  //移除4.2版本前台表情样式钩子
remove_action( 'admin_print_styles',    'print_emoji_styles');  //移除4.2版本后台表情样式钩子
remove_action( 'the_content_feed',      'wp_staticize_emoji');  //移除4.2 emoji相关钩子
remove_action( 'comment_text_rss',      'wp_staticize_emoji');  //移除4.2 emoji相关钩子
?>