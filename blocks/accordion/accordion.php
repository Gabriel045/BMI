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
$background     =  get_field("background");
$title          = get_field("title");
$text           = get_field("text");
$cta            = get_field("cta");
$faqs           = get_field('faqs');

?>

<section id="faq" style="overflow: visible;" class="<?php echo $background == "Blue"  ? 'bg-blue' : 'bg-white' ?>">
    <div class="block_content <?php echo $background == "Blue"  ? 'py-[100px]' : 'pb-[100px]' ?>  px-[30px] lg:px-[160px]">
        <div class="flex justify-between <?php echo $background == "Blue"  ? 'lg:mt-[50px]' : '' ?>">
            <h2 class="text-dark-blue"> <?php echo $title ?></h2>
            <?php if (!empty($cta["url"])) : ?>
                <div class="w-fit hidden lg:block">
                    <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-blue"><?php echo esc_attr($cta["title"]) ?></a>
                </div>
            <?php endif ?>
        </div>
        <?php if (!empty($text)) : ?>
            <p class="mt-[30px] text-gray lg:w-[65%]"><?php echo $text ?></p>
        <?php endif ?>
        <?php if (!empty($cta["url"])) : ?>
            <div class="w-fit mt-[30px] lg:hidden block">
                <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-blue"><?php echo esc_attr($cta["title"]) ?></a>
            </div>
        <?php endif ?>
        <div class="mt-[50px] <?php echo $background == "Blue"  ? 'lg:mt-[112px]' : 'lg:mt-[50px]' ?> ">
            <?php foreach ($faqs as $key => $item) : ?>
                <div class="slider-faq ml-[-3px] pb-[45px] mb-[45px] last:mb-0  border-b-[1px] <?php echo $background == "Blue"  ? 'border-white ' : 'border-[#E4E4E4] ' ?> z-[99] relative  inactive ">
                    <h5 class="title text-dark-blue  cursor-pointer w-[70%] lg:w-auto"><?php echo $item['title'] ?> </h5>
                    <div class="item-content">
                        <div class="w-[80%] lg:w-[95%] text-gray pt-[24px]"> <?php echo $item["paragraph"] ?> </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<script>
    const faqs = document.querySelectorAll(".slider-faq")
    faqs.forEach(item => {
        item.querySelector(".title").addEventListener("click", () => {
            //close the other tabs
            faqs.forEach(element => {
                if (item != element)
                    element.classList.contains("active") ? element.classList.remove("active") : ''
            });

            item.classList.toggle("active")

        })
    });
</script>