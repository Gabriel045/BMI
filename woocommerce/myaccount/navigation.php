<?php

/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_account_navigation');

?>

<nav class="woocommerce-MyAccount-navigation h-auto">
	<ul class="bg-[#F5F8FF] rounded-[10px] px-[16px] py-[32px] w-[250px] flex flex-col gap-y-[20px] h-full">
		<?php foreach (wc_get_account_menu_items() as $endpoint => $label) :
			if ($label != "Downloads") : ?>
				<li class="py-[8px] px-[12px] text-[16px] font-[600] bg-[#E4EAFF] rounded-[8px] flex gap-[12px] <?php echo wc_get_account_menu_item_classes($endpoint); ?>">
					<a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>"><?php echo esc_html($label); ?></a>
				</li>

		<?php
			endif;
		endforeach; ?>
	</ul>
</nav>

<?php do_action('woocommerce_after_account_navigation'); ?>