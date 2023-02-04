@extends('thepublic.layout.master')

@section("extracss")
<link rel="stylesheet" href="{{url('/')}}/assets/css/vendor.min.css">
<style>
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


    .mySwiper2 {
        height: 80%;
        width: 100%;
    }

    .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }

    .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>


@endsection

<!--Main Navigation-->

@section("main")
<main class="mt-3">
    <div class="container">
        <h1>
            عنوان تبلیغ
        </h1>
        <div class="row">
            <div class="col-12 col-md-6">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-1.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-2.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-3.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-4.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-5.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-6.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-7.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-8.jpg" />
                        </div>

                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-10.jpg" />
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-1.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-2.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-3.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-4.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-5.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-6.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-7.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-8.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="{{url('/')}}/assets/images/nature-10.jpg" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div>
                    <h2>
                        عنوان کوچک تر
                    </h2>
                    <p>
                        متن تبلیغ متن تبلیغمتن تبلیغمتن تبلیغ متن تبلیغ متن تبلیغمتن تبلیغمتن تبلیغ متن تبلیغ متن تبلیغمتن تبلیغمتن تبلیغ
                    </p>
                </div>
            </div>
        </div>
    </div>
    <section class="simiralvendor mt-5">
        <div class="container">
            <h2>
                آگهی های مرتبط
            </h2>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="{{url('/')}}/assets/images/product.jpg" alt="some text">
                        <div class="card-body">
                            <h3>
                                عنوان آگهی
                            </h3>
                            <p>
                                متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی
                            </p>
                            <a href="#" class="btn btn-success">مشاهده تبلیغ</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="{{url('/')}}/assets/images/product.jpg" alt="some text">
                        <div class="card-body">
                            <h3>
                                عنوان آگهی
                            </h3>
                            <p>
                                متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی
                            </p>
                            <a href="#" class="btn btn-success">مشاهده تبلیغ</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="{{url('/')}}/assets/images/product.jpg" alt="some text">
                        <div class="card-body">
                            <h3>
                                عنوان آگهی
                            </h3>
                            <p>
                                متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی
                            </p>
                            <a href="#" class="btn btn-success">مشاهده تبلیغ</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="{{url('/')}}/assets/images/product.jpg" alt="some text">
                        <div class="card-body">
                            <h3>
                                عنوان آگهی
                            </h3>
                            <p>
                                متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی متن آگهی
                            </p>
                            <a href="#" class="btn btn-success">مشاهده تبلیغ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="vip">
        <div class="container-fluid vip">
            <h2>vip</h2>
            <div class="slogan">
                <p>
                    متن تبلیغی
                </p>
            </div>
            <div class="container">
                <div class="swiper mySwiper2 amazing-offers" id="bigbanner">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="assets/images/product.jpg" alt="محصول" />
                                <div class="card-body">
                                    <p>
                                        متن تبلیغی
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex">
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="assets/images/product.jpg" alt="محصول" />
                                <div class="card-body">
                                    <p>
                                        متن تبلیغی
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex">
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="assets/images/product.jpg" alt="محصول" />
                                <div class="card-body">
                                    <p>
                                        متن تبلیغی
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex">
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="assets/images/product.jpg" alt="محصول" />
                                <div class="card-body">
                                    <p>
                                        متن تبلیغی
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex">
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="assets/images/product.jpg" alt="محصول" />
                                <div class="card-body">
                                    <p>
                                        متن تبلیغی
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex">
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="assets/images/product.jpg" alt="محصول" />
                                <div class="card-body">
                                    <p>
                                        متن تبلیغی
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex">
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                        <a href="" class="btn btn-warning">
                                            خرید محصول
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
</main>



@endsection

@section("extrajs")
<script src="{{url('/')}}/assets/js/swiper-bundle.min.js"></script>
<script src="{{url('/')}}/assets/js/vendore.js"></script>
@endsection