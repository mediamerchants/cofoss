<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BannerSliderComponent extends Component
{
    public $sliderImages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->sliderImages = $this->getSliderImages();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banner-slider-component');
    }

    protected function getSliderImages()
    {
        $queriedObject = get_queried_object();
        $pageId = $queriedObject->ID;
        $images = [];
        if($pageId)
        {
            if(have_rows('main_banner_slider',$pageId)){
                while(have_rows('main_banner_slider',$pageId)){
                    the_row();
                    $images[] = [
                        'url' => wp_get_attachment_image(get_sub_field('image'), 'banner'),
                        'title' =>  get_sub_field('slide_header_title'),
                        'subtext'   =>   get_sub_field('slider_sub_text')
                    ];
                }
            }
        }
        return $images;
    }
}
