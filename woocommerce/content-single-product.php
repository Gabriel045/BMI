<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;
$gallery = $product->get_gallery_image_ids();
$title   = $product->get_title();
$price   = $product->get_regular_price();
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <section>
        <div class="block_content py-[100px] px-[30px] lg:px-[112px]">
            <div class="flex flex-wrap lg:flex-nowrap gap-[38px]">
                <div class="w-full lg:w-[60%] flex flex-nowrap gap-[12px]">
                    <?php foreach ($gallery as $key => $value) : ?>
                        <div class="w-[49%] bg-blue rounded-[21px] py-[50px] px-[40px] flex justify-center items-center">
                            <figure class="w-[215px] lg:w-[214px] lg:h-[445px]">
                                <img class="object-cover w-full" style="height:100%" src="<?php echo wp_get_attachment_image_url($value, 'full')  ?>">
                            </figure>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="w-full lg:w-[40%]">
                    <h2 class="text-center lg:text-start"><?php echo $title ?></h2>
                    <div class="mt-[20px] flex gap-[10%] lg:gap-[15%]">
                        <figure>
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Frame 13.png">
                        </figure>
                        <span class="text-[12px] lg:text-[14px] text-gray">4.9 Avg. Rating</span>
                        <span class="text-[12px] lg:text-[14px] text-gray">690 Reviews</span>
                    </div>
                    <span class="mt-[20px] text-[12px] lg:text-[14px] text-gray flex">The same active ingredient in Wegovy®* and Ozempic®* for only $xxx per Month</span>
                    <div class="mt-[50px]">
                        <span class="flex text-[14px] lg:text-[16px]">
                            <img class="mr-[10px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check.svg" alt="">
                            Includes Provider and Medication </span>
                        <span class="mt-[30px] flex text-[14px] lg:text-[16px]">
                            <img class="mr-[10px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check.svg" alt="">
                            No hidden fees - no insurance needed 
                        </span>
                    </div>
                    <div class="mt-[30px] flex justify-start">
                        <span class="text-dark-blue text-[24px] font-[600]">$<?php echo $price ?></span>
                        <span class="text-[16px] text-gray flex items-center ml-[5px]"> per month</span>
                    </div>
                    <div class="mt-[30px]">
                        <div class=" flex justify-center">
                            <a href="#" class="btn-blue w-full">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        <section class="">
            <div class="flex block_content px-[30px] lg:px-[112px] pb-[25px]">
                <div class="hidden lg:flex w-[30%]  justify-center items-center">
                    <div class="w-full h-[1px] bg-[#D4D4D4]"></div>
                </div>
                <div class="flex flex-row justify-center items-center gap-[20px] lg:gap-[30px] w-full lg:w-[40%]">
                    <figure>
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/google.svg">
                    </figure>
                    <span class="text-[10px] lg:text-[14px] text-gray">4.9 Avg. Rating</span>
                    <figure>
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Frame 13.png">
                    </figure>
                    <span class="text-[10px] lg:text-[14px] text-gray">690 Reviews</span>
                </div>
                <div class="hidden lg:flex w-[30%] justify-center items-center">
                    <div class="w-full h-[1px] bg-[#D4D4D4]"></div>
                </div>
            </div>
        </section>
        <?php the_content() ?>
    </div>
</div>