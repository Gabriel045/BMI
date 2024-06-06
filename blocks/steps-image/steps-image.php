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
    <div class="block_content px-[30px] lg:px-[112px]  pb-[100px] lg:pb-0 relative">
        <!-- Desktop -->
        <div class="hidden lg:flex flex-row gap-[2%] gap-y-[100px]">
            <div class="w-[48%] flex flex-wrap flex-col justify-between ">
                <div class="h-full relative">
                    <div class="lg:top-[80px] lg:sticky  w-full h-fit bg-blue rounded-[21px] relative z-[99] py-[50px] px-[48px] flex flex-col">
                        <h2 class="">Let’s get to know you</h2>
                        <div class="my-[30px] text-gray text-[16px] leading-normal">
                            Starting at $169/month* <br>


                            <b>Every journey is unique, and at bmiMD, we believe in offering a personalized approach tailored to your individual weight loss goals.</b>
                            <br>

                            Join the tens of thousands of members who have chosen bmiMD for the most affordable and comprehensive clinical weight loss program available.
                            Our program includes:
                            <br>
                            <ul class="text-gray pl-[20px] list-disc py-[20px]">
                                <li>Evidence-based prescription medications
                                <li>Effectively curbs hunger to keep you feeling fuller </li>
                                <li>Clinically proven to help lose weight </li>
                                <li>All bmiMD programs include the cost of medication—no gimmicks </li>
                                <li>Rooted in science and supported by results </li>
                            </ul>

                            *Offer valid for new customers at starting doses. Individual results may vary.

                            ( add button - get started that goes to the treatment options below)

                        </div>
                    </div>
                    <div class="hidden w-full h-fit bg-blue rounded-[21px] relative z-[99] py-[50px] px-[48px]  flex-col">
                        <p class="text-[18px] text-dark-blue">Lorem Ipsum</p>
                        <h2 class="my-[30px]"> Lorem ipsum dolor sit amet consectetur.</h2>
                        <ul class="list-disc text-[14px] text-gray pl-[20px]">
                            <li>Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet.</li>
                            <li>Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet.</li>
                            <li>Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet.</li>
                        </ul>
                        <div class="w-full my-[30px]">
                            <a href="/shop/" class="btn-blue">Get Started</a>
                        </div>
                        <span class="text-[13px] text-gray text-center">Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet.</span>
                        <span class="text-[13px] text-gray text-center mt-[30px]">Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet. Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet. Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet. </span>
                    </div>
                </div>
                <div class="absolute top-[300px] left-[-160px]">
                    <svg class="svg-item-bg" width="919" height="1194" viewBox="0 0 919 1194" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M109.885 337.175C298.07 279.321 196.349 32.0093 323.501 6.57882" stroke="#E4EAFF" stroke-width="12" />
                        <path d="M5.80078 461.012C406.177 1059.66 665.819 513.485 913 928.892" stroke="#E4EAFF" stroke-width="12" />
                    </svg>

                    <svg class="svg-item-animated" width="919" height="1194" viewBox="0 0 919 1194" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="reverse" d="M109.885 337.175C298.07 279.321 196.349 32.0093 323.501 6.57882" stroke="#E4EAFF" stroke-width="12" />
                        <path d="M5.80078 461.012C406.177 1059.66 665.819 513.485 913 928.892" stroke="#E4EAFF" stroke-width="12" />
                    </svg>
                </div>

            </div>
            <div class="w-[50%] pl-[30px] flex flex-col dashed gap-y-[100px] relative">
                <?php foreach ($cards as $key => $card) :
                    //var_dump($card["image"]); 
                ?>
                    <div class="dot relative">
                        <span class="flex w-fit text-[16px] lg:text-[20px] text-gray bg-blue py-[8px] px-[30px] rounded-[30px] mt-[60px] lg:mt-0">Step <?php echo $key + 1 ?></span>
                        <h2 class="my-[30px]"><?php echo $card["title"] ?></h2>
                        <p class="text-gray text-[16px] leading-normal relative z-[99]"> <?php echo  $card["text"] ?></p>
                        <?php if ($card["image"]["type"] == "image") : ?>
                            <figure class="mt-[20px]">
                                <img class="rounded-[21px] h-[400px] w-full object-cover relative z-[99]" src="<?php echo $card["image"]['url'] ?>">
                            </figure>
                        <?php else : ?>
                            <video class="mt-[20px] rounded-[21px]" autoplay loop>
                                <source src="<?php echo  $card["image"]["url"] ?>" type="video/mp4">
                            </video>
                        <?php endif ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <!-- Mobile -->
        <div class="lg:hidden flex flex-col gap-y-[100px]">
            <div class="w-full h-fit bg-blue rounded-[21px] relative z-[99] py-[50px] px-[30px] lg:px-[48px] flex flex-col">
                <h2 class="">Let’s get to know you</h2>
                <p class="my-[30px] text-gray text-[16px] leading-normal relative z-[99] ">First, share your health history and weight loss goals with your bmiMD affiliated provider through our confidential online questionnaire.</p>
                <div class="hidden lg:block">
                    <span class="flex text-gray text-[16px]">
                        <img class="mr-[15px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector (1).svg">
                        Clinically proven to help lose weight
                    </span>
                    <span class="flex text-gray text-[16px] my-[25px]">
                        <img class="mr-[15px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Vector (2).svg">
                        Optimize results with metabolic testing
                    </span>
                    <span class="flex text-gray text-[16px]">
                        <img class="mr-[15px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/Group 212.svg">
                        Curbs hunger to keep you feeling fuller
                    </span>
                </div>
            </div>
            <div class="w-full  flex flex-col  relative mt-[-60px]">
                <?php foreach ($cards as $key => $card) : ?>
                    <div class="dot relative">
                        <span class="flex w-fit text-[14px] text-gray bg-blue py-[8px] px-[30px] rounded-[30px]  mt-[60px] lg:mt-0">Step <?php echo $key + 1 ?></span>
                        <h2 class="my-[30px]"><?php echo $card["title"] ?></h2>
                        <p class="text-gray text-[14px] leading-normal"> <?php echo  $card["text"] ?></p>
                        <figure class="mt-[20px]">
                            <img class="rounded-[21px] h-[400px] w-full object-cover" src="<?php echo $card["image"] ?>">
                        </figure>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="w-full h-fit bg-blue rounded-[21px] relative z-[99] py-[50px] px-[30px] lg:px-[48px] flex flex-col">
                <p class="text-[14px] text-dark-blue">Lorem Ipsum</p>
                <h2 class="my-[30px]"> Lorem ipsum dolor sit amet consectetur.</h2>
                <ul class="list-disc text-[14px] text-gray pl-[20px]">
                    <li>Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet.</li>
                    <li>Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet.</li>
                    <li>Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet.</li>
                </ul>
                <div class="w-full my-[30px]">
                    <a href="/shop/" class="btn-blue">Get Started</a>
                </div>
                <span class="text-[10px] text-gray text-center">Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet.</span>
                <span class="text-[14px] text-gray text-center mt-[30px]">Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet. Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet. Lorem ipsum dolor sit amet consectetur. Odio rhoncus est tortor at imperdiet. </span>
            </div>
        </div>
    </div>
</section>