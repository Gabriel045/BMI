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
$product    = get_field('product');
$text       = get_field('text');
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[112px] pb-[100px] relative flex flex-col-reverse lg:flex-col ">
        <div class="px-[30px] lg:px-[50px] flex flex-wrap gap-[2%] <?php echo $product ? 'bg-white ' : 'bg-blue  py-[75px]' ?>  rounded-[38px] gap-y-[50px] relative z-[99]">
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
        <?php if (!$product) { ?>
            <img class="absolute left-0 bottom-[-80px] lg:top-[0px] scale-x-[-1] rotate-[-80deg] lg:rotate-[354deg] lg:row-auto" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <?php  } ?>
        <p class="mt-[30px] mb-[50px] lg:mb-0 lg:mt-[50px] text-[#475467]">
            <?php echo $text ?>
        </p>
    </div>
</section>