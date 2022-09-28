<?php
add_action('admin_menu', 'ct_add_admin_menu');
add_action('admin_init', 'ct_settings_init');

function ct_add_admin_menu()
{
    add_menu_page('Site Options', 'Site Options', 'manage_options', 'theme-options', 'ct_options_page');
}

function ct_settings_init()
{

    register_setting('ct_site_options', 'ct_settings');

    add_settings_section('ct_site_options_info_section', __('Company Information', 'ct') , 'ct_settings_section_callback', 'ct_site_options');

    add_settings_field('ct_settings_company_logo', __('Company logo', 'ct') , 'ct_settings_company_logo_render', 'ct_site_options', 'ct_site_options_info_section');

    add_settings_field('ct_settings_company_address', __('Company Address', 'ct') , 'ct_settings_company_address_render', 'ct_site_options', 'ct_site_options_info_section');

    add_settings_field('ct_settings_company_phone', __('Company Phone Number', 'ct') , 'ct_settings_company_phone_render', 'ct_site_options', 'ct_site_options_info_section');

    add_settings_field('ct_settings_company_fax', __('Company Fax Number', 'ct') , 'ct_settings_company_fax_render', 'ct_site_options', 'ct_site_options_info_section');

    add_settings_section('ct_site_options_socials_section', __('Social Media', 'ct') , 'ct_settings_section_callback', 'ct_site_options');

    add_settings_field('ct_settings_socials_fb', __('Facebook URL', 'ct') , 'ct_settings_socials_fb_render', 'ct_site_options', 'ct_site_options_socials_section');

    add_settings_field('ct_settings_socials_tw', __('Twitter URL', 'ct') , 'ct_settings_socials_tw_render', 'ct_site_options', 'ct_site_options_socials_section');

    add_settings_field('ct_settings_socials_yt', __('YouTube URL', 'ct') , 'ct_settings_socials_yt_render', 'ct_site_options', 'ct_site_options_socials_section');
}

function ct_settings_company_logo_render()
{
    $options = get_option('ct_settings');
    $custom_logo = get_option('custom_logo');
    $custom_logo_id = get_option('site_logo');
    $attachment_id = attachment_url_to_postid($options['ct_settings_company_logo']);

    if ($options['ct_settings_company_logo'] != '')
    {
        if ($custom_logo == '' || $custom_logo != $options['ct_settings_company_logo'])
        { ?>
		<p><img src=" <?=$options['ct_settings_company_logo']; ?>" id="company_logo" alt=""></p>

	<?php update_option('custom_logo', $options['ct_settings_company_logo'], true);
            update_option('site_logo', $attachment_id, true);
        }
        elseif ($custom_logo == $options['ct_settings_company_logo'] && $custom_logo_id != $attachment_id)
        { ?>
		<p><img src=" <?=wp_get_attachment_image_src($custom_logo_id, 'full') [0] ?>" id="company_logo" alt=""></p>
	<?php $options['ct_settings_company_logo'] = wp_get_attachment_image_src($custom_logo_id, 'full') [0];
            update_option('ct_settings', $options, true);
        }
        else
        { ?>
		<p><img src=" <?=$options['ct_settings_company_logo']; ?>" id="company_logo" alt=""></p>

	
<?php
        }
    }
    else
    {
        if (intval($custom_logo_id) > 0)
        {
            $options['ct_settings_company_logo'] = wp_get_attachment_image_src($custom_logo_id, 'full') [0];
            update_option('ct_settings', $options, true); ?>
			<p><img src=" <?=$options['ct_settings_company_logo']; ?>" id="company_logo" alt=""></p>

<?php
        }
        else
        {
            echo 'We need to upload some logo';
        }
    }
?>
<p>Insert the logo URL or upload the logo image </p>
<p>
	<input id="upload_image" type="text" size="60" name="ct_settings[ct_settings_company_logo]" value="<?=$options['ct_settings_company_logo']; ?>" />
</p>
			<p>	<input id="upload_image_button" class="button" type="button" value="Upload New Logo" />   </p>

 <?php
}

function ct_settings_company_address_render()
{
    $options = get_option('ct_settings');
?>
	<textarea rows="4" cols="50" name='ct_settings[ct_settings_company_address]'><?php echo $options['ct_settings_company_address']; ?></textarea>
	<?php
}

function ct_settings_company_phone_render()
{

    $options = get_option('ct_settings');
?>
	<input type='text' size="50" name='ct_settings[ct_settings_company_phone]' value='<?php echo $options['ct_settings_company_phone']; ?>'>
	<?php
}

function ct_settings_company_fax_render()
{
    $options = get_option('ct_settings'); ?>
	<input type='text' name='ct_settings[ct_settings_company_fax]' value='<?php echo $options['ct_settings_company_fax']; ?>'>
	<?php
}

function ct_settings_socials_fb_render()
{
    $options = get_option('ct_settings'); ?>
	<input type='text' name='ct_settings[ct_settings_socials_fb]' value='<?php echo $options['ct_settings_socials_fb']; ?>'>
	<?php
}

function ct_settings_socials_tw_render()
{
    $options = get_option('ct_settings'); ?>
	<input type='text' name='ct_settings[ct_settings_socials_tw]' value='<?php echo $options['ct_settings_socials_tw']; ?>'>
	<?php
}

function ct_settings_socials_yt_render()
{
    $options = get_option('ct_settings'); ?>
	<input type='text' name='ct_settings[ct_settings_socials_yt]' value='<?php echo $options['ct_settings_socials_yt']; ?>'>
	<?php
}

function ct_settings_section_callback()
{
    echo __('Social media URLs', 'ct-custom');

}

function ct_options_page()
{
?>
		<div class="section panel">
			<h1>Theme Options</h1>
			<form method="post" enctype="multipart/form-data" action="options.php" >
			<?php
				settings_fields('ct_site_options');
				do_settings_sections('ct_site_options');

?>
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</form>
		</div>
	<?php
};

