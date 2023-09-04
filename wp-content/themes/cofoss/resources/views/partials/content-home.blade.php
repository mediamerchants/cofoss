@php
$section_1_header = get_field('section_1_header_title');
$section_1_header_sub_text = get_field('section_1_header_sub_text');
$section_1_content_text = get_field('section_1_content_text');
@endphp

<div class="main-slider">
    <x-banner-slider-component/>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 section secion-1">
            <div class="section-header">
                @if($section_1_header)
                    <h1 class="sea-blue">{!! $section_1_header !!}</h1>
                    @if($section_1_header_sub_text)
                        <p class="sub-text">{!! $section_1_header_sub_text !!}</p>
                    @endif
                @endif
            </div>
            <div class="section-content">
                {!! $section_1_content_text !!}
            </div>
        </div>


    </div>
</div>

