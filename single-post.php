<?php get_header();

$categories = get_the_terms($post->ID, 'category');
$date = $post->post_date;
$newDate = date("d F, Y", strtotime($date));
?>

<main>
    <section>
        <div class="block_content px-[30px] lg:px-[112px] pt-[50px] lg:pt-[100px]">
            <div class="flex gap-[20px]">
                <?php foreach ($categories as $key => $category) : ?>
                    <a href="/category/<?php echo $category->slug ?>" class="cursor-pointer px-[30px] py-[6px] bg-blue text-gray text-[16px] lg:text-[20px] rounded-[34px]  hover:translate-y-[1px] hover:shadow-sm">
                        <?php echo $category->name ?>
                    </a>
                <?php endforeach ?>
            </div>
            <h1 class="lg:w-[90%] mt-[24px]"> <?php the_title() ?> </h1>
            <div class="my-[24px]">
                <span class="text-gray text-[18px] lg:text-[20px]"><?php echo $newDate ?></span>
                <span class="text-gray text-[18px] lg:text-[20px]">--</span>
                <span class="text-gray text-[18px] lg:text-[20px]">1 min read</span>
                <span class="font-[500]  text-[18px] lg:text-[20px] text-dark-blue ml-[20px]">24k Views</span>
            </div>
            <p class="text-gray"><?php echo get_the_excerpt() ?></p>
        </div>
    </section>
    <?php the_content() ?>
</main>


<?php get_footer() ?>