<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slick Slider Test</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <style>
        .testimonial {
            background: #262626;
        }

        .testimonial .stars {
            color: #ff9800;
        }

        .testimonial .profile img {
            width: 50px;
            height: 50px;
        }

        .testimonial .profile .name {
            font-weight: bold;
            color: #333;
        }

        .testimonial .profile .company {
            font-size: 12px;
            color: #999;
        }

        .slick-dots li button::before {
            font-size: 14px !important;
        }

        .slick-dots li.slick-active button::before {
            color: #000000 !important;
        }

        .slick-dots li button:hover::before {
            color: #000000 !important;
        }

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
            background: #4b637f !important;
            color: white !important;
            border-radius: 50%;
            padding: 10px 14px;
            font-size: 16px;
        }

        .slick-next::before {
            content: '\f054' !important;
            font-family: 'Font Awesome 5 Free' !important;
            font-weight: 600;
            background: #4b637f !important;
            color: white !important;
            border-radius: 50%;
            padding: 10px 14px;
            font-size: 16px;
        }

        .fp__menu_item {
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
            color: #333;
            display: block;
        }

        .fp__menu_item_text .price {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .fp__menu_item_text .price del {
            color: #999;
            margin-right: 10px;
        }

        .category {
            position: absolute;
            top: -11% !important;
            left: 16px;
            padding: 5px 10px;
            font-size: 12px;
            background-color: #f8f9fa;
            color: #333;
            border-radius: 15px;
            text-transform: uppercase;
            border: 1px solid #788a9f !important;
        }

        .actions a {
            font-size: 18px;
            color: #333;
            text-decoration: none;
        }

        .actions a:hover {
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container pt-4">
        <div class="row wow fadeInUp mt-md-5" data-wow-duration="1s">
            <div class="m-auto text-center col-md-8 col-lg-7 col-xl-6">
                <div class="fp__section_heading">
                    <h2>Trending Now</h2>
                    <p>Shop Our Most Popular Trending Designs</p>
                </div>
            </div>
        </div>

        <div class="testimonial-slider popularfood slider">
            <div class="row mt-2" id="top-selling-products">
                <!-- Products will be rendered here -->
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <script>
        const currencyIcon = "{{ config('settings.site_currency_icon') }}";
        const currencyPosition = "{{ config('settings.site_currency_icon_position') }}";

        function currencyFormat(price) {
            return currencyPosition === 'left' ? currencyIcon + price : price + currencyIcon;
        }

        $(document).ready(function() {
            $(window).on('load', function() {
                setTimeout(function() {
                    fetchTopSellingProducts();
                }, 100);
            });

            function fetchTopSellingProducts() {
                $.ajax({
                    url: '/api/top-selling-products',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data && Array.isArray(data)) {
                            renderProducts(data);
                        } else {
                            console.error('Unexpected data structure:', data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to fetch top-selling products.', error);
                    }
                });
            }

            function renderProducts(products) {
                const container = $('#top-selling-products');
                container.empty();

                if (products.length === 0) {
                    console.log('No products found to render.');
                    return;
                }

                products.forEach(product => {
                    const productHtml = `
                        <div class="fp__menu_hover ${product.category_slug}">
                            <div class="m-3 card position-relative fp__menu_item rounded-3 slide-wrap">
                                <div class="fp__menu_item_img">
                                    <a href="/product/${product.slug}" class="title w-100">
                                        <img src="${product.thumb_image}" alt="${product.name}" class="img-fluid w-100">
                                    </a>
                                </div>
                                <a class="heart position-absolute rounded-circle" href="javascript:;" onclick="addToWishlist('${product.id}')">
                                    <i class="text-white fal fa-heart"></i>
                                </a>
                                <div class="card-body fp__menu_item_text position-relative d-flex flex-column">
                                    <a class="px-3 py-2 category categorys fw-semibold" href="/category/${product.category_slug}">
                                        ${product.category_name}
                                    </a>
                                    <a class="title" href="/product/${product.slug}">${product.name}</a>
                                    <div class="mt-auto actions d-flex justify-content-between align-items-center">
                                        <p class="m-0 price color-light-gray">
                                            ${product.offer_price > 0 ? `<del>${currencyFormat(product.price)}</del> ${currencyFormat(product.offer_price)}` : currencyFormat(product.price)}
                                        </p>
                                        ${product.quantity === 0 || product.out_of_stock ?
                                            `<a class="px-3 py-2 text-white rounded-pill bg-danger" href="javascript:;">Out of Stock</a>` :
                                            `<a class="px-3 py-2 text-white add-to-cart rounded-pill background-light-gray" href="javascript:;" onclick="loadProductModal('${product.id}')">Add to Cart</a>`
                                        }
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    container.append(productHtml);
                });

                initializeSlickSlider();
            }

            function initializeSlickSlider() {
                $('.testimonial-slider .row').slick({
                    dots: true,
                    arrows: true,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [
                        {
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
        });
    </script>
</body>
</html>
