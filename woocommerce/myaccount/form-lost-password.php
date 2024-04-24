<?php

/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_lost_password_form');
?>
<section>
	<div class="block_content px-[30px lg:px-[112px] py-[100px]">
		<div class="flex justify-center">
			<div class="w-[480px]">
				<h2 class="text-[48px] text-center">Reset Password</h2>
				<form method="post" class="woocommerce-ResetPassword lost_reset_password mt-[50px]">
					<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first" style="width:100%;">
						<label for="user_login" class="text-[14px] text-dark-blue font-[500]"><?php esc_html_e('Username or email', 'woocommerce'); ?></label>
						<input class="woocommerce-Input woocommerce-Input--text input-text text-[16px] text-[#667085] border-[1px] border-[#D0D5DD] rounded-[8px] mt-[6px] py-[6px] px-[14px]" type="text" name="user_login" id="user_login" autocomplete="username" placeholder="Email" />
					</p>

					<div class="clear"></div>

					<?php do_action('woocommerce_lostpassword_form'); ?>

					<a href="/login/" class="mt-[10px] flex text-[14px]">
						<img class="scale-x-[-1] mr-[5px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector.svg" style="filter: brightness(0) saturate(100%) invert(19%) sepia(23%) saturate(3111%) hue-rotate(201deg) brightness(88%) contrast(96%);">
						Go back to sign up page
					</a>

					<p class="woocommerce-form-row mt-[24px]">
						<input type="hidden" name="wc_reset_password" value="true" />
						<button type="submit" style="border-radius:8px;" class="btn-blue w-full button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>"><?php esc_html_e('Reset password', 'woocommerce'); ?></button>
					</p>

					<?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
				</form>
			</div>
		</div>
	</div>
</section>

<?php
do_action('woocommerce_after_lost_password_form');
