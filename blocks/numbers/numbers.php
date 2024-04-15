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

<section class="">
    <div class="block_content px-[30px] lg:px-[112px] ">
        <div class="flex flex-wrap lg:flex-nowrap justify-between gap-y-[50px]">
            <?php  foreach ($cards as $key => $card) : ?>
                <div class="w-full lg:w-auto flex flex-col lg:gap-y-[20px]">
                    <h2 class="text-center"><?php echo $card["numbers"] ?></h2>
                    <p class="text-[16px] text-gray text-center"><?php echo $card["text"] ?></p>

                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>