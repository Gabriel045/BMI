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
$class_name = "";
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
// Load values and assign defaults.

$number     = get_field('number_of_columns');
$cards      = get_field('cards');
$product    = get_field('product');
$text       = get_field('text');
?>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<section class="">
    <div class="block_content px-[30px] lg:px-[112px]  py-[100px] relative flex flex-col-reverse lg:flex-col  <?php echo $class_name  ?>">
        <div class="px-[30px] lg:px-[50px] flex flex-wrap gap-[2%] <?php echo $product ? 'bg-white ' : 'bg-blue  py-[75px]' ?>  rounded-[38px] gap-y-[50px] relative z-[99]">
            <?php foreach ($cards as $key => $card) : ?>
                <div class="w-full md:w-[48%] <?php echo $number == 4 ? 'lg:w-[23.5%]' : 'lg:w-[32%]' ?>">
                    <?php if (!$product) : ?>
                        <figure class="flex justify-center">
                            <img src="<?php echo $card["image"] ?>" alt="">
                        </figure>
                    <?php else : ?>
                        <div class="m-auto bg-[#E4EAFF] w-[120px] h-[120px] flex justify-center items-center p-[20px]">
                            <?php if ($key == 0) : ?>
                                <lottie-player src="<?php echo get_stylesheet_directory_uri() ?>/assets/lottie/heartbeat.json" background="transparent" speed="1" style="width: 80px; height: 80px;" loop autoplay></lottie-player>
                            <?php elseif ($key == 1) : ?>
                                <lottie-player src="<?php echo get_stylesheet_directory_uri() ?>/assets/lottie/02-scale.json" background="transparent" speed="1" style="width: 80px; height: 80px;" loop autoplay></lottie-player>
                            <?php elseif ($key == 2) : ?>
                                <lottie-player src="<?php echo get_stylesheet_directory_uri() ?>/assets/lottie/03-time.json" background="transparent" speed="1" style="width: 80px; height: 80px;" loop autoplay></lottie-player>
                            <?php elseif ($key == 3) : ?>
                                <lottie-player src="<?php echo get_stylesheet_directory_uri() ?>/assets/lottie/04-deit.json" background="transparent" speed="1" style="width: 80px; height: 80px;" loop autoplay></lottie-player>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                    <p class="text-[18px] text-dark-blue font-[600] my-[15px] text-center"><?php echo $card["title"] ?></p>
                    <p class="text-[14px] text-gray text-center leading-[20px]"><?php echo $card["text"] ?></p>
                </div>
            <?php endforeach ?>
        </div>
        <?php if (!$product) { ?>
            <img class="absolute left-0 bottom-[-80px] lg:top-[0px] scale-x-[-1] rotate-[-80deg] lg:rotate-[354deg] lg:row-auto" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <?php  } ?>
        <?php if (!empty($text)) : ?>
            <p class="lg:mb-0 mb-[100px] mt-0 lg:mt-[50px] text-[#475467]">
                <?php echo $text ?>
            </p>
        <?php endif ?>
    </div>
</section>