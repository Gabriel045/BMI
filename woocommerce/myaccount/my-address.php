<?php

/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.7.0
 */

defined('ABSPATH') || exit;

$customer_id = get_current_user_id();

if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing'  => __('Billing address', 'woocommerce'),
			'shipping' => __('Shipping address', 'woocommerce'),
		),
		$customer_id
	);
} else {
	$get_addresses = apply_filters(
		'woocommerce_my_account_get_addresses',
		array(
			'billing' => __('Billing address', 'woocommerce'),
		),
		$customer_id
	);
}

$oldcol = 1;
$col    = 1;
?>

<h1 class="text-[48px] mt-[30px]">My Account</h1>
<p class="text-[#82879A] text-[16px] mb-[50px]">
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses(__('Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce'), $allowed_html),
		'<strong class="text-dark-blue">' . esc_html(wp_get_current_user()->user_login) . '</strong>',
		esc_url(wc_logout_url())
	);
	?>
</p>

<!--<p>
	<?php echo apply_filters('woocommerce_my_account_my_address_description', esc_html__('The following addresses will be used on the checkout page by default.', 'woocommerce')); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
	?>
</p>-->

<?php if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) : ?>
	<div class="u-columns woocommerce-Addresses col2-set addresses">
	<?php endif; ?>

	<?php foreach ($get_addresses as $name => $address_title) : ?>
		<?php

		$address = wc_get_account_formatted_address($name);
		$col     = $col * -1;
		$oldcol  = $oldcol * -1;
		?>

		<div class="woocommerce-columns--addresses u-column<?php echo $col < 0 ? 1 : 2; ?> col-<?php echo $oldcol < 0 ? 1 : 2; ?> woocommerce-Address">
			<header class="flex justify-between">
				<h2 class="woocommerce-column__title <?php echo $address_title == "Billing address" ? "invoice" : "car" ?> "><?php echo esc_html($address_title) ?></h2>
				<a class="text-[12px] text-dark-blue font-[500]" href="<?php echo esc_url(wc_get_endpoint_url('edit-address', $name)); ?>" class="edit"><?php echo $address ? esc_html__('Edit', 'woocommerce') : esc_html__('Add', 'woocommerce'); ?></a>
				<!--<h3><?php echo esc_html($address_title); ?></h3>-->
			</header>

			<address>
				<p class="text-[#82879A] text-[14px] pl-[21px] pin relative">
					<?php

					echo $address ? wp_kses_post($address) : esc_html_e('You have not set up this type of address yet.', 'woocommerce');

					/**
					 * Used to output content after core address fields.
					 *
					 * @param string $name Address type.
					 * @since 8.7.0
					 */
					do_action('woocommerce_my_account_after_my_address', $name);

					?>
				</p>
				<?php if ($address_title == "Billing address") :
					$phone = get_user_meta($customer_id, 'billing_phone')[0]; ?>
					<p class="text-[#82879A] text-[14px] woocommerce-customer-details--phone  "><?php echo esc_html($phone); ?></p>
					<p class="text-[#82879A] text-[14px] woocommerce-customer-details--email"><?php echo esc_html(wp_get_current_user()->user_email); ?></p>
				<?php endif ?>
			</address>
		</div>

	<?php endforeach; ?>

	<?php if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) : ?>
	</div>
<?php
	endif;
