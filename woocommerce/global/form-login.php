<?php

/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     7.0.1
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (is_user_logged_in()) {
	return;
}

?>
<h2 class="text-[48px]">Login</h2>
<form class="woocommerce-form woocommerce-form-login login mt-[50px]" method="post" <?php echo ($hidden) ? 'style="display:none;"' : ''; ?>>
	<?php do_action('woocommerce_login_form_start'); ?>

	<?php echo ($message) ? wpautop(wptexturize($message)) : ''; // @codingStandardsIgnoreLine 
	?>

	<p class="form-row form-row-first flex flex-col">
		<label for="username" class="text-[14px] text-dark-blue font-[500]"><?php esc_html_e('Email', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" class="input-text text-[16px] text-[#667085] border-[1px] border-[#D0D5DD] rounded-[8px] mt-[6px] py-[4px] px-[14px]" name="username" id="username" placeholder="Email" autocomplete="username" />
	</p>
	<p class="form-row form-row-last flex flex-col mt-[24px]">
		<label for="password" class="text-[14px] text-dark-blue font-[500]"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
		<input class="input-text woocommerce-Input text-[16px] text-[#667085] border-[1px] border-[#D0D5DD] rounded-[8px] mt-[6px] py-[4px] px-[14px]" type="password" name="password" id="password" placeholder="Password" autocomplete="current-password" />
	</p>
	<div class="clear"></div>

	<?php do_action('woocommerce_login_form'); ?>

	<div class="flex justify-between mt-[30px]">
		<p class="form-row flex flex-col">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme text-[16px] text-gray">
				<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
			</label>
		</p>
		<p class="lost_password text-[16px] text-gray font-[500]">
			<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
		</p>
	</div>
	<p class="submit mt-[50px]">
		<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
		<input type="hidden" name="redirect" value="<?php echo esc_url($redirect); ?>" />
		<button type="submit" style="border-radius:8px;" class="woocommerce-button button btn-blue w-full woocommerce-form-login__submit<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>"><?php esc_html_e('Login', 'woocommerce'); ?></button>
	</p>

	<div class="clear"></div>

	<?php do_action('woocommerce_login_form_end'); ?>

</form>