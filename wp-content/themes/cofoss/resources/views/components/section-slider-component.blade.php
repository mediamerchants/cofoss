@php
    /**
     * @var $sliderImages app/View/Components/SectionSliderComponent.php
     *
     */
@endphp

<div class="swiper banner-slider section-slider">
    <div class="swiper-wrapper">
       @foreach($sliderImages as $image)
            <div class="swiper-slide">
                <img src="{!! $image['url'] !!}" class="attachment-banner size-banner" alt="" decoding="async" loading="lazy">
                <div class="banner-text">
                    @if( $image['title'] ) 
                    <h1 class="has-text-align-left bold-heading-text">{!! $image['title'] !!}</h1>
                    @endif
                    @if( $image['subtext'] ) 
                    <p>{!! $image['subtext'] !!}</p>
                    @endif
                </div>
            </div>
       @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
