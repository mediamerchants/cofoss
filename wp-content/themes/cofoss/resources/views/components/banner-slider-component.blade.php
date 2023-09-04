@php
    /**
     * @var $sliderImages app/View/Components/BannerSliderComponent.php
     *
     */
@endphp

<div class="swiper banner-slider">
    <div class="swiper-wrapper">
       @foreach($sliderImages as $image)
            <div class="swiper-slide">
                {!! $image['url'] !!}
                <div class="banner-text">
                    <h1>{!! $image['title'] !!}</h1>
                    <p>{!! $image['subtext'] !!}</p>
                </div>
            </div>
       @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
