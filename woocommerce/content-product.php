<?php
global $product;
$title   	 	= $product->get_title();
$price   		= $product->get_regular_price();
$image   		= $product->get_image_id();
$description 	= $product->get_short_description();
$checks 	    = get_field("checks", $product->get_id());
$includes       = get_field("includes", $product->get_id());
?>
<li class="product-item">
	<div class="content flex md:flex-nowrap flex-wrap  gap-[28px] w-full flex-row">
		<div class="w-full md:w-[40%] rounded-[20px] bg-blue z-[99]">
			<figure class="flex justify-center items-center h-full">
				<img class="object-cover !h-[354px] lg:!h-[550px] w-auto" src="<?php echo wp_get_attachment_image_url($image, 'full')  ?>">
			</figure>
		</div>
		<div class="w-full md:w-[60%] rounded-[20px] px-[30px] lg:px-[50px] py-[60px] bg-blue z-[99]">
			<div class="flex xl:flex-nowrap flex-wrap flex-col-reverse xl:flex-row  gap-[20px]">
				<div class="w-full xl:w-[70%] gap-[25px]">
					<h2><?php echo $title ?></h2>
				</div>
				<div class="w-full xl:w-[30%] xl:mt-0 flex flex-col gap-y-[17px] lg:items-start mb-[30px] lg:mb-0">
					<?php foreach ($checks  as $check) :
						if ($check["text"] != "NEW") : ?>
							<span class="w-full lg:w-[60%] xl:w-full flex justify-center text-[14px] leading-[20px] text-[#2B9606] px-[10px] py-[6px] bg-white rounded-[34px]">
								<?php echo $check["text"] ?>
								<img class="ml-[10px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check.svg">
							</span>
						<?php else : ?>
							<span class="w-full lg:w-[60%] xl:w-full flex justify-center text-[14px] leading-[20px] text-white px-[20px] py-[6px] bg-[#2B9606] rounded-[34px]">
								<?php echo $check["text"] ?>
							</span>
						<?php endif ?>
					<?php endforeach ?>
				</div>
			</div>
			<div class="mt-[30px] text-[16px] text-[#475467] leading-normal"> <?php echo $description ?></div>
			<div class="flex gap-[20px]">
				<div class="text-[24px] font-[600] text-dark-blue mt-[30px] flex items-center line-through">
					$<?php echo $price ?> <span class="text-[12px] font-[400] text-gray ml-[5px]"> / month</span>
	
				</div>
				<div class="text-[24px] font-[600] text-dark-blue mt-[30px] flex items-center ">
					$169 <span class="text-[12px] font-[400] text-gray ml-[5px]"> for the first month ( starter dose)</span>
				</div>
			</div>
			<div class="mt-[20px]">
				<span class="text-gray text-[14px]">Includes:</span>
				<ul class="!pl-[20px]">
					<?php foreach ($includes as $key => $warning) : ?>
						<li class="!list-item !list-disc text-[14px] text-gray  mt-[5px]"><?php echo $warning["text"] ?></li>
					<?php endforeach ?>
				</ul>
			</div>
			<div class="w-fit mt-[30px]">
				<a href="<?php echo  get_permalink($product->get_id()) ?>" class="btn-blue">Get Started</a>
			</div>
			<div class="mt-[10px] flex flex-col items-start">
				<span class="text-[#21316a79] text-[12px] block">After purchasing your program, a bmiMD licensed medical provider will assess your eligibility. If you do not qualify, you will receive a refund. Our money-back guarantee ensures your satisfaction if eligibility criteria are not met.</span>
				<span class="text-[#21316a79] text-[10px] block">Terms and Conditions may apply</span>
			</div>
		</div>
	</div>
</li>