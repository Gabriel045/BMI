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
$cta        = get_field('cta');
?>

<section class="">

    <div class="block_content px-[30px] lg:px-[112px] relative">
        <div class="flex flex-col items-center">
            <h2 class="text-center lg:text-start"><?php echo $title ?></h2>
            <p class="mt-[20px] text-gray "> <?php echo $text ?></p>
        </div>
        <div class="flex flex-col flex-wrap gap-y-[100px] mt-[100px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="flex  flex-wrap lg:flex-nowrap <?php echo $key % 2 == 0 ? 'flex-row' : 'flex-row-reverse' ?>  gap-[60px] ">
                    <div class="w-full flex justify-center lg:w-[35%]">
                        <fugure>
                            <img src="<?php echo $card["image"] ?>">
                        </fugure>
                    </div>
                    <div class="w-full lg:w-[65%]  bg-blue px-[30px] lg:px-[60px] py-[50px] lg:py-[70px] rounded-[21px] z-[99]">
                        <span class="text-[20px] text-[#82879A] mb-[30px] block">Step <?php echo sprintf('%02d', $key + 1); ?></span>
                        <div class="text-[#82879A]"><?php echo $card["text"] ?></div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="flex flex-row mt-[100px]">
            <div class="w-[35%] hidden lg:flex items-center">
                <div class="h-[1px] w-[100%] bg-[#E4E4E4]"></div>
            </div>
            <div class="w-full lg:w-[30%] flex justify-center">
                <div class="w-fit">
                    <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-blue" style="padding-left:50px; padding-right:50px;"><?php echo esc_attr($cta["title"]) ?></a>
                </div>
            </div>
            <div class="w-[35%] hidden lg:flex items-center">
                <div class="h-[1px] w-[100%] bg-[#E4E4E4]"></div>
            </div>
        </div>
        <img class="absolute right-[50px] lg:top-[250px] lg:bottom-auto bottom-[-190px] lg:rotate-[76deg]  hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <img class="absolute left-[-15px] bottom-[650px] rotate-[-184deg] hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <img class="absolute right-[-15px] bottom-[300px] rotate-[-184deg] scale-x-[-1] scale-y-[-1] hidden  lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
    </div>
</section>