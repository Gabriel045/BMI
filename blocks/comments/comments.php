<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */


if (isset($block['data']['preview_image_my_acf_block'])) {

    echo '<img src="' . get_template_directory_uri() . $block['data']['preview_image_my_acf_block'] . ' " style="width: 100%; height: auto;">';

    return;
}


// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'hero-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.

$cards        = get_field('cards');
?>

<section class="bg-blue">
    <div class=" py-[80px] relative w-full">
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
            </div>
            <div class="hidden md:flex w-[30%] justify-center items-center">
                <div class="w-full h-[1px] bg-[#D4D4D4]"></div>
            </div>
        </div>
        <div class="">
            <?php echo do_shortcode("[trustindex no-registration=google]") ?>
        </div>
    </div>
</section>


<!--<script>
    jQuery(document).ready(() => {
        jQuery('#multiple-testimonials').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            useTransform: false,
            arrows: true,
            prevArrow: "<span class='a-left  control-c prev slick-prev relative z-[9999]'></span>",
            nextArrow: "<span class='a-right  control-c next slick-next relative z-[9999]'></span>",
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    })
</script>-->