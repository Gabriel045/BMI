<?php get_header();

$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
);

$cards = new WP_Query($args);
$cards = $cards->posts;
?>

<main>
    <section>
        <div class="block_content px-[30px] lg:px-[112px] py-[50px] lg:py-[100px]">
            <h1>Blog archive</h1>
            <p class="mt-[24px] text-gray"><?php echo get_the_excerpt() ?></p>
        </div>
    </section>
    <section>
        <div class="block_content px-[30px] lg:px-[112px] pb-[50px] lg:pb-[100px]">
            <div class="flex flex-wrap gap-[3%] gap-y-[75px]">
                <?php foreach ($cards as $key => $card) :
                    $newDate = date("d F, Y", strtotime($card->post_date)); ?>
                    <article class="w-full md:w-[48.5%] lg:w-[31%] flex flex-col gap-y-[15px]">
                        <figure>
                            <a href="<?php echo get_the_permalink($card->ID)  ?>">
                                <img class="h-[250px] w-full object-cover rounded-[10px]" src="<?php echo get_the_post_thumbnail_url($card->ID) ?>">
                            </a>
                        </figure>
                        <a href="<?php echo get_the_permalink($card->ID)  ?>">

                            <h5 class="text-[18px] leading-[24px] "><?php echo $card->post_title ?></h5>
                        </a>
                        <div>
                            <span class="text-gray text-[16px]"><?php echo $newDate ?></span>
                            <span class="text-gray mx-[10px] text-[16px]">--</span>
                            <span class="text-gray text-[16px]"> 1 min read</span>
                        </div>
                        <p class="text-gray text-[16px] leading-[24px]"><?php echo $card->post_excerpt ?></p>
                    </article>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</main>


<?php get_footer() ?>