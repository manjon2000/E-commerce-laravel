
let menu, navbar, menuheight, timeOutAnimation, scrollAnimation, navContainer,
    openCartModal, containerCart, closeCartModal, itemsCart, contentCart;
let pruebarry = [];
let arryItemsProduct = [];
menu = document.querySelectorAll('.icon-menu');
navbar = document.querySelector('.navbar--menu');
navContainer = document.querySelector('.navbar--container');
menuheight = document.querySelector('.animacion');
openCartModal = document.querySelectorAll('.open-modal_cart');
containerCart = document.querySelector('.container-popup_cart');
closeCartModal = document.getElementById('closePopup');
contentCart = document.getElementById('content_cart');
// Scroll change color navbar

document.addEventListener('scroll', function () {
    scrollAnimation = window.scrollY;
    if (scrollAnimation >= 400 && scrollAnimation > 30) {
        navContainer.classList.add('bg-nav-scroll')
    } else {
        navContainer.classList.remove('bg-nav-scroll')
    }

});
let animationContentPrimary = gsap.timeline()
    .from(".nabvar--container__mobile", { opacity: 0, duration: 1.4 })
    .from('.header-container__btn-tabs-category a', { y: 160, stagger: 0.8, opacity: 0, duration: 0.3 })
    .from('.item a', { opacity: 0, duration: 1 });

menu.forEach(element => {
    element.addEventListener('click', function (e) {
        var classNav = navbar.className.split(' ');
        navbar.classList.add('opacity-1');
        if (classNav.length > 1) {
            console.log('Contiene')
            let animationnavbarMobile = gsap.timeline()
                .to('.navbar--menu__mobile a', { x: -400, stagger: 0.3, duration: 0.2 })
                .to('.navbar--menu', { opacity: 0, duration: 2, ease: 'back' })
            if (animationnavbarMobile) {
                timeOutAnimation = Math.round(animationnavbarMobile['_dur']);
                setTimeout(function () {
                    navbar.classList.remove('opacity-1');
                }, `${timeOutAnimation}500`);
            }
        }
        if (classNav.length <= 1) {
            navbar.classList.add('opacity-1');
            let animationIn = gsap.timeline()
                .from('.navbar--menu', { stagger: 1, duration: 0.2, ease: 'back' })
                .from('.navbar--menu__mobile a', { x: -400, opacity: 1, stagger: 0.3, duration: 0.1 })
                .to('.navbar--menu__mobile a', { x: 0, opacity: 1, stagger: 0.3 })
        }
        menuheight.classList.toggle('animation-menu');
    });
});


// Open modal Cart

openCartModal.forEach(element => {
    element.addEventListener('click', function (e) {
        e.preventDefault();
        containerCart.classList.add('open_popup_cart');
        navContainer.classList.add('d-none');
       
    });
});

// Close modal Cart
closeCartModal.addEventListener('click', function (e) {
    containerCart.classList.remove('open_popup_cart');
    navContainer.classList.remove('d-none');
});

// Items cart
$.ajax({
    url: 'http://localhost/e-commerce-laravel/public/item-cart/query',
    method: 'POST',
    data: {
        "_token": $('#tokenCfr').val(),
        'query': true
    },
    success: function (result, status) {
        if (status == 'success') {
            itemsCart = 0;
            let numeroArry = 0;
            let countProduct = 1;
            console.log();
            let arrayOrdenado = result[0].sort((a, b) => a.product_id - b.product_id);

            arrayOrdenado.forEach((element, indice) => {

                if (itemsCart != element.product_id) {
                    // console.log('Es diferente')
                    // console.log(element.name)
                    itemsCart = element.product_id
                    countProduct = 1;
                    arryItemsProduct.push({
                        'id': element.product_id,
                        'name': element.name,
                        'price': element.price,
                        'img_product': element.image_product
                    });

                    numeroArry = numeroArry + 1;

                } else {
                    // console.log('Es igual')
                    countProduct = countProduct + 1;
                    // console.log(countProduct);
                    // arryItemsProduct['cantidad'] = countProduct
                }

            })
            addtemplateDom(arryItemsProduct)
        }
    }
});

// Template item cart
function addtemplateDom(arry) {
    contentCart.innerHTML = '';
    for (let incremento in arry) {

        contentCart.innerHTML +=
            `    
        <div class="item_cart">
                <div class="icon_delate">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="img_product-cart">
                    <img src="http://localhost/e-commerce-laravel/public/images/img_product.png" width="50" alt="">
                </div>
                <div class="group_info-cart">
                    <div class="title_product_cart">
                        <h3>${arry[incremento].name}</h3>
                    </div>
                    <div class="price_product_cart">
                        <p>$ ${arry[incremento].price}.00</p>
                    </div>
                </div>
            </div>

        `;

    }
}






