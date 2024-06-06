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

$title        = get_field('title');
$text         = get_field('text');
$cta          = get_field('cta');
$image        = get_field('image');
$icons        = get_field('icons');

?>

<section class="relative">
    <div class="block_content px-[30px] lg:px-[112px] lg:pt-[64px] pt-[50px] pb-[100px] lg:pb-[96px] ">
        <div class="flex gap-[20px]">
            <div class="w-full lg:w-[50%] flex flex-col justify-center">
                <h1 class="relative"><?php echo $title ?></h1>
                <div class="text-gray my-[24px] relative z-[99]"><?php echo $text ?></div>
                <div class="flex gap-[30px] lg:gap-[60px] flex-wrap">
                    <div class="flex flex-col gap-y-[17px] w-full lg:w-auto">
                        <p class="text-dark-blue font-[600] leading-[20px] text-[20px] relative z-[99]">>60K</p>
                        <span class="text-[13px] text-gray relative z-[99]">bmiMD Members</span>
                    </div>
                    <div class="flex flex-col gap-y-[17px] w-full lg:w-auto">
                        <figure>
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Frame 13.png">
                        </figure>
                        <span class="text-[13px] text-gray">4.9 Avg Rating | 800+ Google Reviews</span>
                        <figure>
                            <img class="w-[200px] lg:ml-[-5px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/trustpilot.png">
                        </figure>
                    </div>
                </div>
                <div class="mt-[50px] flex gap-[10px]">
                    <div class=" w-fit">
                        <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-blue relative z-[99]"><?php echo esc_attr($cta["title"]) ?></a>
                    </div>
                    <div class="w-fit">
                        <a href="/faq/" target="" class="text-[16px] lg:text-[20px] text-dark-blue px-[30px] py-[15px] flex justify-center items-center leading-[20px]">Am I Eligible</a>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex w-[50%] justify-end relative">
                <figure class="w-[90%]">
                    <img class="rounded-[33px] h-[640px] object-cover w-full z-[99]" src="<?php echo $image ?>">
                </figure>
            </div>
        </div>
        <img class="absolute right-0 bottom-[-20px] hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <img class="absolute left-0 bottom-[-20px] scale-x-[-1] hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <img class="absolute right-0 bottom-[-40px] lg:hidden block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 25.svg">
    </div>
</section>
<section class="bg-dark-blue relative z-[99]">
    <div class="block_content py-[30px] px-[30px]">
        <div id="icons" class="">
            <?php foreach ($icons as $key => $icon) : ?>
                <figure class="!flex justify-center items-center !h-auto">
                    <img class="lg:max-w-[120px]" style="filter: brightness(0) saturate(100%) invert(98%) sepia(0%) saturate(7493%) hue-rotate(207deg) brightness(104%) contrast(104%);" src="<?php echo $icon["image"] ?>">
                </figure>
            <?php endforeach ?>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(() => {
        jQuery('#icons').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 7,
            slidesToScroll: 1,
            dots: false,
            useTransform: false,
            arrows: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    })
</script>