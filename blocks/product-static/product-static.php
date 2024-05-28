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

$title        = get_field('title');
$text         = get_field('text');
$subtitle     = get_field('subtitle');
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[112px] py-[100px] ">
        <div class="flex flex-col items-center justify-center">
            <h2 class="lg:w-[35%] text-center">Science Backed. Medically Approved.</h2>
            <p class="text-center mt-[30px] text-gray">All of bmiMD's programs are designed using the most up to date clinical research for optimal effectiveness in achieving your weight loss goals.</p>
        </div>
        <div class="bg-blue rounded-[21px] p-[30px] lg:p-[48px] mt-[100px] relative">
            <div class="flex flex-wrap lg:flex-nowrap gap-[80px]">
                <figure class="lg:w-[50%]">
                    <img class="rounded-[21px] h-[332px] w-full object-cover" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/953c1193f0f075d77de1f98a8ff82435 1.png" alt="">
                </figure>
                <div class="lg:w-[50%]  flex flex-col gap-y-[20px] justify-center">
                    <h2>A weight loss program that actually works</h2>
                    <p>Starting from your online consult to the delivery of your compounded GLP-1 medication, bmiMD provides simple access to transparent, safe and affordable weight loss solutions. </p>
                </div>
            </div>
            <img class="absolute right-[-120px] top-[100px] rotate-[-184deg] scale-x-[-1] scale-y-[-1] hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        </div>
        <div class="bg-blue rounded-[21px] p-[30px] lg:p-[48px] mt-[20px] relative">
            <div class="flex flex-wrap md:flex-nowrap gap-[80px] flex-col-reverse lg:flex-row">
                <div class="lg:w-[50%]  flex flex-col gap-y-[20px] justify-center">
                    <h2>What is compounded semaglutide?</h2>
                    <p class="text-gray">Compounded tirzepatide refers to a personalized medication formulated within a state Board of Pharmacy or FDA-licensed compounding facility as per a prescription provided by a licensed healthcare professional. These compounded drugs are mandated to use solely ingredients from FDA-licensed sources and undergo rigorous testing for potency, sterility, and purity.</p>
                    <p class="text-[#82879A] font-[600]">bmiMD collaborates exclusively with licensed sterile compounding pharmacies throughout the United States.</p>
                </div>
                <figure class="lg:w-[50%]">
                    <img class="rounded-[21px]" style="height:100%;" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/image 14.png" alt="">
                </figure>
            </div>
            <div class="flex flex-wrap lg:flex-nowrap  gap-[80px] mt-[80px]">
                <figure class="lg:w-[50%]">
                    <img class="rounded-[21px]" style="height:100%;" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Frame 19.svg" alt="">
                </figure>
                <div class="lg:w-[50%]  flex flex-col gap-y-[20px] ">
                    <h2>bmiMD’s commitment to quality medication</h2>
                    <p class="text-gray">We work with a registered and certified third-party lab to run quality control checks for every lot of compounded semaglutide prescribed for bmiMD patients. We test four key characteristics that are associated with quality and safety.</p>
                </div>
            </div>
            <img class="absolute left-[-120px] bottom-[0px] rotate-[-184deg] hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        </div>
        <div class="flex flex-row mt-[100px]">
            <div class="w-[35%] hidden lg:flex items-center">
                <div class="h-[1px] w-[100%] bg-[#E4E4E4]"></div>
            </div>
            <div class="w-full lg:w-[30%] flex justify-center">
                <div class="w-fit">
                    <a href="" class="btn-blue" style="padding-left:50px; padding-right:50px;">Get Started</a>
                </div>
            </div>
            <div class="w-[35%] hidden lg:flex items-center">
                <div class="h-[1px] w-[100%] bg-[#E4E4E4]"></div>
            </div>
        </div>
        <div class="mt-[100px]">
            <h2 class="text-center">Compounded Semaglutide Dosing Plan</h2>
            <figure class="flex justify-center">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Group 197.svg" alt="">
            </figure>
        </div>
    </div>
</section>