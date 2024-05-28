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
    <div class="block_content pl-[30px] lg:pl-[112px] pr-[30px] lg:pr-0 py-[100px] relative">
        <div id="multiple-testimonials" class="pb-[50px] mb-[50px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="slider-item bg-white rounded-[16px]">
                    <div class="lg:min-h-[430px] rounded-[16px] py-[25px] lg:py-[40px] px-[16px] lg:px-[24px] flex flex-col">
                        <p class="text-[16px] lg:text-[22px] text-dark-blue font-[500] leading-[20px] lg:leading-[32px]"><?php echo $card["text"] ?></p>
                        <div class="flex gap-[20px] mt-[32px]">
                            <figure>
                                <img class="rounded-[50%] w-[50px] lg:w-[60px]" src="<?php echo $card["image"] ?>">
                            </figure>
                            <div class="flex items-center">
                                <p class="text-[12px] lg:text-[18px] font-[600] text-dark-blue"><?php echo $card["name"] ?></p>
                                <span class="text-[10px] lg:text-[13px] text-gray ml-[20px]"><?php echo $card["weight"] ?></span>
                            </div>
                            <figure class="m-auto">
                                <img class="lg:w-auto w-[80px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Frame 13.png">
                            </figure>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="h-[1px] bg-white w-[50%] lg:w-[70%] absolute bottom-[130px] right-[30px] lg:right-[112px]"> </div>
    </div>
</section>


<script>
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
</script>