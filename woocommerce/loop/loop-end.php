<?php

/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
</ul>
<img class="absolute left-[-50px] bottom-[100px] rotate-[-170deg] hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
</div>
</section>

<script>
	const parent = document.querySelector("main")
	const faq = document.querySelector("#faq")
	const steps = document.querySelector("#steps")
	parent.appendChild(steps)
	parent.appendChild(faq)
	const list = document.querySelectorAll("#product-list .product-item")

	list.forEach((element, index) => {
		if (index % 2) {
			element.querySelector(".content").classList.add("flex-row-reverse")
			element.querySelector(".content").classList.remove("flex-row")
			console.log(element);
		}
	});
</script>