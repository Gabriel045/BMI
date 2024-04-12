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

$number     = get_field('number_of_columns');
$cards      = get_field('cards');
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[112px] py-[100px] pt-[45px] relative">
        <div class="px-[50px] py-[75px] flex flex-wrap gap-[2%] bg-blue rounded-[38px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="w-full md:w-[48%] <?php echo $number == 4 ? 'lg:w-[23.5%]' : 'lg:w-[32%]' ?>">
                    <figure class="flex justify-center">
                        <img src="<?php echo $card["image"] ?>" alt="">
                    </figure>
                    <p class="text-[18px] text-dark-blue font-[600] my-[15px] text-center"><?php echo $card["title"] ?></p>
                    <p class="text-[14px] text-gray text-center leading-[20px]"><?php echo $card["text"] ?></p>
                </div>
            <?php endforeach ?>
        </div>
        <img class="absolute left-0 top-[0px] scale-x-[-1] hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
    </div>
</section>