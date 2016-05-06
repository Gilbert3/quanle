<?php 

///////////////////////////////////////////////////////////////////////////////////////
// Page For Creating New Sidebars
///////////////////////////////////////////////////////////////////////////////////////

function add_unlimited_sidebars() {
	$options = get_option('persona_theme_options'); 
	if($options['show_sidebar'] == true){
		add_theme_page('增加侧边栏', '增加侧边栏', 'edit_theme_options', 'persona-sidebars', 'unlimited_sidebars');
	}
}

add_action('admin_menu', 'add_unlimited_sidebars');


function init_unlimited_sidebars(){
	register_setting( 'unlimited_sidebars_settings', 'unlimited_sidebars_settings');
	add_settings_section('unlimited_sidebars_section', '', '', 'persona-sidebars');
	add_settings_field('settings_unlimited_sidebars', '', 'settings_unlimited_sidebars', 'persona-sidebars', 'unlimited_sidebars_section');
}

add_action('admin_init', 'init_unlimited_sidebars');


function settings_unlimited_sidebars() {
	$options = get_option('unlimited_sidebars_settings');
	?>

	<?php if (isset($_GET['settings-updated'])) { ?>
		<?php if ($_GET['settings-updated'] == true){ ?>
			<div id="message" class="updated below-h2">
				<p><?php echo __('边栏设置已更新.', 'persona'); ?></p>
			</div>
		<?php } ?>
	<?php } ?>

	<div id="add-new-item">
		<input class="new-item-name" autocomplete="off" type="text" placeholder="<?php echo __('侧边栏名称...', 'persona'); ?>" />
		<input class="add-item button button-primary button-large" type="submit" value="<?php echo __('创建边栏', 'persona'); ?>" />
	</div>

	<div class="sidebars-wrap sortable-wrap">

		<input name="unlimited_sidebars_settings" type="hidden" class="item-name-input" value="" />

		<div id="dummy-item-placeholder" class="item-holder hidden">
			<div class="sidebar-name">
				<div class="item-move"></div>
				<h3></h3>
			</div>
			<div class="item-info">
				<input autocomplete="off" placeholder="<?php echo __('侧边栏名称...', 'persona'); ?>" name="" type="text" class="item-name-input" value="" />
				<a class="delete-single-repeat" href=""><?php echo __('删除边栏', 'persona'); ?></a>
			</div>
		</div>

		<?php if(!$options){ ?>

			<h3 class="no-items"><?php echo __('目前没有边栏，请创建一个!', 'persona'); ?></h3>

		<?php } else { ?>

			<?php foreach ($options as $sidebar_id => $sidebar_name) { ?>

				<div id="<?php echo $sidebar_id ?>" class="item-holder">
					<div class="sidebar-name">
						<div class="item-move"></div>
						<h3><?php echo $sidebar_name['name']; ?></h3>
					</div>
					<div class="item-info">
						<input autocomplete="off" placeholder="<?php echo __('侧边栏名称...', 'persona'); ?>" name="unlimited_sidebars_settings[<?php echo $sidebar_id; ?>][name]" type="text" class="item-name-input" value="<?php echo $sidebar_name['name']; ?>" />
						<a class="delete-single-repeat" href=""><?php echo __('删除边栏', 'persona'); ?></a>
					</div>
				</div>
			<?php } ?>

		<?php } ?>

	</div>
	<?php
}

function unlimited_sidebars(){

	global $post;

	if (!current_user_can('manage_options')) {  
		wp_die( __('You do not have sufficient permissions to access this page.', 'persona') );  
	}

	wp_register_script( 'script-backend', get_template_directory_uri() . '/script/script-backend.js' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-sortable' ); 
	wp_enqueue_script( 'script-backend' );

	wp_register_style( 'admin-backend-style', get_template_directory_uri() . '/style/admin-backend-style.css' );
	wp_enqueue_style( 'admin-backend-style' );

	wp_localize_script( 'script-backend', 'personaSidebars', array(
		'alert' => __('您确定您要删除此边栏?', 'persona'),
		)
	);

	?>

	<div class="wrap">
		<div id="icon-themes" class="icon32">
			<br>
		</div>
		<h2><?php echo __('增加侧边栏', 'persona'); ?></h2>
		<p><?php echo __('添加一个新的侧边栏，然后就可以到小工具选择使用。侧边栏的数量无限。', 'persona'); ?></p>

		<form action="options.php" method="post" class="repeatable-form unlimited-sidebars-form">
			<?php settings_fields('unlimited_sidebars_settings'); ?>
			<?php do_settings_sections('persona-sidebars'); ?>
			<input class="button button-primary button-large" type="submit" value="<?php echo __('更新边栏设置', 'persona'); ?>" name="save">
		</form>
	</div>
<?php }


function persona_sidebar_body_class($classes) {

	$sidebar_id = '';

	if(is_singular()){
		global $post;
		$sidebar_id = get_post_meta( $post->ID, '_choose_sidebar', true );
	}

	if($sidebar_id == 'no-sidebar'){
		$remove_classes = array('sidebar-on-right', 'sidebar-on-left');
		$classes = array_diff($classes, $remove_classes);
		$classes[] = 'sidebar-off';
	}

	return $classes;

}

add_filter('body_class','persona_sidebar_body_class');

?>