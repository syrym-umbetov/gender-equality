<?php
$url = $_SERVER['REQUEST_URI'];
$url_vals = explode('/', $url)[1];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Главная</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?= get_template_directory_uri() ?>/style.css" rel="stylesheet">
    <link href="<?= get_template_directory_uri() ?>/main.css" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              clifford: "#da373d",
              phone: "#D674AB",
              main: "#D5619D",
              category: "#C3B9B5",
              fond: "#999999",
              paragraph: "#666666",
              materials: "#2D0395",
              //   grad: "linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1))",
            },
            backgroundImage: {
              footer: 'url("<?= get_template_directory_uri() ?>/assets/footer.png")',
            },
            fontFamily: {
              fond: ['"Libre Franklin"'],
              title: ['"Tenor Sans"'],
              article: ['"Source Serif Pro"'],
            },
          },
        },
      };
    </script> -->
    <script crossorigin src="<?= get_template_directory_uri() ?>/react.development.js"></script>
    <script crossorigin src="<?= get_template_directory_uri() ?>/react-dom.development.js"></script>
    <script src="<?= get_template_directory_uri() ?>/babel.min.js"></script>
    <script>
      //   function toggleMenu() {
      //     const menu = document.querySelector("#menu");
      //     console.log(menu.style);
      //     if (menu.style.display === "") {
      //       menu.style.display = "flex";
      //       menu.style.alignItems = "start";
      //       menu.style.flexDirection = "column";
      //       menu.style.position = "absolute";
      //       menu.style.top = "30px";
      //       menu.style.right = "5%";
      //       menu.style.color = "black";
      //       menu.style.backgroundColor = "white";
      //     } else {
      //       menu.style.display = "";
      //       menu: initial;
      //     }
      //   }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&family=Tenor+Sans&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/scripts/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/scripts/slick-theme.css"/>
    <script src="<?= get_template_directory_uri() ?>/main.js"></script>
    <?php wp_head() ?>
  </head>

  <body class="relative overflow-x-hidden mx-auto sm:px-0">
  <header class="md:relative md:h-[100px] xl:bg-white ">
  <!-- md:mx-[-50px] -->
      <section
        class="bg-white flex items-center md:z-10  md:justify-end md:fixed w-[100%] lg:px-[100px]"
        >
        <!-- md:mx-[-50px] -->
        <div class="flex items-center justify-between w-[100%]">
          <a href="/fond1" class="block w-14 md:w-32">
            <img
              src="<?= get_template_directory_uri() ?>/assets/Gender _Equality.png"
              class="mt-2 cursor-pointer"
              alt="logo"
            />
          </a>

          <ul
            class="hidden md:flex justify-center flex-row text-category lg:text-xl md:gap-1 md:text-sm lg:gap-4"
          >
            <li class="hover:text-main font-bold cursor-pointer">
              <a href="/fond1">Главная</a>
            </li>
            <li class="mx-8  cursor-pointer hover:text-main">О фонде</li>
            <li class="cursor-pointer hover:text-main">
              <a href="/fond1/materials/">Материалы</a>
            </li>
            <li class="ml-8 cursor-pointer hover:text-main">
              <a href="#">Контакты</a>
            </li>
          </ul>
          <div
            class="hidden md:block text-phone font-bold md:text-sm lg:text-xl ml-8 lg:ml-28"
          >
            +7 727 272 04 57
          </div>
          <div class="block md:hidden relative">
            <ul
              id="menu"
              class="[&>li]:p-2 hidden text-category text-sm flex absolute bg-white z-10 right-0 top-4"
            >
              <li class="text-main font-bold cursor-pointer">
                <a href="/fond1">Главная</a>
              </li>
              <li class="cursor-pointer">О фонде</li>
              <li class="cursor-pointer">
                <a href="/fond1/materials/">Материалы</a>
              </li>
              <li class="cursor-pointer">
                <a href="/contacts.html">Контакты</a>
              </li>
            </ul>
            <img
            src="<?= get_template_directory_uri() ?>/assets/menu.png"
            alt="burger"
            class="block w-4 md:hidden ml-auto"
            onclick="toggleMenu()"
            />
          </div>
        </div>
      </section>
    </header>