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
                        <div class="w-full md:w-[40%] rounded-[20px] flex justify-center items-center bg-blue z-[99] py-[50px] lg:py-0">
                            <figure class="flex justify-center">
                                <img class="lg:w-[215px] h-[440px] object-cover" src="<?php echo  $card["image"] ?>" alt="">
                            </figure>
                        </div>
                        <div class="w-full md:w-[60%] rounded-[20px] px-[25px] lg:px-[50px] py-[50px] bg-blue z-[99]">
                            <div class="flex xl:flex-nowrap flex-wrap flex-col-reverse lg:flex-row ">
                                <div class="w-full xl:w-[70%] gap-[25px]">
                                    <h2 class="lg:text-[30px]"><?php echo $card["title"] ?></h2>
                                </div>
                                <div class="w-full xl:w-[30%]  xl:mt-0 flex flex-col gap-y-[17px] lg:items-end mb-[30px] lg:mb-0">
                                    <?php foreach ($card["checks"]  as $check) :
                                        if ($check["text"] != "New") : ?>
                                            <span class="w-fit flex text-[12px] leading-[20px] text-[#2B9606] px-[10px] py-[6px] bg-white rounded-[34px]">
                                                <?php echo $check["text"] ?>
                                                <img class="ml-[10px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check.svg">
                                            </span>
                                        <?php else : ?>
                                            <span class="w-fit flex text-[12px] leading-[20px] text-white px-[20px] py-[6px] bg-[#2B9606] rounded-[34px]">
                                                <?php echo $check["text"] ?>
                                            </span>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="mt-[30px] text-[16px] text-[#475467] leading-normal"> <?php echo $card["text"] ?></div>
                            <div class="text-[24px] font-[600] text-dark-blue mt-[30px]">
                                <?php echo $card["price"] ?> <span class="text-[12px] font-[400] text-gray"> / month</span>
                            </div>
                            <div>
                                <span class="text-gray text-[14px]">Includes:</span>
                                <ul class="pl-[20px]">
                                    <?php foreach ($card["warnings"] as $key => $warning) : ?>
                                        <li class="list-item list-disc text-[14px] text-gray  mt-[5px]"><?php echo $warning["text"] ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <div class="w-fit mt-[30px]">
                                <a href="<?php echo esc_url($card["cta"]["url"]) ?>" target="<?php echo esc_attr($card["cta"]["target"]) ?>" class="btn-blue"><?php echo esc_attr($card["cta"]["title"]) ?></a>
                            </div>
                            <div class="mt-[10px] flex flex-col items-center w-[60%] lg:w-[30%]">
                                <span class="text-[#21316a79] text-[12px] block">No Hidden Fees</span>
                                <span class="text-[#21316a79] text-[12px] block">No Insurance Needed</span>
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
            <div class="my-[100px] lg:mb-[100px] mb-[50px] flex flex-col items-center">
                <h2 class="text-center"><?php echo $title ?></h2>
                <p class="text-center mt-[20px] lg:w-[70%]"><?php echo $text ?></p>
            </div>
            <div class="flex gap-[100px] lg:gap-[10px] flex-row flex-wrap ">
                <?php foreach ($cards as $key => $card) : ?>
                    <div class="w-full lg:w-[49%]">
                        <div class="w-full rounded-[20px] py-[70px] bg-blue z-[99]">
                            <figure class="flex justify-center">
                                <img class="w-[215px] h-[445px] object-cover" src="<?php echo  $card["image"] ?>" alt="">
                            </figure>
                        </div>
                        <div class="mt-[50px] flex flex-col">
                            <h2 class="text-[24px] lg:text-[36px] leading-[30px] lg:leading-[44px]"><?php echo $card["title"] ?></h2>
                            <div class="w-full my-[30px] flex flex-row flex-wrap gap-[20px]">
                                <?php foreach ($card["checks"]  as $check) : ?>
                                    <span class="w-fit flex text-[14px] leading-[20px] text-gray px-[20px] py-[8px] bg-blue rounded-[34px]">
                                        <?php echo $check["text"] ?>
                                        <img class="ml-[10px] mt-[2px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check.svg" style="filter: brightness(0) saturate(100%) invert(18%) sepia(10%) saturate(6847%) hue-rotate(202deg) brightness(94%) contrast(95%);">
                                    </span>
                                <?php endforeach ?>
                            </div>
                            <p class="text-[16px] text-[#475467] leading-normal"> <?php echo $card["text"] ?></p>
                            <div class="text-[24px] font-[600] text-dark-blue mt-[30px]">
                                <?php echo $card["price"] ?> <span class="text-[12px] font-[400] text-gray"> / month</span>
                            </div>
                            <div>
                                <?php foreach ($card["warnings"] as $key => $warning) : ?>
                                    <span class="text-[10px] text-[#21316a80]  block mt-[15px]"><?php echo $warning["text"] ?></span>
                                <?php endforeach ?>
                            </div>
                            <div class="w-fit mt-[30px]">
                                <a href="<?php echo esc_url($card["cta"]["url"]) ?>" target="<?php echo esc_attr($card["cta"]["target"]) ?>" class="btn-blue"><?php echo esc_attr($card["cta"]["title"]) ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <img class="absolute right-[-90px] lg:top-[750px] rotate-[-27deg] scale-x-[-1] hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
            <img class="absolute right-[15px] lg:right-auto bottom-[-80px] lg:bottom-auto lg:left-[-90px] lg:top-[250px] rotate-[-95deg] lg:rotate-[-27deg] scale-x-[-1]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        <?php endif ?>
    </div>
</section>