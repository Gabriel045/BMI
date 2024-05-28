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
$title        = get_field('title');
$cta          = get_field('cta');
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[112px] py-[100px] relative">
        <div class="flex flex-wrap lg:flex-nowrap">
            <div class="w-full lg:w-[70%]">
                <h2 class="text-[#101828] relative z-[99]"><?php echo $title ?></h2>
            </div>
            <div class="w-full lg:w-[30%]  mt-[30px] lg:mt-0 flex lg:justify-end">
                <div class="w-fit">
                    <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-blue"><?php echo esc_attr($cta["title"]) ?></a>
                </div>
            </div>
        </div>
        <div id="testimonials" class="pb-[50px] mb-[50px] mt-[50px] lg:mt-[100px] z-[99]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="slider-item bg-blue rounded-[16px]">
                    <div class="lg:h-[550px] rounded-[20px] flex flex-col">
                        <figure class="">
                            <img class="h-[343px] w-full object-cover object-top rounded-t-[20px]" src="<?php echo $card["image"] ?>">
                        </figure>
                        <div class="p-[30px]">
                            <div class="flex justify-between">
                                <p class="text-[18px] text-dark-blue font-[600] leading-[32px]"><?php echo $card["name"] ?></p>
                                <span class="text-[10px] text-gray"><?php echo $card["location"] ?></span>
                            </div>
                            <div class="flex flex-col gap-[20px] mt-[32px]">
                                <span class="text-[14px] text-gray"><?php echo $card["weight"] ?></span>
                                <span class="text-[14px] text-gray"><?php echo $card["text"] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="h-[1px] bg-[#D4D4D4] w-[50%] lg:w-[70%] absolute bottom-[130px] right-[30px] lg:right-[112px]"> </div>
        <img class="absolute right-[80px] top-[50%]  scale-x-[-1] rotate-[300deg]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <img class="absolute left-[55px] lg:left-0 top-[-110px] lg:top-[60%] rotate-[92deg] lg:rotate-[250deg] scale-x-[-1] lg:scale-x-0" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
    </div>
</section>


<script>
    jQuery(document).ready(() => {
        jQuery('#testimonials').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 4,
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