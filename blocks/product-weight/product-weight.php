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
$subtitle     = get_field('subtitle');
?>

<section class="bg-blue mt-[100px]">
    <div class="block_content px-[30px] lg:px-[112px] py-[100px] h-[460px]" style="background-position: center; background-repeat: no-repeat; background-image:url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/bg.svg)">
        <div class="flex justify-center h-full items-center">
            <div class="lg:w-[40%]">
                <h2 class="text-center"><?php echo $title ?></h2>
                <p class="text-center text-[14px] leading-normal my-[35px] text-gray"><?php echo $text ?></p>
                <h3 class="text-dark-blue text-center text-[24px] font-[600]"><?php echo $subtitle ?></h3>
            </div>
        </div>
    </div>
</section>