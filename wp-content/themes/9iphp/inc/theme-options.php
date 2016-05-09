<?php
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/theme-options/' );
	require_once dirname( __FILE__ ) . '/theme-options/options-framework.php';
	/*  Add custom script to theme options  */
	add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');
	add_action('optionsframework_after','exampletheme_options_after', 100);
}
function optionsframework_custom_scripts(){
	echo '<script type="text/javascript" src="'.OPTIONS_FRAMEWORK_DIRECTORY.'js/theme-options.js"></script>';
	echo '<link rel="stylesheet" type="text/css" href="'.OPTIONS_FRAMEWORK_DIRECTORY.'css/theme-options.css">';
}
function exampletheme_options_after() { ?>
	<div class="meta-box-right">
		<p><strong>1. 网站图标</strong></p>
		<p>网站采用 <a href="http://9iphp.com/fa-icons" target="_blank">FontAwesome 4</a> 图标，你可以选择更换自己喜欢的图标</p>
		<p><strong>2. 支持博主</strong></p>
		<p>本主题现在免费共大家下载，不过为了主题后续更好的升级，大家也可以选择 <a href="http://9iphp.com/donate" target="_blank">支持博主</a></p>
	</div>
<?php
}

/*
 * This is an example of how to override a default filter
 * for 'textarea' sanitization and $allowedposttags + embed and script.
 */
add_action('admin_init','optionscheck_change_santiziation', 100);

function optionscheck_change_santiziation() {
   remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
   add_filter( 'of_sanitize_textarea', create_function('$input', 'return $input;') );
}