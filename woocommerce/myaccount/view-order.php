<?php

/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined('ABSPATH') || exit;

$notes = $order->get_customer_order_notes();
?>

<h1 class="text-[48px] mt-[30px]">My Account</h1>
<p class="text-[#82879A] text-[16px] mb-[50px]">
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses(__('Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce'), $allowed_html),
		'<strong class="text-dark-blue">' . esc_html(wp_get_current_user()-> display_name) . '</strong>',
		esc_url(wc_logout_url())
	);
	?>
</p>

<div class="container border-[1px] border-[#EEEEEE] rounded-[10px] px-[65px] py-[50px]">
<div class="status <?php echo wc_get_order_status_name($order->get_status())?> mb-[32px]">
	<p>
		<?php
		printf(
			/* translators: 1: order number 2: order date 3: order status */
			esc_html__('Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce'),
			'<mark class="order-number">' . $order->get_order_number() . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'<mark class="order-date">' . wc_format_datetime($order->get_date_created()) . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'<mark class="order-status">' . wc_get_order_status_name($order->get_status()) . '</mark>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
		?>
	</p>
</div>

	<?php if ($notes) : ?>
		<h2><?php esc_html_e('Order updates', 'woocommerce'); ?></h2>
		<ol class="woocommerce-OrderUpdates commentlist notes">
			<?php foreach ($notes as $note) : ?>
				<li class="woocommerce-OrderUpdate comment note">
					<div class="woocommerce-OrderUpdate-inner comment_container">
						<div class="woocommerce-OrderUpdate-text comment-text">
							<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n(esc_html__('l jS \o\f F Y, h:ia', 'woocommerce'), strtotime($note->comment_date)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
																			?></p>
							<div class="woocommerce-OrderUpdate-description description">
								<?php echo wpautop(wptexturize($note->comment_content)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	<?php endif; ?>

	<?php do_action('woocommerce_view_order', $order_id); ?>
</div>

<?php
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();

/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action('woocommerce_after_order_details', $order);

if ($show_customer_details) {
	wc_get_template('order/order-details-customer.php', array('order' => $order));
}
