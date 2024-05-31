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
}else{
    $block['className'] = "";
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

<section id="text-image" class="<?php echo $background == "Blue" ? 'bg-blue' : 'bg-white' ?> ">
    <div class="block_content px-[30px] lg:px-[112px] py-[100px] relative <?php echo $block['className'] ?>">
        <?php if ($background != "Dark Blue") : ?>
            <div class="flex flex-wrap lg:flex-nowrap lg:flex-row  lg:gap-[50px] <?php echo $image_position == "Right" ? 'flex-col-reverse lg:flex-row-reverse' : 'flex-col flex-col lg:flex-row' ?>">
                <div class="w-full lg:w-[50%] flex">
                    <figure class="w-full relative z-[99]">
                        <img class="w-full rounded-[20px] object-cover h-[446px] lg:h-full" src="<?php echo esc_url($image) ?>">
                    </figure>
                </div>
                <div class="w-full lg:w-[50%] flex flex-col justify-center mt-[50px] lg:mt-0">
                    <h2 class=""> <?php echo $title ?></h2>
                    <div class="mt-[30px] text-gray"><?php echo $text ?></div>
                    <?php if (!empty($cta["url"])) : ?>
                        <div class="w-fit mt-[50px]">
                            <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-blue"><?php echo esc_attr($cta["title"]) ?></a>
                        </div>
                    <?php endif ?>
                </div>
                <img class="absolute left-0 top-[50%] rotate-[80deg] translate-y-[-50%] hidden lg:block" style="filter: brightness(0) saturate(100%) invert(98%) sepia(98%) saturate(7%) hue-rotate(155deg) brightness(102%) contrast(106%);" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
            </div>

        <?php else : ?>
            <div class="bg-dark-blue rounded-[31px] px-[25px] lg:px-[30px] py-[30px] lg:p-[72px]  relative z-[99]">
                <div class="flex flex-wrap lg:flex-nowrap gap-y-[50px]">
                    <div class="w-full lg:w-[60%] flex flex-col justify-center">
                        <h2 class="text-white !text-[36px] !leading-[44px]"> <?php echo $title ?></h2>
                        <div class="my-[30px] text-[#ffffff66] text-[16px]"><?php echo $text ?></div>
                        <div class="w-fit">
                            <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-white arrow_white"><?php echo esc_attr($cta["title"]) ?></a>
                        </div>
                    </div>
                    <div class="w-full lg:w-[40%]">
                        <figure class="w-full flex justify-end">
                            <img class="w-full rounded-[20px] object-cover lg:w-[253px] h-[253px] lg:h-[253px]" src="<?php echo esc_url($image) ?>">
                        </figure>
                    </div>
                </div>
            </div>
            <img class="absolute right-0 top-[-90px] lg:top-[16%] rotate-[98deg] scale-x-[-1] lg:scale-x-auto" style="filter: brightness(0) saturate(100%) invert(12%) sepia(25%) saturate(6480%) hue-rotate(220deg) brightness(92%) contrast(87%);" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <?php endif ?>
    </div>
</section>