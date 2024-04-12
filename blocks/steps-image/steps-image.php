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
    <div class="block_content px-[30px] lg:px-[112px] pt-[100px] pb-[100px] lg:pb-0 relative">
        <div class="flex flex-col gap-y-[100px]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="flex gap-[5%]">
                    <div class="w-full lg:w-[55%]">
                        <span class="flex w-fit text-[20px] text-gray bg-blue py-[8px] px-[30px] rounded-[30px]">Step <?php echo $key + 1 ?></span>
                        <h2 class="my-[30px]"> <?php echo $card["title"]  ?> </h2>
                        <p class="mt-[20px] text-[16px] text-[gray] leading-[24px]"><?php echo $card["text"] ?></p>
                        <div class="mt-[30px] flex flex-col gap-y-[20px]">
                            <?php foreach ($card["features"]  as $check) : ?>
                                <span class="w-fit flex text-[14px] lg:text-[16px] leading-[20px] text-gray px-[30px] py-[8px] bg-blue rounded-[34px]">
                                    <img class="mr-[10px] mt-[2px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check.svg">
                                    <?php echo $check["text"] ?>
                                </span>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="w-full lg:w-[40%]">
                        <figure>
                            <img class="rounded-[20px] object-cover h-[490px] w-full" src="<?php echo $card['image'] ?>" alt="">
                        </figure>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>