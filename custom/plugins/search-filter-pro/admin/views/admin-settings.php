<?php
/**
 * Search & Filter Pro
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 */
?>

<div class="wrap">
	
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<?php _e('Global settings are applied to all search forms', $this->plugin_slug); ?>
	
	<h3><?php _e('Cache', $this->plugin_slug); ?></h3>
	
	<form method="post" action="options.php">
		
		<?php settings_fields('search_filter_settings'); ?>
		<table class="form-table">
			<tbody>
				
				<tr valign="top">	
					<th scope="row" valign="top">
						<?php _e('Caching Speed', $this->plugin_slug); ?><br />
					</th>
					<td>
						<label>
							
							<select name="search_filter_cache_speed">
								<option value="slow"<?php $this->set_selected($cache_speed, "slow"); ?>><?php _e('Slow', $this->plugin_slug); ?></option>
								<option value="medium"<?php $this->set_selected($cache_speed, "medium"); ?>><?php _e('Medium', $this->plugin_slug); ?></option>
								<option value="fast"<?php $this->set_selected($cache_speed, "fast"); ?>><?php _e('Fast', $this->plugin_slug); ?></option>
							</select> 

							<?php _e('This controls the speed at which the Cache is built when first indexing all the posts on your site or when it is required to be rebuilt.', $this->plugin_slug); ?>
							
							<br /><br />
							<div style="padding:10px;background-color: #EAEAEA;border: 1px solid #ddd;">
								<p><?php _e('A faster setting means more posts will be cached in each process, however this is generally considered to me more resource intensive.', $this->plugin_slug); ?></p>
								<p><?php _e('Using a high setting when your server cannot support it may result in internal server errors and resource limits being reached.', $this->plugin_slug); ?></p>
							</div>
							
							
						</label>
						
					</td>
				</tr>
				<tr valign="top">	
					<th scope="row" valign="top">
						<?php _e('Use Background Processes', $this->plugin_slug); ?><br />
					</th>
					<td>
						<label>
							
							
							<input id="search_filter_cache_use_manual" name="search_filter_cache_use_background_processes" type="checkbox" value="1"<?php $this->set_checked($cache_use_background_processes); ?> />  
							<?php _e('Build the cache in the background using `wp_remote_get()` - this is generally a good thing.', $this->plugin_slug); ?>
							
							<br /><br />
							<div style="padding:10px;background-color: #EAEAEA;border: 1px solid #ddd;">
								<p><?php _e('Disable this if you are having issues with resources in your environement and you have already tried lowering the caching speed above.', $this->plugin_slug); ?></p>
								<p><?php _e('If disabled, you must then goto any <strong>Add/Edit Search Form</strong> screen to allow the caching processes to complete via Ajax.', $this->plugin_slug); ?></p>
							</div>
							 
						</label>
						
					</td>
				</tr>
				<!--<tr valign="top">	
					<th scope="row" valign="top">
						<?php _e('Use Manual Caching', $this->plugin_slug); ?><br />
					</th>
					<td>
						<label>
							
							
							<input id="search_filter_cache_use_manual" name="search_filter_cache_use_manual" type="checkbox" value="1"<?php $this->set_checked($cache_use_manual); ?> />  
							<?php _e('Manually rebuild the cache via the UI', $this->plugin_slug); ?>
							
							<br /><br />
							<div style="padding:10px;background-color: #EAEAEA;border: 1px solid #ddd;">
								<?php _e('This only applies when initially building the cache or rebuilding the entire cache.  Once the cache has been built once, it is automatically maintained regardless of this setting.', $this->plugin_slug); ?>
							</div>
							 
						</label>
						
					</td>
				</tr>-->
				
			</tbody>
		</table>	
		

		<h3><?php _e('JavaScript', $this->plugin_slug); ?></h3>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">	
					<th scope="row" valign="top">
						<?php _e('Load jQuery UI i18n files', $this->plugin_slug); ?><br />
					</th>
					<td>
						<label>
							<input id="search_filter_load_jquery_i18n" name="search_filter_load_jquery_i18n" type="checkbox" class="" value="1"<?php $this->set_checked($load_jquery_i18n); ?> />  
							 <?php _e('This loads the jQuery i18n files - which allows the date picker to be translated automatically according the jQuery translation files.', $this->plugin_slug); ?>
						</label>
						
					</td>
				</tr>
				<tr valign="top">	
					<th scope="row" valign="top">
						<?php _e('Lazy Load JavaScript', $this->plugin_slug); ?>
					</th>
					<td>
						<label>
							<input id="search_filter_lazy_load_js" name="search_filter_lazy_load_js" type="checkbox" class="" value="1"<?php $this->set_checked($lazy_load_js); ?> /> 
							<?php _e('Not all themes support lazy loading - enabling this option ensures that Search &amp; Filter JavaScript files are only loaded on the pages that contain search forms - speeding up the other pages on your site.', $this->plugin_slug); ?>
						</label>
					</td>
				</tr>
				
			</tbody>
		</table>	
		<?php submit_button(); ?>
	</form>
</div>
