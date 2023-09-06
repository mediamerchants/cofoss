@php
$pageTitle = get_field('page_title');
$pageTitleSubtext = get_field('page_title_subtext');
$pageTitleBGImage = get_field('title_background_image');
$extraClass = get_field('extra_class');
@endphp

<div class="container about-page">
    <div class="row">
        <div class="col-12">
            <div class="fullwidth" style="background-image: url({!! $pageTitleBGImage !!}); background-repeat: no-repeat;">
                @if($pageTitle)
                    <div class="box">
                        <h1 class="page-title {!! $extraClass !!}">{!! $pageTitle !!}</h1>
                        @if($pageTitleSubtext)
                            <p class="sub-text">{!! $pageTitleSubtext !!}</p>
                        @endif
                    </div>
                @endif
            </div>
            <div class="section-content">
                <?php 
                    if(have_rows('set_content')){
                       
                        while (have_rows('set_content')) : the_row();
                        
                            if(get_row_layout() == 'section_title' || get_row_layout() == 'section_subtitle'){
                                $sectionTitle = get_sub_field('section_title');
                                $sectionSubTitle = get_sub_field('section_subtitle');
                                echo '<h2 class="section-title">'.$sectionTitle.'</h2>';
                                echo '<p class="section-subtitle">'.$sectionSubTitle.'</p>';

                            }
                            if(get_row_layout() == 'paragraph'){
                                $paragraph = get_sub_field('content_paragraph');
                                echo '<div class="content-paragraph">'.$paragraph.'</div>';

                            }

                            
                            if(get_row_layout() == '3_column_layout'){
                                if(have_rows('column_content')){
                                    echo '<div class="row">';
                                    while (have_rows('column_content')) : the_row();
                                        $iconImg = get_sub_field('icon_or_image');
                                        $position = get_sub_field('icon_or_image_position');
                                        $title = get_sub_field('column_title');
                                        $description = get_sub_field('column_description');
                                        echo '<div class="col-md-4">';
                                        echo    '<div class="display-flex">';
                                        echo        '<img src ="'.$iconImg.'" />';
                                        echo        '<div class="texts">';
                                        echo            $title ? '<h3 class="sea-blue">'.$title.'</h3>' : '';
                                        echo            '<p class="column-description content-paragraph">'.$description.'</p>';
                                        echo        '</div>';
                                        echo     '</div>';
                                        echo '</div>';
                                    endwhile;
                                    echo '</div>';
                                }
                                
                            }

                            if(get_row_layout() == 'fullwidth_content'){
                                $fwTitle = get_sub_field('fullwidth_title');
                                $fwTextContent = get_sub_field('fullwidth_text_content');
                                $fwBGimage = get_sub_field('fullwidth_background_image');
                                echo '<div class="white fullwidth cta-section" style="background-image: url('.$fwBGimage.'); background-repeat: no-repeat;">';
                                echo    '<div class="box">'; 
                                echo        '<h3>'.$fwTitle.'</h3>';
                                echo        '<div class="text">'.$fwTextContent.'</div>';
                                echo    '</div>';
                                echo '</div>';
                            }

                            if(get_row_layout() == 'list_items'){
                                if(have_rows('list_item')){
                                    echo '<ul class="icon-item">';
                                    while (have_rows('list_item')) : the_row();
                                        $itemText = get_sub_field('item_text');
                                        $itemIcon = get_sub_field('item_icon');
                                        echo '<li class="display-flex">';
                                        echo    '<span class="icon"><img src="'.$itemIcon.'" /></span>';
                                        echo    '<span class="text content-paragraph">'.$itemText.'</span>';
                                        echo '</li>';
                                    endwhile;
                                    echo '</ul>';
                                }
                                
                            }

                            
                            if(get_row_layout() == 'separator'){
                                $color = get_sub_field('line_separator_color');
                                $width = get_sub_field('line_separator_width');
                                $height = get_sub_field('line_separator_height');
                                $marginTop = get_sub_field('margin_top');
                                $marginBottom = get_sub_field('margin_bottom');
                                echo '<p>';
                                echo '<span style="display: block; width:'.$width.'; height:'.$height.';background-color:'.$color.';margin: '.$marginTop.' 0 '.$marginBottom.'"></span>';
                                echo '</p>';
                                
                            }

                        endwhile;
                    }

                ?>
            </div>
        </div>
    </div>
</div>

