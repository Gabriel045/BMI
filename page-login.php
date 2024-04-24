<?php
get_header();
?>

<main>
    <section>
        <div class="block_content lg:px-[112px] py-[100px]">
            <div class="flex">
                <div class="w-[50%] border-r-[1px] border-[#E4EAFF]">
                    <div class="w-[70%]">
                        <?php echo do_shortcode("[wc_login_form_bbloomer]"); ?>
                    </div>
                </div>
                <div class="w-[50%] flex justify-end">
                    <div class="w-[70%]">
                        <?php require_once get_theme_file_path('register-form.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



<?php
get_footer();

?>