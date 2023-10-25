<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionSliderComponent extends Component
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
        return view('components.section-slider-component');
    }

    protected function getSliderImages()
    {
        $queriedObject = get_queried_object();
        $pageId = $queriedObject->ID;
        $images = [];
        if($pageId)
        {
            if(have_rows('section_slider',$pageId)){
                while(have_rows('section_slider',$pageId)){
                    the_row();
                    $images[] = [
                        'url' => get_sub_field('section_slider_image'),
                        'title' =>  get_sub_field('section_slider_title'),
                        'subtext'   =>   get_sub_field('section_slider_subtitle')
                    ];
                }
            }
        }
        return $images;
    }
}
