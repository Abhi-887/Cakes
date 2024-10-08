<!-- Slick Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    img.product-img {
        object-fit: cover !important;
        height: 100% !important;
    }

    .product-slider .profile img {
        width: 50px;
        height: 50px;
    }

    .product-slider .profile .name {
        font-weight: bold;
    }

    .product-slider .profile .company {
        font-size: 12px;
    }

    .slick-dots li button::before {
        font-size: 14px !important;
    }

    /* .slick-dots li.slick-active button::before {
        color: #000000 !important;
    }

    .slick-dots li button:hover::before {
        color: #000000 !important;
    } */

    .popularfood .slick-dots {
        display: none !important;
    }

    .popularfood .slick-next {
        right: -20px !important;
    }

    .popularfood .slick-prev::before {
        position: relative !important;
        right: 1rem !important;
    }

    @media (max-width: 650px) {
        .slick-prev.slick-arrow {
            top: 100%;
            left: 40%;
            margin-top: 1.5rem !important;
        }

        .slick-next.slick-arrow {
            top: 100%;
            right: 40% !important;
            margin-top: 1.5rem !important;
        }

        .popularfood .slick-prev::before {
            position: relative !important;
        }
    }

    .slick-prev::before {
        content: '\f053' !important;
        font-family: 'Font Awesome 5 Free' !important;
        font-weight: 600;
        border-radius: 50%;
        padding: 10px 14px;
        font-size: 16px;
    }

    .slick-next::before {
        content: '\f054' !important;
        font-family: 'Font Awesome 5 Free' !important;
        font-weight: 600;
        border-radius: 50%;
        padding: 10px 14px;
        font-size: 16px;
    }

    .fp__menu_item {
        border-radius: 15px;
        overflow: hidden;
    }

    .fp__menu_item_img img {
        height: 250px;
        object-fit: cover;
        width: 100% !important;
    }

    .fp__menu_item_text .title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
        display: block;
    }

    .fp__menu_item_text .price {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .fp__menu_item_text .price del {
        margin-right: 10px;
    }

    .category {
        position: absolute;
        top: -11% !important;
        left: 16px;
        padding: 5px 10px;
        font-size: 12px;
        text-transform: uppercase;

    }

    .actions a {
        font-size: 18px;
        text-decoration: none;
    }
</style>



<div class="container pt-4">
    <div class="row wow fadeInUp mt-md-5" data-wow-duration="1s">
        <div class="m-auto text-center col-md-8 col-lg-7 col-xl-6">
            <div class="fp__section_heading">
                <h2>Trending Now</h2>
                <p class="color-light-gray">Shop Our Most Popular Trending Designs</p>
            </div>
        </div>
    </div>

    <div class="product-slider popularfood slider">
        <div class="mt-2 row" id="top-selling-products">
            <!-- Products will be rendered here -->
        </div>
    </div>
</div>


<!-- Slick Carousel JS -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script defer>
    // Site currency configuration
    const currencyIcon = "{{ config('settings.site_currency_icon') }}";
    const currencyPosition = "{{ config('settings.site_currency_icon_position') }}";

    // Function to format price based on the currency position
    function currencyFormat(price) {
        return currencyPosition === 'left' ? `${currencyIcon}${price}` : `${price}${currencyIcon}`;
    }

    window.addEventListener('load', () => {
        setTimeout(fetchTopSellingProducts, 100);
    });

    // Fetch top-selling products from the API
    async function fetchTopSellingProducts() {
        try {
            const response = await fetch('/api/top-selling-products');
            const data = await response.json();

            // Check if the response is an array
            if (Array.isArray(data)) {
                renderProducts(data);
            } else {
                console.error('Unexpected data structure:', data);
            }
        } catch (error) {
            console.error('Failed to fetch top-selling products:', error);
        }
    }

    // Render products into the DOM
    function renderProducts(products) {
        const container = document.getElementById('top-selling-products');
        container.innerHTML = '';

        // Check if there are products to render
        if (products.length === 0) {
            console.log('No products found to render.');
            return;
        }

        // Generate HTML for each product
        products.forEach(product => {
            const productHtml = `
                <div class="fp__menu_hover ${product.category_slug}">
                    <div class="m-3 card position-relative fp__menu_item rounded-3 slide-wrap">
                        <div class="fp__menu_item_img" style="height: 414px; overflow: hidden;">
                            <a href="/product/${product.slug}" class="title w-100">
                                <img src="${product.thumb_image}" alt="${product.name}" class="img-fluid w-100 product-img">
                            </a>
                        </div>
                        <a class="heart background-light-gray position-absolute rounded-circle" href="javascript:;" onclick="addToWishlist('${product.id}')">
                            <i class="text-white fal fa-heart"></i>
                        </a>
                        <div class="card-body fp__menu_item_text position-relative d-flex flex-column">
                            <a class="px-3 py-2 category bg-light border-common color-light-gray categorys " href="/category/${product.category_slug}">
                                ${product.category_name}
                            </a>
                            <a class="title text-uppercase" href="/product/${product.slug}">${product.name}</a>
                            <div class="mt-auto actions d-flex justify-content-between align-items-center">
                                <p class="m-0 price color-light-gray">
                                    ${product.offer_price > 0 ? `<del>${currencyFormat(product.price)}</del> ${currencyFormat(product.offer_price)}` : currencyFormat(product.price)}
                                </p>
                                ${product.quantity === 0 || product.out_of_stock
                                    ? `<a class="px-3 py-2 text-white rounded-pill bg-danger fs-14" href="javascript:;">Out of Stock</a>`
                                    : `<a class="px-3 py-2 text-white add-to-cart rounded-pill background-light-gray fs-14" href="javascript:;" onclick="loadProductModal('${product.id}')">Add to Cart</a>`}
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', productHtml);
        });

        // Initialize the Slick slider after rendering products
        initializeSlickSlider();

        // Adjust the height and size of product images
        adjustImageSizes();

        adjustCardHeights();
    }

    // Initialize the Slick slider
    function initializeSlickSlider() {
        $('.product-slider .row').slick({
            dots: true,
            arrows: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    // Function to ensure images fill the div without being cropped
    function adjustImageSizes() {
        const images = document.querySelectorAll('.fp__menu_item_img img.product-img');
        images.forEach(img => {
            img.style.objectFit = 'cover'; // This makes sure the image scales and doesn't distort
            img.style.height = '100%'; // Ensures it takes up the full height of the container
        });
    }

    // Adjust product card heights to make them uniform
    function adjustCardHeights() {
        let maxHeight = 0;

        // Find the maximum height among all product cards
        document.querySelectorAll('.fp__menu_item').forEach(card => {
            const cardHeight = card.offsetHeight;
            if (cardHeight > maxHeight) {
                maxHeight = cardHeight;
            }
        });

        // Apply the maximum height to all product cards
        document.querySelectorAll('.fp__menu_item').forEach(card => {
            card.style.height = `${maxHeight}px`;
        });
    }
</script>
