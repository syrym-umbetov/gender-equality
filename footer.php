<?php 
  $materials = fond1_get_fields('materials-section');

  $unique_categories = array();
  foreach ($materials as $material)
  {
    $temp_custom_category = $material["custom_category"];
    $is_exists = false;
    foreach ($unique_categories as $unique_category)
      if ($unique_category["temp_custom_category"] == $temp_custom_category)
          $is_exists = true;
    
    if ($is_exists == false)
      {
        $myCat = [];
        $myCat["temp_custom_category"] = $temp_custom_category;
        $myCat["temp_custom_category_rus"] = $material["custom_category_rus"];
    
        $unique_categories[] = $myCat;
      }
  }
?>

<footer
      class="box-border footer-image text-xs md:h-[469px] flex justify-between flex-col lg:flex-row text-white italic font-light md:text-xl"
    >
      <section class="mx-10 lg:ml-[100px] mt-[44px] z-10">
        <img
          src="<?= get_template_directory_uri() ?>/assets/gender_white.png"
          alt="logo"
          class="hidden lg:block"
        />
        <div class="md:mt-12 grid grid-cols-2 gap-x-20">
          <p class="text-5">
            Политика конфиденциальности в отношении обработки персональных
            данных
          </p>

          <ul>
            <li>
              <a href="/fond1"> 
                Главная
              </a>
            </li>
            <li>
              <a href="/fond1/materials">
                Материалы
              </a>
            </li>
            <?php foreach ($unique_categories as $element) : ?>
              <li class="cursor-pointer">
                <a href="/fond1/materials">
                  <?= $element["temp_custom_category_rus"] ?>
                </a>
              </li>
            <?php endforeach; ?>
            <li>Контакты</li>
          </ul>
        </div>
      </section>
      <section class="mx-10 lg:mt-[171px] mr-[180px] z-10">
        <div class="flex justify-between items-center">  
          <img onclick="openLink(1)" src="<?= get_template_directory_uri() ?>/assets/inst.png" alt="inst" />
          <img onclick="openLink(2)" class="mx-12" src="<?= get_template_directory_uri() ?>/assets/fb.png" alt="fb" />
          <img onclick="openLink(3)" src="<?= get_template_directory_uri() ?>/assets/vk.png" alt="vk" />
          <img onclick="openLink(4)" class="ml-12" src="<?= get_template_directory_uri() ?>/assets/youtube.png" alt="youtube" />
        </div>
        <div class="mt-7 whitespace-nowrap">gender-equality.kz@gmail.com</div>
        <p class="mt-4">Разработка и поддержка:</p>
        <div class="flex">
          <p>Smart Sales</p>
          <div class="ml-2 mt-1 w-[22px]">
            <img class="object-cover" src="<?= get_template_directory_uri() ?>/assets/heart.png" />
          </div>
        </div>
      </section>
    </footer>
    
    <script src="<?= get_template_directory_uri() ?>/assets/scripts/jquery-3.6.1.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/scripts/slick.min.js"></script>
    <script src="<?= get_template_directory_uri() ?>/assets/scripts/script.js"></script>
    <script>
      $(document).ready(function(){
        $(".my-class").slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
                nextArrow: $(".next-arrow"),
    prevArrow: $(".prev-arrow"),
          })
      })
      
    </script>
    <?php wp_footer() ?>
  </body>
</html>