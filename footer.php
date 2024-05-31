<footer>
    <section>
        <div class="block_content px-[30px] lg:px-[112px] pt-[100px] pb-[24px]">
            <div class="flex flex-wrap lg:flex-nowrap">
                <div class="w-full lg:w-[30%] xl:w-[40%] flex justify-center lg:justify-start">
                    <figure class="w-[190px]">
                        <img class="w-full" src="<?php esc_url(the_field('logo', 'option')) ?>" alt="">
                    </figure>
                </div>
                <div class="w-full lg:w-[70%] xl:w-[60%] flex flex-wrap lg:flex-nowrap ">
                    <div class="w-full lg:w-1/3 mt-[50px] lg:mt-0 flex flex-col gap-y-[16px]">
                        <span class="text-[16px] text-center lg:text-start  text-[#667085] font-[600]">Have a Question?</span>
                        <a class="text-[16px] text-center lg:text-start cursor-pointer font-[600] text-[#475467]">Email us anytime</a>
                        <a target="_blank" href="mailto:hellow@bmimd.com" class="text-[16px] text-center lg:text-start cursor-pointer font-[600] text-[#475467]">orders@bmiMD.com</a>
                        <a class="text-[16px] text-center lg:text-start cursor-pointer font-[600] text-[#475467]">More questions?</a>
                        <a class="text-[16px] text-center lg:text-start cursor-pointer font-[600] text-[#475467]">Visit our FAQ Page</a>
                    </div>
                    <div class="w-full lg:w-1/3 mt-[50px] lg:mt-0 flex flex-col gap-y-[16px]">
                        <span class="text-[16px] text-center lg:text-start  text-[#667085] font-[600]">Hours & Support</span>
                        <div class="pl-[30px] border-l-[3px] border-[#21316A] relative w-fit m-auto lg:m-[unset]">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/case.svg" class="absolute left-[10px] top-[8px]">
                            <span class="block text-[16px] text-center lg:text-start  font-[400] text-[#475467]">Monday-Thursday</span>
                            <span class="block text-[16px] text-center lg:text-start  font-[400] text-[#475467]">10am-5pm</span>
                            <span class="block mt-[15px] text-[16px] text-center lg:text-start  font-[400] text-[#475467]">Friday 10am-1pm</span>
                        </div>
                        <a class="text-[16px] text-center lg:text-start cursor-pointer font-[600] text-[#475467]">How it works?</a>
                        <a class="text-[16px] text-center lg:text-start cursor-pointer font-[600] text-[#475467]">FAQ</a>
                        <a href="/shop/" class="text-[16px] text-center lg:text-start cursor-pointer font-[600] text-[#475467]">Get Started</a>
                    </div>
                    <div class="w-full lg:w-1/3 mt-[50px] lg:mt-0 flex flex-col gap-y-[16px]">
                        <span class="text-[16px] text-center lg:text-start  text-[#667085] font-[600]">Safety Disclaimer</span>
                        <a class="text-[16px] text-center lg:text-start cursor-pointer text-[#475467] font-[600]">Terms of use</a>
                        <a class="text-[16px] text-center lg:text-start cursor-pointer text-[#475467] font-[600]">Disclaimers</a>
                        <a class="text-[16px] text-center lg:text-start cursor-pointer text-[#475467] font-[600]">Privacy</a>
                        <a class="text-[16px] text-center lg:text-start cursor-pointer text-[#475467] font-[600]">Return & Refund Policy</a>
                    </div>
                </div>
            </div>
            <div>
                <span class="h-[1px] w-full bg-[#EAECF0] block mt-[88px]"></span>
                <span class="mt-[32px] text-[16px] text-[#667085] flex justify-center">© 2024 bmiMD | All Rights Reserved</span>
            </div>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>
</body>

</html>