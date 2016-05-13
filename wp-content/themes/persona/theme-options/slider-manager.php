<?php 

///////////////////////////////////////////////////////////////////////////////////////
// Page For Managing Slides
///////////////////////////////////////////////////////////////////////////////////////

function add_persona_slider_manager() {
	$options = get_option('persona_theme_options'); 
	if($options['show_slider'] == true){
		add_theme_page('管理幻灯片', '管理幻灯片', 'edit_theme_options', 'persona-slider', 'persona_slider_manager');
	}
}

add_action('admin_menu', 'add_persona_slider_manager');


function init_slider_manager(){
	register_setting( 'slider_manager_settings', 'slider_manager_settings');
	add_settings_section('slider_manager_section', '', '', 'persona-slider');
	add_settings_field('settings_slider_manager', '', 'settings_slider_manager', 'persona-slider', 'slider_manager_section');
}

add_action('admin_init', 'init_slider_manager');


function settings_slider_manager() {
	wp_enqueue_media();

	$options = get_option('slider_manager_settings');
	?>

	<?php if (isset($_GET['settings-updated'])) { ?>
		<?php if ($_GET['settings-updated'] == true){ ?>
			<div id="message" class="updated below-h2">
				<p><?php echo __('幻灯片设置已更新.', 'persona'); ?></p>
			</div>
		<?php } ?>
	<?php } ?>

	<div id="add-new-item">
		<input class="new-item-name" type="text" placeholder="<?php echo __('幻灯片标题...', 'persona'); ?>" />
		<input class="add-item button button-primary button-large" type="submit" value="<?php echo __('创建幻灯片', 'persona'); ?>" />
	</div>

	<div class="sidebars-wrap sortable-wrap">

		<input name="slider_manager_settings" type="hidden" class="item-name-input" value="" />

		<div id="dummy-item-placeholder" class="item-holder hidden">
			<div class="sidebar-name">
				<div class="item-move"></div>
				<h3></h3>
			</div>
			<div class="item-info slides">
				<input autocomplete="off" placeholder="<?php echo __('幻灯片标题...', 'persona'); ?>" name="[name]" type="text" class="item-name-input" value="" />
				<input autocomplete="off" placeholder="<?php echo __('幻灯片描述...', 'persona'); ?>" name="[desc]" type="text" class="item-desc-input" value="" />
				<a href="" title="<?php echo __('媒体库', 'persona'); ?>"class="upload-image" data-uploader_button_text="<?php echo __('创建幻灯片', 'persona'); ?>" data-uploader_title="<?php echo __('选择幻灯片图像', 'persona'); ?>">&bull;&bull;&bull;</a>
				<input autocomplete="off" placeholder="<?php echo __('幻灯片图像...', 'persona'); ?>" name="[image]" type="text" class="item-image-input" value="" />
				<input autocomplete="off" placeholder="<?php echo __('幻灯片链接...', 'persona'); ?>" name="[url]" type="text" class="item-url-input" value="" />
				<a class="delete-single-repeat" href=""><?php echo __('删除幻灯片', 'persona'); ?></a>
			</div>
		</div>

		<?php if(!$options){ ?>

			<h3 class="no-items"><?php echo __('目前有没有幻灯片，添加一个!', 'persona'); ?></h3>

		<?php } else { ?>

			<?php foreach ($options as $item_id => $item_name) { ?>

				<div id="<?php echo $item_id ?>" class="item-holder">
					<div class="sidebar-name">
						<div class="item-move"></div>
						<h3><?php if($item_name['name'] != '') { echo $item_name['name']; } else { echo __('[没有标题]', 'persona') ;} ?></h3>
					</div>
					<div class="item-info slides">
						<input autocomplete="off" placeholder="<?php echo __('幻灯片标题...', 'persona'); ?>" name="slider_manager_settings[<?php echo $item_id; ?>][name]" type="text" class="item-name-input" value="<?php echo $item_name['name']; ?>" />
						<input autocomplete="off" placeholder="<?php echo __('幻灯片描述...', 'persona'); ?>" name="slider_manager_settings[<?php echo $item_id; ?>][desc]" type="text" class="item-desc-input" value="<?php echo $item_name['desc']; ?>" />
						<a href="" title="<?php echo __('媒体库', 'persona'); ?>"class="upload-image" data-uploader_button_text="<?php echo __('创建幻灯片', 'persona'); ?>" data-uploader_title="<?php echo __('选择幻灯片图像', 'persona'); ?>">&bull;&bull;&bull;</a>
						<input autocomplete="off" placeholder="<?php echo __('幻灯片图像...', 'persona'); ?>" name="slider_manager_settings[<?php echo $item_id; ?>][image]" type="text" class="item-image-input" value="<?php echo $item_name['image']; ?>" />
						<input autocomplete="off" placeholder="<?php echo __('幻灯片链接', 'persona'); ?>" name="slider_manager_settings[<?php echo $item_id; ?>][url]" type="text" class="item-url-input" value="<?php echo $item_name['url']; ?>" />
						<a class="delete-single-repeat" href=""><?php echo __('删除幻灯片', 'persona'); ?></a>
					</div>
				</div>
			<?php } ?>

		<?php } ?>

	</div>

	<?php
}

function persona_slider_manager(){

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
		'alert' => __('您确定您要删除此幻灯片?', 'persona'),
		)
	);

	?>

	<div class="wrap">
		<div id="icon-themes" class="icon32">
			<br>
		</div>
		<h2><?php echo __('管理幻灯片', 'persona'); ?></h2>
		<p><?php echo __('添加一个新的幻灯片，幻灯片的数量是无限的.', 'persona'); ?></p>

		<form action="options.php" method="post" class="repeatable-form slider-manager-form">
			<?php settings_fields('slider_manager_settings'); ?>
			<?php do_settings_sections('persona-slider'); ?>
			<input class="button button-primary button-large" type="submit" value="<?php echo __('更新幻灯片设置', 'persona'); ?>" name="save">
		</form>

	</div>
<?php }

?>