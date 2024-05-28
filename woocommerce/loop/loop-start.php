<?php

/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>


<section>
	<div class="block_content px-[30px] lg:px-[112px] pb-[50px] relative">
		<div class="w-fit fixed bottom-[30px] right-[30px] z-[99999999] block lg:hidden">
			<a class="rounded-[100px] bg-dark-blue px-[15px] py-[25px] flex text-center justify-center text-white text-[15px] leading-[15px]">Get <br> started</a>
		</div>
		<ul id="product-list" class="flex flex-col gap-[50px] products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">