<?php /* Template Name: Privacy-policy */ ?>

<?php get_header() ?>

<main class="privacy-policy">
    <section>
        <div class="block_content px-[30px] lg:px-[112px] pt-[50px] lg:pt-[100px]">
            <h1 class="lg:w-[85%]"><?php echo get_the_title() ?></h1>
            <p class="mt-[24px] text-gray lg:w-[85%]"><?php echo get_the_excerpt() ?> </p>
        </div>
    </section>
    <?php the_content() ?>
</main>

<?php get_footer() ?>