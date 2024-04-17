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
        <?php if (is_singular('product')) : ?>
            <h2>What constitutes Compounded Semaglutide?</h2>
            <p class="mt-[30px] text-gray">Compounded Semaglutide refers to a personalized medication formulated within a state Board of Pharmacy or FDA-licensed compounding facility as per a prescription provided by a licensed healthcare professional. These compounded drugs are mandated to use solely ingredients from FDA-licensed sources and undergo rigorous testing for potency, sterility, and purity. While legally permitted, compounded drugs do not undergo FDA pre-market approval as they are not produced in large quantities for general distribution; rather, they are tailored to individual orders from medical practitioners. Consequently, the dosage, method of administration, and effectiveness may vary from commercially available brand-name medications.</p>
        <?php endif ?>
        <div class="flex justify-between mt-[50px]">
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
                <div class="slider-faq ml-[-3px] pb-[45px] mb-[45px] last:mb-0  border-b-[1px] <?php echo $background == "Blue"  ? 'border-white ' : 'border-[#E4E4E4] ' ?> z-[99] relative  inactive " onclick="slideFaq(this, <?php echo $key ?>)">
                    <h5 class="text-dark-blue  cursor-pointer w-[70%] lg:w-auto"><?php echo $item['title'] ?> </h5>
                    <div class="item-content">
                        <p class="w-[70%] lg:w-[95%] text-gray text-[14px] lg:text-[16px] leading-[20px] lg:leading-normal pt-[24px]"> <?php echo $item["paragraph"] ?> </p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<script>
    let slideFaqItems = document.querySelectorAll(".slider-faq")
    slideFaqItems[0].classList.add("active")

    function slideFaq(slide, i) {
        slideFaqItems.forEach((item) => {
            let active = (item === slide) ? item.classList.add("active") : item.classList.remove("active")
        });
    }
</script>