<?php get_header();


$categories = get_categories(array(
    'orderby' => 'name',
    'order'   => 'ASC'
));
function get_data($category)
{

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $category
            ),
        )
    );

    $cards = new WP_Query($args);
    $cards = $cards->posts;

    return $cards;
}
?>


<main>
    <section>
        <div class="block_content px-[30px] lg:px-[112px] py-[50px] lg:py-[100px]">
            <h1>Blog category archive</h1>
            <p class="mt-[24px] text-gray">Lorem ipsum dolor sit amet consectetur. At enim et accumsan nulla id nunc donec. Accumsan diam duis viverra lorem ornare vestibulum eu morbi pharetra. </p>
        </div>
    </section>
    <section>
        <div class="block_content px-[30px] lg:px-[112px]">
            <?php foreach ($categories as $key => $category) :
                $cards = get_data($category->slug); ?>
                <div id="<?php echo $category->slug ?>" class="flex flex-col gap-[3%] py-[50px] last:border-none border-b-[1px] border-[#45464f30]">
                    <h2 class="mb-[40px]"><?php echo $category->name  ?> </h2>
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
                    <div class="flex justify-center mt-[50px]">
                        <a href="/category/<?php echo $category->slug ?>" class="btn-blue w-[406px] cursor-pointer">View all</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
</main>
<?php get_footer() ?>