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

$cards      = get_field('cards');
$position   = get_field('position');
$title      = get_field('title');
$text       = get_field('text');
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[112px] pb-[100px] lg:py-[100px] relative">
        <?php if ($position == 'Vertical') : ?>
            <!-- vertical -->
            <div class="flex gap-[100px] flex-col flex-wrap ">
                <?php foreach ($cards as $key => $card) : ?>
                    <div class="flex md:flex-nowrap flex-wrap  gap-[28px] w-full <?php echo ($key % 2 == 0) ? "flex-row" :  "flex-row-reverse"  ?>">
                        <div class="w-full md:w-[40%] rounded-[20px] py-[70px] bg-blue z-[99]">
                            <figure class="flex justify-center">
                                <img class="w-[215px] h-[445px]" src="<?php echo  $card["image"] ?>" alt="">
                            </figure>
                        </div>
                        <div class="w-full md:w-[60%] rounded-[20px] px-[50px] py-[60px] bg-blue z-[99]">
                            <div class="flex xl:flex-nowrap flex-wrap">
                                <div class="w-full xl:w-[60%] gap-[25px]">
                                    <h2><?php echo $card["title"] ?></h2>
                                </div>
                                <div class="w-full xl:w-[40%] mt-[30px] xl:mt-0 flex flex-col gap-y-[17px]">
                                    <?php foreach ($card["checks"]  as $check) : ?>
                                        <span class="w-fit flex text-[14px] lg:text-[20px] leading-[20px] text-[#475467] px-[30px] py-[10px] bg-white rounded-[34px]">
                                            <?php echo $check["text"] ?>
                                            <img class="ml-[10px] mt-[2px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check.svg">
                                        </span>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <p class="mt-[30px] text-[16px] text-[#475467] leading-normal"> <?php echo $card["text"] ?></p>
                            <div class="w-fit mt-[30px]">
                                <a href="<?php echo esc_url($card["cta"]["url"]) ?>" target="<?php echo esc_attr($card["cta"]["target"]) ?>" class="btn-blue"><?php echo esc_attr($card["cta"]["title"]) ?></a>
                            </div>
                        </div>
                    </div>
                    <?php if ($key % 2 == 0) : ?>
                        <img class="absolute right-0 top-[250px]  scale-x-[-1]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
                    <?php else : ?>
                        <img class="absolute left-0 bottom-[20px] rotate-[200deg]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        <?php else : ?>
            <div class="h-[1px] w-full bg-[#E4E4E4]"></div>
            <div class="my-[100px] flex flex-col items-center">
                <h2 class="text-center"><?php echo $title ?></h2>
                <p class="text-center mt-[20px] lg:w-[70%]"><?php echo $text ?></p>
            </div>
            <div class="flex gap-[10px] flex-row flex-wrap ">
                <?php foreach ($cards as $key => $card) : ?>
                    <div class="w-[49%]">
                        <div class="w-full rounded-[20px] py-[70px] bg-blue z-[99]">
                            <figure class="flex justify-center">
                                <img class="w-[215px] h-[445px]" src="<?php echo  $card["image"] ?>" alt="">
                            </figure>
                        </div>
                        <div class="mt-[50px]">
                            <h2><?php echo $card["title"] ?></h2>
                            <div class="w-full my-[30px] flex flex-row gap-[20px]">
                                <?php foreach ($card["checks"]  as $check) : ?>
                                    <span class="w-fit flex text-[14px] leading-[20px] text-gray px-[20px] py-[8px] bg-blue rounded-[34px]">
                                        <?php echo $check["text"] ?>
                                        <img class="ml-[10px] mt-[2px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check.svg">
                                    </span>
                                <?php endforeach ?>
                            </div>
                            <p class="text-[16px] text-[#475467] leading-normal"> <?php echo $card["text"] ?></p>
                            <div class="w-fit mt-[30px]">
                                <a href="<?php echo esc_url($card["cta"]["url"]) ?>" target="<?php echo esc_attr($card["cta"]["target"]) ?>" class="btn-blue"><?php echo esc_attr($card["cta"]["title"]) ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <img class="absolute right-[-90px] lg:top-[750px] rotate-[-27deg] scale-x-[-1]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
            <img class="absolute left-[-90px] lg:top-[250px] rotate-[-27deg] scale-x-[-1]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <?php endif ?>
    </div>
</section>