<?php
global $product;
$title   	 	= $product->get_title();
$price   		= $product->get_regular_price();
$image   		= $product->get_image_id();
$description 	= $product->get_short_description();
$props 			= get_field("props",$product->get_id());
?>
<li class="">
	<div class="content flex md:flex-nowrap flex-wrap  gap-[28px] w-full flex-row">
		<div class="w-full md:w-[40%] rounded-[20px] px-[70px] lg:px-[50px] xl:px-[130px] py-[50px] lg:py-[70px] bg-blue z-[99]">
			<figure class="flex justify-center">
				<img class="object-cover w-full" style="height:100%" src="<?php echo wp_get_attachment_image_url($image, 'full')  ?>">
			</figure>
		</div>
		<div class="w-full md:w-[60%] rounded-[20px] px-[30px] lg:px-[50px] py-[60px] bg-blue z-[99]">
			<div class="flex xl:flex-nowrap flex-wrap">
				<div class="w-full xl:w-[60%] gap-[25px]">
					<h2><?php echo $title ?></h2>
				</div>
				<div class="w-full xl:w-[40%] mt-[30px] xl:mt-0 flex flex-col gap-y-[17px]">
					<?php foreach ($props  as $check) : ?>
						<span class="w-fit flex text-[14px] lg:text-[20px] leading-[20px] text-[#475467] px-[30px] py-[10px] bg-white rounded-[34px]">
							<?php echo $check["text"] ?>
							<img class="ml-[10px] mt-[2px]" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/check.svg">
						</span>
					<?php endforeach ?>
				</div>
			</div>
			<div class="mt-[30px] text-[16px] text-[#475467] leading-normal"> <?php echo $description ?></div>
			<div class="text-[24px] font-[600] text-dark-blue mt-[30px] flex items-center">
				$<?php echo $price ?> <span class="text-[12px] font-[400] text-gray ml-[5px]"> / month</span>
			</div>
			<div class="w-fit mt-[30px]">
				<a href="<?php echo  get_permalink($product->get_id()) ?>" class="btn-blue">Get Started</a>
			</div>
		</div>
	</div>
</li>