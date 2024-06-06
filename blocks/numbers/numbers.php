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
$cards       = get_field('cards');
$text        = get_field('text');
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[112px] pb-[10px]">
        <figure class="flex justify-center pb-[50px]">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Group 236.svg" alt="">
        </figure>
        <div class=" text-[#475467]">
            <?php echo $text ?>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap justify-between  gap-y-[20px] gap-[2%] mt-[100px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="colors w-[48%] lg:w-auto flex flex-col justify-around gap-y-[10px] rounded-[20px] px-[20px] lg:px-[50px] py-[20px] first:bg-[#73DC78] last:bg-[#DC7399]">
                    <h2 class="text-center !text-[36px] leading-[30px] text-white"><?php echo $card["numbers"] ?></h2>
                    <p class="text-[16px] text-dark-blue text-center leading-[16px]"><?php echo $card["text"] ?></p>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>