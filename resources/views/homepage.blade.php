<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home - Ecommerce</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/homepage.css')  }}">
    <!-- Style -->

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/762a7ec47b.js" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
</head>

<body>
    <input type="text" value="{{ csrf_token() }}" id="tokenCfr" hidden>

    <!-- pop-up cart -->
    <div class="container-popup_cart">
        <div id="closePopup">
            <i class="fas fa-times"></i>
        </div>
        <div class="title-cart">
            <h2>CARRITO</h2>
        </div>
        <div class="content_cart">
            <!-- Item -->
            <div class="item_cart">
                <div class="icon_delate">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="img_product-cart">
                    <img src="{{asset('images/img_product.png')}}" width="40" alt="">
                </div>
                <div class="group_info-cart">
                    <div class="title_product_cart">
                        <h3>Zapatillas nike</h3>
                    </div>
                    <div class="price_product_cart">
                        <p>$234.99</p>
                    </div>
                </div>
            </div>
            <!-- End Item -->
        </div>

        <div class="btn_action-cart">
            <a href="">Ver carrito</a>
            <a href="">Comprar</a>
        </div>

    </div>

    <div class="navbar--menu" >

        <div class="navbar--menu__mobile">
                <a href="{{route('homepage')}}">HOME</a>
                <a href="">NOVEDADES</a>
                <a href="">HOMBRE</a>
                <a href="">MUJER</a>
                <a href="">ACESSORIOS</a>
        </div>
    </div>
    <nav class="navbar--container">
        <div class="nabvar--container__mobile" >

            <div class="icon-menu">                
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50"
                    style="enable-background:new 0 0 50 50;" xml:space="preserve">
                    <g>
                        <rect class=" animacion" y="3" width="50" height="2" />
                        <rect y="17" width="50" height="2" />
                        <rect y="31" width="50" height="2" />
                        <rect y="45" width="50" height="2" />
                    </g>

                </svg>

            </div>

            <div class="logo-menu">
                <img src="{{ asset('images/icon_navbar.png') }}" width="65">
            </div>

            <div class="icons-action">
                <a href="">
                    <img src="{{ asset('images/lupa.svg') }}" alt="">
                </a>
                <a href="">
                    <img src="{{ asset('images/user_icon.svg') }}" alt="">
                </a>
                <a href="" class="open-modal_cart">
                    <img src="{{ asset('images/shop.svg') }}" alt="">
                </a>
            </div>

        </div>
        <div class="navbar--container__desktop">
            <div class="logo-menu">
                <img src="{{ asset('images/icon_navbar.png') }}" width="50">
            </div>
            <div class="icons-action">
                <a href="">
                    <img src="{{ asset('images/lupa.svg') }}" alt="">
                </a>
                <a href="">
                    <img src="{{ asset('images/user_icon.svg') }}" alt="">
                </a>
                <a href="" class="open-modal_cart">
                    <img src="{{ asset('images/shop.svg') }}" alt="">
                </a>
            </div>
            <div class="icon-menu">


                <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50"
                    style="enable-background:new 0 0 50 50;" xml:space="preserve">
                    <g>
                        <rect y="3" width="50" height="2" />
                        <rect y="17" width="50" height="2" />
                        <rect y="31" width="50" height="2" />
                        <rect y="45" width="50" height="2" />
                    </g>

                </svg>

            </div>
        </div>
    </nav>
    <header class="haeder">

        <div class="haeder--container">

            <!-- Tabs -->
            <div class="header-container__btn-tabs-category">
                <a href="#urbana" class="item-opacity-low">
                    <img src="./assets/images/img_prueba.jpg" width="40">
                </a>
                <a href="#inviero" class="item-opacity-low">
                    <img src="./assets/images/bg-header-category.jpg" width="40">
                </a>
                <a href="#destacado" class="item-opacity-low">
                    <img src="./assets/images/img_product-bg-white.webp" width="40">
                </a>
            </div>


            <div class="header--container__item-tab">
                <section id="urbana" class="item" style="background-image: url(./assets/images/img_prueba.jpg);">
                    <a href="">
                        <span class="color-orange">1- </span> Urbana
                    </a>
                </section>
                <section id="inviero" class="item" style="background-image: url(./assets/images/bg-header-category.jpg);">
                    <a href="">
                        <span class="color-orange">2- </span> Invierno
                    </a>
                </section>

                <section id="destacado" class="item" style="background-image: url(./assets/images/img_product-bg-white.webp);">
                    <a href="">
                        <span class="color-orange">3- </span> Destacado
                    </a>
                </section>
            </div>
        </div>
       


    </header>

    <main role="main" class="main-container">
        <section class="productos--destacados">
            <div class="title-sec">
                <h3>Productos destacados</h3>
            </div>

            <div class="content-producto--destacado__flex">
                <div class="group-item-product">
                    <div class="first__item" style="background-image: url({{asset('images/1655251236.jpg')}})">
                        <section class="content--item__hover">
                            <section class="icon-fav_product">
                                <i class="fas fa-heart"></i>
                            </section>
                            <section class="title_product">
                                <h1>Lorem, ipsum dolor.</h1>
                            </section>
                            <section class="desc_product">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </section>
                            <section class="prince-btn-card">
                                <article class="items-flex">
                                    <article class="view_product">
                                        <a href="">Ver producto</a>
                                    </article>
                                    <article class="price_product">
                                        <h4>$323.00</h4>
                                    </article>
                                </article>
                            </section>

                        </section>
                    </div>
                    <div class="last__item">
                        <section class="content--item__hover">
                            <section class="icon-fav_product">
                                <i class="fas fa-heart"></i>
                            </section>
                            <section class="title_product">
                                <h1>Lorem, ipsum dolor.</h1>
                            </section>
                            <section class="desc_product">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </section>
                            <section class="prince-btn-card">
                                <article class="items-flex">
                                    <article class="view_product">
                                        <a href="">Ver producto</a>
                                    </article>
                                    <article class="price_product">
                                        <h4>$323.00</h4>
                                    </article>
                                </article>
                            </section>

                        </section>
                    </div>
                </div>
                <div class="item--category__large">
                    <div class="title_Category">
                        <h2>Lorem, ipsum dolor.</h2>
                    </div>
                    <div class="action_category">
                        <a href="www.google.es">Ver categoria</a>
                    </div>
                </div>

                <div class="group-item-product">
                    <div class="first__item">
                        <section class="content--item__hover">
                            <section class="icon-fav_product">
                                <i class="fas fa-heart"></i>
                            </section>
                            <section class="title_product">
                                <h1>Lorem, ipsum dolor.</h1>
                            </section>
                            <section class="desc_product">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </section>
                            <section class="prince-btn-card">
                                <article class="items-flex">
                                    <article class="view_product">
                                        <a href="">Ver producto</a>
                                    </article>
                                    <article class="price_product">
                                        <h4>$323.00</h4>
                                    </article>
                                </article>
                            </section>

                        </section>
                    </div>
                    <div class="last__item">
                        <section class="content--item__hover">
                            <section class="icon-fav_product">
                                <i class="fas fa-heart"></i>
                            </section>
                            <section class="title_product">
                                <h1>Lorem, ipsum dolor.</h1>
                            </section>
                            <section class="desc_product">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </section>
                            <section class="prince-btn-card">
                                <article class="items-flex">
                                    <article class="view_product">
                                        <a href="">Ver producto</a>
                                    </article>
                                    <article class="price_product">
                                        <h4>$323.00</h4>
                                    </article>
                                </article>
                            </section>

                        </section>
                    </div>
                </div>
            </div>


        </section>

        <section class="container_category">
            <div class="title-sec">
                <h3>Categorias destacadas</h3>
            </div>
            <div class="content_categoty">

                <!-- item -->
                <div class="item_categoty">
                    <div class="item_img">
                        <img src="{{asset('images/img_product.png')}}">
                    </div>
                    <div class="item_title">
                        <h3>Hombre</h3>
                    </div>
                </div>

                <!-- item -->
                <div class="item_categoty">
                    <div class="item_img">
                        <img src="{{asset('images/img_product.png')}}">
                    </div>
                    <div class="item_title">
                        <h3>Hombre</h3>
                    </div>
                </div>

                <!-- item -->
                <div class="item_categoty">
                    <div class="item_img">
                        <img src="{{asset('images/img_product.png')}}">
                    </div>
                    <div class="item_title">
                        <h3>Hombre</h3>
                    </div>
                </div>
                
            </div>
        </section>
    </main>

    <br><br><br>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" integrity="sha512-VEBjfxWUOyzl0bAwh4gdLEaQyDYPvLrZql3pw1ifgb6fhEvZl9iDDehwHZ+dsMzA0Jfww8Xt7COSZuJ/slxc4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/main.js')  }}"v=<?php echo time(); ?>></script>
    <script src="{{ asset('js/tab.js')  }}"></script>

    <!-- Script -->
</body>

</html>