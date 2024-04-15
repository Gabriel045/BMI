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
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <section>
        <div class="block_content py-[100px] px-[112px]">
            <div class="flex gap-[38px]">
                <div class="w-full lg:w-[60%] flex flex-wrap gap-[12px]">
                    <?php foreach ($gallery as $key => $value) : ?>
                        <div class="w-[49%] bg-blue h-[850px] py-[25%] px-[10%] rounded-[21px] justify-center items-center">
                            <figure class="h-full">
                                <img class="object-cover" style="height: 100%;" src="<?php echo wp_get_attachment_image_url($value, 'full')  ?>">
                            </figure>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="w-full lg:w-[40%]">
                    <h2><?php echo $title ?></h2>
                    <div class="mt-[20px] flex gap-[15%]">
                        <figure>
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Frame 13.png">
                        </figure>
                        <span class="text-[14px] text-gray">4.9 Avg. Rating</span>
                        <span class="text-[14px] text-gray">690 Reviews</span>
                    </div>
                    <span class="mt-[20px] text-[14px] text-gray flex">Join 10k+ Members in reaching their weight loss goals</span>
                    <div class="mt-[50px]">
                         <?php require(get_theme_file_path('/blocks/accordion/accordion.php')) ?>   
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>