<?php

function fn_tsp_disable_autosave_add_menu_render()
{
	global $title;
	$active_plugins = get_option('active_plugins');
	$all_plugins = get_plugins();

	$array_activate = array();
	$array_install	= array();
	$array_recomend = array();
	$count_activate = $count_install = $count_recomend = 0;
	$array_plugins	= array(
		array( 'tsp_featured_posts\/tsp_featured_posts', 'TSP Featured Posts', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/featured-posts-for-wordpress.html', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/featured-posts-for-wordpress.html', '/wp-admin/plugin-install.php?tab=search&type=term&s=TSP+Featured+Posts&plugin-search-input=Search+Plugins', 'admin.php?page=tsp_featured_posts.php' ), 
		array( 'tsp_disable_autosave\/tsp_disable_autosave.php', 'TSP Disable Auto-Save', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/disable-autosave-for-wordpress.html', 'http://www.thesoftwarepeople.com/software/plugins/wordpress/disable-autosave-for-wordpress.html', '/wp-admin/plugin-install.php?tab=search&type=term&s=TSP+Disable+Autosave&plugin-search-input=Search+Plugins', 'admin.php?page=tsp_disable_autosave.php' ), 
	);
	foreach ( $array_plugins as $plugins ) {
		if( 0 < count( preg_grep( "/".$plugins[0]."/", $active_plugins ) ) ) {
			$array_activate[$count_activate]["title"] = $plugins[1];
			$array_activate[$count_activate]["link"] = $plugins[2];
			$array_activate[$count_activate]["href"] = $plugins[3];
			$array_activate[$count_activate]["url"]	= $plugins[5];
			$count_activate++;
		} else if ( array_key_exists(str_replace( "\\", "", $plugins[0]), $all_plugins ) ) {
			$array_install[$count_install]["title"] = $plugins[1];
			$array_install[$count_install]["link"]	= $plugins[2];
			$array_install[$count_install]["href"]	= $plugins[3];
			$count_install++;
		} else {
			$array_recomend[$count_recomend]["title"] = $plugins[1];
			$array_recomend[$count_recomend]["link"] = $plugins[2];
			$array_recomend[$count_recomend]["href"] = $plugins[3];
			$array_recomend[$count_recomend]["slug"] = $plugins[4];
			$count_recomend++;
		}
	}
	$array_activate_pro = array();
	$array_install_pro	= array();
	$array_recomend_pro = array();
	$count_activate_pro = $count_install_pro = $count_recomend_pro = 0;
	$array_plugins_pro	= array(
	);
	foreach ( $array_plugins_pro as $plugins ) {
		if( 0 < count( preg_grep( "/".$plugins[0]."/", $active_plugins ) ) ) {
			$array_activate_pro[$count_activate_pro]["title"] = $plugins[1];
			$array_activate_pro[$count_activate_pro]["link"] = $plugins[2];
			$array_activate_pro[$count_activate_pro]["href"] = $plugins[3];
			$array_activate_pro[$count_activate_pro]["url"]	= $plugins[4];
			$count_activate_pro++;
		} else if( array_key_exists(str_replace( "\\", "", $plugins[0]), $all_plugins ) ) {
			$array_install_pro[$count_install_pro]["title"] = $plugins[1];
			$array_install_pro[$count_install_pro]["link"]	= $plugins[2];
			$array_install_pro[$count_install_pro]["href"]	= $plugins[3];
			$count_install_pro++;
		} else {
			$array_recomend_pro[$count_recomend_pro]["title"] = $plugins[1];
			$array_recomend_pro[$count_recomend_pro]["link"] = $plugins[2];
			$array_recomend_pro[$count_recomend_pro]["href"] = $plugins[3];
			$count_recomend_pro++;
		}
	} ?>
	<div class="wrap">
		<div class="icon32 icon32-tsp" id="icon-options-general"></div>
		<h2><?php echo $title;?></h2>
		<h3 style="color: #B4100E;"><?php _e( 'Professional WordPress Plugins', 'tsp_disable_autosave' ); ?></h3>
			<?php if( 0 < $count_activate_pro ) { ?>
			<div style="padding-left:15px;">
				<h4><?php _e( 'Activated plugins', 'tsp_disable_autosave' ); ?></h4>
				<?php foreach ( $array_activate_pro as $activate_plugin ) { ?>
				<div style="float:left; width:200px;"><?php echo $activate_plugin["title"]; ?></div> <p><a href="<?php echo $activate_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_disable_autosave' ); ?></a> <a href="<?php echo $activate_plugin["url"]; ?>"><?php echo __( "Settings", 'tsp_disable_autosave' ); ?></a></p>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if( 0 < $count_install_pro ) { ?>
			<div style="padding-left:15px;">
				<h4><?php _e( 'Installed plugins', 'tsp_disable_autosave' ); ?></h4>
				<?php foreach ( $array_install_pro as $install_plugin) { ?>
				<div style="float:left; width:200px;"><?php echo $install_plugin["title"]; ?></div> <p><a href="<?php echo $install_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_disable_autosave' ); ?></a></p>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if( 0 < $count_recomend_pro ) { ?>
			<div style="padding-left:15px;">
				<h4><?php _e( 'Recommended plugins', 'tsp_disable_autosave' ); ?></h4>
				<?php foreach ( $array_recomend_pro as $recomend_plugin ) { ?>
				<div style="float:left; width:200px;"><?php echo $recomend_plugin["title"]; ?></div> <p><a href="<?php echo $recomend_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_disable_autosave' ); ?></a> <a href="<?php echo $recomend_plugin["href"]; ?>" target="_blank"><?php echo __( "Purchase", 'tsp_disable_autosave' ); ?></a></p>
				<?php } ?>
			</div>
			<?php } ?>
		<br />
		<h3 style="color: #1A77B1"><?php _e( 'Free WordPress Plugins', 'tsp_disable_autosave' ); ?></h3>
			<?php if( 0 < $count_activate ) { ?>
			<div style="padding-left:15px;">
				<h4><?php _e( 'Activated plugins', 'tsp_disable_autosave' ); ?></h4>
				<?php foreach( $array_activate as $activate_plugin ) { ?>
				<div style="float:left; width:200px;"><?php echo $activate_plugin["title"]; ?></div> <p><a href="<?php echo $activate_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_disable_autosave' ); ?></a> <a href="<?php echo $activate_plugin["url"]; ?>"><?php echo __( "Settings", 'tsp_disable_autosave' ); ?></a></p>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if( 0 < $count_install ) { ?>
			<div style="padding-left:15px;">
				<h4><?php _e( 'Installed plugins', 'tsp_disable_autosave' ); ?></h4>
				<?php foreach ( $array_install as $install_plugin ) { ?>
				<div style="float:left; width:200px;"><?php echo $install_plugin["title"]; ?></div> <p><a href="<?php echo $install_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_disable_autosave' ); ?></a></p>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if( 0 < $count_recomend ) { ?>
			<div style="padding-left:15px;">
				<h4><?php _e( 'Recommended plugins', 'tsp_disable_autosave' ); ?></h4>
				<?php foreach ( $array_recomend as $recomend_plugin ) { ?>
				<div style="float:left; width:200px;"><?php echo $recomend_plugin["title"]; ?></div> <p><a href="<?php echo $recomend_plugin["link"]; ?>" target="_blank"><?php echo __( "Read more", 'tsp_disable_autosave' ); ?></a> <a href="<?php echo $recomend_plugin["href"]; ?>" target="_blank"><?php echo __( "Download", 'tsp_disable_autosave' ); ?></a> <a class="install-now" href="<?php echo get_bloginfo( "url" ) . $recomend_plugin["slug"]; ?>" title="<?php esc_attr( sprintf( __( 'Install %s' ), $recomend_plugin["title"] ) ) ?>" target="_blank"><?php echo __( 'Install now from wordpress.org', 'tsp_disable_autosave' ) ?></a></p>
				<?php } ?>
			</div>
			<?php } ?>	
		<br />		
		<span style="color: rgb(136, 136, 136); font-size: 10px;"><?php _e( 'If you have any questions, please contact us via', 'tsp_disable_autosave' ); ?> <a href="http://www.thesoftwarepeople.com/about-us/contact-us.html">http://www.thesoftwarepeople.com/about-us/contact-us.html</a></span>
	</div>
<?php } 


function fn_tsp_disable_autosave_add_admin_menu() 
{
	add_menu_page( 'TSP Plugins', 'TSP Plugins', 'manage_options', 'tsp_disable_autosave', 'fn_tsp_disable_autosave_add_menu_render', WP_CONTENT_URL."/plugins/tsp_disable_autosave/images/tsp_icon_16.png", 2617638); 
}

function fn_tsp_disable_autosave_plugin_init() 
{
}


add_action( 'init', 'fn_tsp_disable_autosave_plugin_init' );
add_action( 'admin_init', 'fn_tsp_disable_autosave_plugin_init' );
add_action( 'admin_menu', 'fn_tsp_disable_autosave_add_admin_menu' );


?>