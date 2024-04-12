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
$background     =  get_field('background');
$image_position =  get_field('image_position');
$title          =  get_field('title');
$text           =  get_field('text');
$image          =  get_field('image');
$cta            =  get_field('cta');

?>

<section id="text-image" class="<?php echo $background == "Blue" ? 'bg-blue' : 'bg-white' ?>">
    <div class="block_content px-[30px] lg:px-[112px] py-[100px] relative">
        <div class="flex flex-wrap lg:flex-nowrap lg:flex-row  lg:gap-[100px] <?php echo $image_position == "Right" ? 'flex-col-reverse lg:flex-row-reverse' : 'flex-col flex-col lg:flex-row' ?>">
            <div class="w-full lg:w-[45%] flex">
                <figure class="w-full relative z-[99]">
                    <img class="w-full rounded-[20px] object-cover h-[446px] lg:h-full" src="<?php echo esc_url($image) ?>">
                </figure>
            </div>
            <div class="w-full lg:w-[55%] flex flex-col justify-center mt-[50px] lg:mt-0">
                <h2 class=""> <?php echo $title ?></h2>
                <div class="my-[30px] text-gray"><?php echo $text ?></div>
                <div class="w-fit mt-[50px]">
                    <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-blue"><?php echo esc_attr($cta["title"]) ?></a>
                </div>
            </div>
        </div>
        <img class="absolute left-0 top-[50%] rotate-[80deg] translate-y-[-50%] hidden lg:block" style="filter: brightness(0) saturate(100%) invert(98%) sepia(98%) saturate(7%) hue-rotate(155deg) brightness(102%) contrast(106%);" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
    </div>
</section>