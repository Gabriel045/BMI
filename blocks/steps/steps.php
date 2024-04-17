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
$cards        = get_field('cards');
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[112px] pt-[100px] pb-[100px] lg:pb-0 relative">
        <div class="lg:w-[70%]">
            <h2><?php echo $title ?></h2>
            <p class="mt-[20px] text-gray"> <?php echo $text ?></p>
        </div>
        <div class="hidden lg:flex gap-[23px] flex-row flex-wrap mt-[50px] mb-[100px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="w-[31.4%] z-[99] bg-blue rounded-[10px] px-[20px] py-[30px]">
                    <span class="flex w-fit text-[16px] text-white bg-dark-blue py-[10px] px-[30px] rounded-[30px]">Step <?php echo sprintf('%02d', $key + 1); ?></span>
                    <div class="mt-[20px] text-[16px] text-gray leading-[24px]"><?php echo $card["text"] ?></div>
                </div>
            <?php endforeach ?>
        </div>
        <div id="multiple-steps" class="pb-[50px] mb-[50px] mt-[50px] lg:hidden block">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="z-[99] bg-blue rounded-[10px] px-[20px] py-[30px]">
                    <span class="flex w-fit text-[16px] text-white bg-dark-blue py-[10px] px-[30px] rounded-[30px]">Step <?php echo sprintf('%02d', $key + 1); ?></span>
                    <div class="mt-[20px] text-[16px] text-gray leading-[24px]"><?php echo $card["text"] ?></div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="h-[1px] bg-blue w-[50%] lg:w-[70%] absolute bottom-[130px] right-[30px] lg:right-[112px] lg:hidden block"> </div>
        <div class="h-[1px] w-[100%] bg-[#E4E4E4] bottom-0 hidden lg:block"> </div>
        <img class="absolute right-0 lg:top-[22px] lg:bottom-auto bottom-[-190px] rotate-[205deg] lg:rotate-[15deg] " src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <img class="absolute left-[-50px] bottom-[-15px] rotate-[-170deg] hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
    </div>
</section>

<script>
    jQuery(document).ready(() => {
        jQuery('#multiple-steps').slick({
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
</script>