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

$subtitle      = get_field('subtitle');
$image         = get_field('image');
?>

<section class="">
    <div class="block_content px-[30px] lg:px-[112px] py-[100px] ">
        <div class="flex flex-col items-center justify-center">
            <h2 class="lg:w-[35%] text-center">Science Backed. Medically Approved.</h2>
            <p class="text-center mt-[30px] text-gray">
                <?php echo empty($subtitle) ?  "All of bmiMD's programs are designed using the most up to date clinical research for optimal effectiveness in achieving your weight loss goals." : $subtitle ?>
            </p>
        </div>
        <div class="bg-blue rounded-[21px] p-[30px] lg:p-[48px] mt-[100px] relative">
            <div class="flex flex-wrap lg:flex-nowrap gap-[80px]">
                <figure class="lg:w-[50%]">
                    <img class="rounded-[21px] h-[332px] w-full object-cover" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/953c1193f0f075d77de1f98a8ff82435 1.png" alt="">
                </figure>
                <div class="lg:w-[50%]  flex flex-col gap-y-[20px] justify-center">
                    <h2>What bmiMD Prescribes</h2>
                    <p class="text-[#82879A]">Our goal is to provide access to the most effective medication to the people who need it the most. Based on your medical history that may include:  </p>
                </div>
            </div>
            <img class="absolute right-[-120px] top-[100px] rotate-[-184deg] scale-x-[-1] scale-y-[-1] hidden lg:block" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector 9.png">
        </div>
        <div class="bg-blue rounded-[21px] p-[30px] lg:p-[48px] mt-[20px] relative">
            <div class="flex flex-wrap md:flex-nowrap gap-[80px] flex-col-reverse lg:flex-row">
                <div class="lg:w-[50%]  flex flex-col gap-y-[20px] justify-center">
                    <h2>Our commitment to Compliance</h2>
                    <p class="text-[#82879A]">Compounded semaglutide refers to a personalized medication formulated within a state Board of Pharmacy or FDA-licensed compounding facility as per a prescription provided by a licensed healthcare professional. These compounded drugs are mandated to use solely ingredients from FDA-licensed sources and undergo rigorous testing for potency, sterility, and purity.</p>
                    <p class="text-[#82879A] font-[600]">bmiMD collaborates exclusively with licensed sterile compounding pharmacies throughout the United States.</p>
                </div>
                <figure class="lg:w-[50%]">
                    <img class="rounded-[21px]" style="height:100%;" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/image 14.png" alt="">
                </figure>
            </div>
            <div class="flex flex-wrap lg:flex-nowrap  gap-[80px] mt-[80px]">
                <div class="accordion-container lg:w-[50%] bg-white rounded-[10px] p-[30px] w-full overflow-hidden z-[99] ">
                    <div id="quality-accordion" class="active">
                        <div class="title flex justify-between items-center cursor-pointer">
                            <h5 class="title-click text-[22px]">Potency</h5>
                            <span class="bg-dark-blue rounded-[30px] px-[10px] xl:px-[25px] py-[8px] xl:py-[10px] text-[10px] xl:text-[14px] text-white flex">
                                <img class="mr-[10px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check-green.svg">
                                Approved
                            </span>
                        </div>
                        <div class="content">
                            <p class="text-[16px] leading-normal text-gray">This test verifies that the compounded semaglutide contains the correct concentration of medication.</p>
                        </div>
                    </div>
                    <div id="quality-accordion" class="mt-[30px]">
                        <div class="title flex justify-between items-center cursor-pointer">
                            <h5 class="title-click text-[22px]">Endotoxicity</h5>
                            <span class="bg-dark-blue rounded-[30px] px-[10px] xl:px-[25px] py-[8px] xl:py-[10px] text-[10px] xl:text-[14px] text-white flex">
                                <img class="mr-[10px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check-green.svg">
                                Approved
                            </span>
                        </div>
                        <div class="content">
                            <p class="text-[16px] leading-normal text-gray">Endotoxicity is tested in combination with sterility to help ensure that the medication is free of toxins that can cause you harm.</p>
                        </div>
                    </div>
                    <div id="quality-accordion" class="mt-[30px]">
                        <div class="title flex justify-between items-center cursor-pointer">
                            <h5 class="title-click text-[22px]">Sterility</h5>
                            <span class="bg-dark-blue rounded-[30px] px-[10px] xl:px-[25px] py-[8px] xl:py-[10px] text-[10px] xl:text-[14px] text-white flex">
                                <img class="mr-[10px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check-green.svg">
                                Approved
                            </span>
                        </div>
                        <div class="content">
                            <p class="text-[16px] leading-normal text-gray">Sterility tests check that the medication is free of foreign organisms or unwanted pathogens.</p>
                        </div>
                    </div>
                    <div id="quality-accordion" class="mt-[30px]">
                        <div class="title flex justify-between items-center cursor-pointer">
                            <h5 class="title-click text-[22px]">pH</h5>
                            <span class="bg-dark-blue rounded-[30px] px-[10px] xl:px-[25px] py-[8px] xl:py-[10px] text-[10px] xl:text-[14px] text-white flex">
                                <img class="mr-[10px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check-green.svg">
                                Approved
                            </span>
                        </div>
                        <div class="content">
                            <p class="text-[16px] leading-normal text-gray">The pH test checks for the ideal acid/base ratio to minimize irritation of the injection.</p>
                        </div>
                    </div>
                </div>
                <div class="lg:w-[50%]  flex flex-col gap-y-[20px] ">
                    <h2>bmiMD’s commitment to quality medication</h2>
                    <p class="text-[#82879A]">We work with a registered and certified third-party lab to run quality control checks for every lot of compounded semaglutide prescribed for bmiMD patients. We test four key characteristics that are associated with quality and safety.</p>
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
                    <a href="/shop/" class="btn-blue" style="padding-left:50px; padding-right:50px;">Get Started</a>
                </div>
            </div>
            <div class="w-[35%] hidden lg:flex items-center">
                <div class="h-[1px] w-[100%] bg-[#E4E4E4]"></div>
            </div>
        </div>
        <div class="mt-[100px]">
            <h2 class="text-center">Compounded Semaglutide Dosing Plan</h2>
            <figure class="flex justify-center">
                <?php if (empty($image)) : ?>
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Group 197.svg" alt="">
                <?php else : ?>
                    <img src="<?php echo $image ?>" alt="">
                <?php endif ?>
            </figure>
        </div>
    </div>
</section>
<script>
    const accordion = document.querySelectorAll("#quality-accordion")
    accordion.forEach(item => {
        item.querySelector(".title").addEventListener("click", () => {
            //close the other tabs
            accordion.forEach(element => {
                if (item != element)
                    element.classList.contains("active") ? element.classList.remove("active") : ''
            });

            item.classList.toggle("active")

        })
    });
</script>