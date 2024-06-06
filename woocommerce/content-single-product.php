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
$gallery        = $product->get_gallery_image_ids();
$image          = $product->get_image_id();
$title          = $product->get_title();
$price          = $product->get_regular_price();
$description    = $product->get_short_description();
$props          = get_field("props");
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
    <section>
        <div class="block_content py-[100px] px-[30px] lg:px-[112px]">
            <div class="flex flex-wrap lg:flex-nowrap gap-[90px]">
                <div class="w-full lg:w-[55%] flex flex-nowrap gap-[12px]">
                    <div class="w-full bg-blue rounded-[21px] py-[50px] px-[20px] md:px-[40px] flex justify-center items-center">
                        <figure class="lg:w-[70%] h-auto">
                            <img class="object-cover w-full !h-[400px] lg:!h-full" src="<?php echo wp_get_attachment_image_url($image, 'full')  ?>">
                        </figure>
                    </div>
                </div>
                <div class="w-full lg:w-[45%] flex flex-col justify-center">
                    <h2 class="text-start"><?php echo $title ?></h2>
                    <div class="mt-[20px] flex gap-[10%] lg:gap-[15%]">
                        <figure>
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Frame 13.png">
                        </figure>
                        <span class="text-[12px] lg:text-[14px] text-gray">4.9 Avg. Rating</span>
                        <span class="text-[12px] lg:text-[14px] text-gray">800+ Reviews</span>
                    </div>
                    <span class="product-description mt-[20px] text-[12px] lg:text-[14px] text-gray"><?php echo $description ?></span>
                    <div class="mt-[30px] flex flex-col gap-y-[20px] overflow-hidden h-auto">
                        <?php foreach ($props as $key => $prop) : ?>
                            <div id="product-props">
                                <span class="title flex items-start text-[14px] lg:text-[16px] text-gray relative pr-[30px] <?php echo $prop["text"] ? "arrow"  : "" ?>">
                                    <img class="mr-[10px] mt-[5px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check.svg" style="filter: brightness(0) saturate(100%) invert(18%) sepia(16%) saturate(3719%) hue-rotate(197deg) brightness(98%) contrast(97%);" alt="">
                                    <?php echo $prop["title"] ?>
                                </span>
                                <?php if ($prop["text"]) : ?>
                                    <div class="content text-gray pl-[30px]"><?php echo $prop["text"] ?></div>
                                <?php endif ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="mt-[30px] flex justify-start">
                        <span class="text-dark-blue text-[24px] font-[600]">$<?php echo $price ?></span>
                        <span class="text-[16px] text-gray flex items-center ml-[5px]"> per month</span>
                    </div>
                    <div class="mt-[30px]">
                        <div class=" flex items-center lg:items-start flex-col">
                            <?php do_action('woocommerce_after_shop_loop_item'); ?>
                        </div>
                        <!--<div class="mt-[30px] flex items-center lg:items-start flex-col">
                            <a class=" text-dark-blue w-[80%] text-[20px] font-[500] flex items-center flex-col py-[15px] px-[30px] border-[1px] border-dark-blue rounded-[70px]">
                                3 Months Plan
                                <span class="text-[10px] lg:text-[12px] font-[400] text-center block">Choose 3 Month Supply and save upto 20%</span>
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="content">
        <section class="">
            <div class="flex block_content px-[30px] lg:px-[112px] pb-[50px]">
                <div class="hidden md:flex w-[30%]  justify-center items-center">
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
                    <span class="text-[10px] lg:text-[14px] text-gray">800+ Reviews</span>
                </div>
                <div class="hidden md:flex w-[30%] justify-center items-center">
                    <div class="w-full h-[1px] bg-[#D4D4D4]"></div>
                </div>
            </div>
        </section>
        <?php the_content() ?>
    </div>
</div>

<script>
    const items = document.querySelectorAll("#product-props")
    items.forEach(item => {
        item.querySelector(".title").addEventListener("click", () => {
            //close the other tabs
            items.forEach(element => {
                if (item != element)
                    element.classList.contains("active") ? element.classList.remove("active") : ''
            });
            item.classList.toggle("active")
        })
    });
</script>