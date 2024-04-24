<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>BMI</title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open();
  $cta = get_field('header', 'option')["cta"]; ?>
    <section class="bg-dark-blue">
      <div class="all-texts flex flex-row py-[15px]">
        <ul>
          <?php for ($i=0; $i <= 20; $i++) { ?>
              <li>JOIN 60k+ MEMBERS IN REACHING THEIR WEIGHT LOSS GOALS. LIMITED TIME: $100 OFF YOUR FIRST MONTH STARTING DOSE </li>
          <?php } ?>
        </ul>
      </div>
    </section>
  <header class="overflow-x-clip relative flex justify-center">
    <section>
      <div class="block_content px-[30px] lg:px-[112px] py-[20px] flex flex-row z-[99]">
        <div class="w-[60%] lg:w-[22%] xl:w-[20%] flex items-center">
          <a href="/">
            <figure class="w-[145px]">
              <img class="w-full" src="<?php esc_url(the_field('logo', 'option')) ?>" alt="">
            </figure>
          </a>
        </div>
        <div id="menu-dektop" class="w-[45%] xl:w-[50%] hidden lg:flex justify-start items-center gap-[25px]">
          <?php echo  wp_nav_menu(array(
            'menu'   => 'Header Menu',
          ));  ?>

        </div>
        <div class="w-[40%] xl:w-[30%] flex  items-center justify-end gap-[10px]">
          <span class="inline-block lg:hidden cursor-pointer menu-mobile">
            <div class="" id="nav-icon4">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </span>
          <div class="hidden lg:block w-fit">
            <a href="/login/" class="btn-white">Sign in</a>
          </div>
          <div class="hidden lg:block w-fit">
            <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-blue"><?php echo esc_attr($cta["title"]) ?></a>
          </div>
        </div>
      </div>

      <!-- mobile -->
      <div id="menu-mobile" class="menu-mobile-container block lg:hidden">
        <div class="flex flex-col justify-between px-[40px] pb-[70px] pt-[100px] h-[85vh]">
          <?php echo  wp_nav_menu(array(
            'menu'   => 'Header menu',
          ));  ?>
          <div class="flex flex-col items-center gap-[30px]">
            <div class="w-full">
              <a href="/login/" class="btn-white">Sign in</a>
            </div>
            <div class="w-full">
              <a href="<?php echo esc_url($cta["url"]) ?>" target="<?php echo esc_attr($cta["target"]) ?>" class="btn-blue"><?php echo esc_attr($cta["title"]) ?></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </header>

  <script>
    let mobile = document.querySelector(".menu-mobile")
    mobile.addEventListener('click', () => {
      document.querySelector(".menu-mobile-container").classList.toggle('active')
      document.querySelector("#nav-icon4").classList.toggle('open')
    })


    //Mobile
    let itemsMobile = document.querySelectorAll("#menu-mobile .menu-item-has-children")
    itemsMobile.forEach((a) => {
      a.addEventListener("click", () => {
        a.querySelector("ul").classList.toggle("show");
        a.classList.toggle("rotate");
      })
    })
  </script>