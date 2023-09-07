@php
$section_1_header = get_field('section_1_header_title');
$section_1_header_sub_text = get_field('section_1_header_sub_text');
$section_1_content_text = get_field('section_1_content_text');
@endphp

<div class="main-slider">
    <x-banner-slider-component/>
</div>
<div class="container page-content homepage">
    <?php 
        if(have_rows('set_content')){
            
            while (have_rows('set_content')) : the_row();
            
                if(get_row_layout() == 'section_title' || get_row_layout() == 'section_subtitle'){
                    $sectionTitle = get_sub_field('section_title');
                    $sectionSubTitle = get_sub_field('section_subtitle');
                    if( $sectionTitle || $sectionSubTitle){
                    ?>
                        <div class="row">
                            <div class="col-12">
                    <?php 
                        echo $sectionTitle ? '<h2 class="section-title">'.$sectionTitle.'</h2>' : '';
                        echo $sectionSubTitle ? '<p class="section-subtitle">'.$sectionSubTitle.'</p>' : '';
                    }
                    ?>
                            </div>
                        </div>
                    <?php
                    
                }
                if(get_row_layout() == 'paragraph'){
                    $paragraph = get_sub_field('content_paragraph');
                    if($paragraph){
                    ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="content-paragraph"><?= $paragraph; ?></div>
                            </div>
                        </div>
                    <?php
                    }

                }


                if(get_row_layout() == '2_column_layout'){
                    if(have_rows('2_column_content')){
                    ?>
                        <div class="row col2-layout">
                    <?php
                        while (have_rows('2_column_content')) : the_row();
                             $image = get_sub_field('image_content');
                             $title = get_sub_field('2_column_title');
                             $paragraph = get_sub_field('2_column_paragraph');

                            if($image){
                            ?>
                                <div class="col-md-6">
                                    <p class="2-col-2-img"><img src="<?= $image; ?>" /></p>
                                </div>
                            <?php
                            }
                            if($title || $paragraph){
                            ?>
                                <div class="col-md-6">
                                    <div class="col2-texts">
                                        <?php echo $title ? '<h3 class="col-2-title">'.$title.'</h3>' : ''; ?>
                                        <?php echo $paragraph ? '<p class="2-col-texts content-paragraph">'.$paragraph.'</p>' : ''; ?>
                                    </div>
                               </div>

                            <?php
                            }
                                
                        endwhile;
                    ?>
                        </div> <!-- .row -->
                    <?php
                    }
                    
                }
                
                if(get_row_layout() == '3_column_layout'){
                    if(have_rows('column_content')){
                    ?>
                        <div class="row col3-layout">
                    <?php
                        while (have_rows('column_content')) : the_row();
                            $iconImg = get_sub_field('icon_or_image');
                            $position = get_sub_field('icon_or_image_position');
                            $title = get_sub_field('column_title');
                            $description = get_sub_field('column_description');
                            $displayFlex = get_sub_field('display_flex');
                            if($position == 'right'){
                                $extraClass = 'right-image';
                                $extraClass += $displayFlex ? ' display-flex ' : '';
                            }elseif($position == 'center'){
                                $extraClass = 'centered';
                            }else{
                                $extraClass = $displayFlex ? ' display-flex ' : '';
                            }
                        ?>
                             <div class="col-md-4">
                                <div class="<?= $extraClass; ?>">
                                    <img src ="<?php echo $iconImg; ?>" />
                                    <div class="texts">
                                        <?php echo  $title ? '<h3 class="sea-blue col-title">'.$title.'</h3>' : ''; ?>
                                        <p class="column-description content-paragraph"><?php echo $description; ?></p>
                                    </div>
                                 </div>
                             </div>
                    <?php
                        endwhile;
                    ?>
                        </div> <!-- .row -->
                    <?php
                    }
                    
                }

                if(get_row_layout() == 'fullwidth_content'){
                    $fwTitle = get_sub_field('fullwidth_title');
                    $fwTextContent = get_sub_field('fullwidth_text_content');
                    $fwBGimage = get_sub_field('fullwidth_background_image');
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="white fullwidth cta-section" style="background-image: url(<?php echo  $fwBGimage;?>'); background-repeat: no-repeat;">
                            <div class="box"> 
                                <h3><?php echo  $fwTitle; ?></h3>
                                <div class="text"><?php echo  $fwTextContent; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }

                if(get_row_layout() == 'list_items'){
                    if(have_rows('list_item')){
                ?>
                    <div class="row">
                        <div class="col-12">
                            <ul class="icon-item">
                         <?php        while (have_rows('list_item')) : the_row(); 
                            $itemText = get_sub_field('item_text');
                            $itemIcon = get_sub_field('item_icon');
                        ?>
                             <li class="display-flex">
                                <span class="icon"><img src="<?php echo $itemIcon; ?>" /></span>
                                <span class="text content-paragraph"><?php echo  $itemText; ?></span>
                             </li>
                    <?php        endwhile; ?>
                            </ul>
                        </div>
                    </div>
                <?php
                    }
                    
                }

                
                if(get_row_layout() == 'separator'){
                    $color = get_sub_field('line_separator_color');
                    $width = get_sub_field('line_separator_width');
                    $height = get_sub_field('line_separator_height');
                    $marginTop = get_sub_field('margin_top');
                    $marginBottom = get_sub_field('margin_bottom');
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <p>
                            <span style="display: block; width:<?php echo $width; ?>; height:<?php echo $height; ?>; background-color:<?php echo $color; ?>; margin: <?php echo $marginTop; ?> 0 <?php echo $marginBottom; ?>;"></span>
                            </p>
                        </div>
                    </div>
                 <?php   
                }

                if(get_row_layout() == 'team_member'){

                    $columnSize = get_sub_field('set_column_size');
                    $columnCls = $columnSize < 4 ? 'col-md-4' : 'col-md-3';

                    if(have_rows('team_member')){
                    ?>
                        <div class="row members">
                    <?php
                            while(have_rows('team_member')) : the_row();
                                $memberImage = get_sub_field('member_image');
                                $memberName = get_sub_field('member_name');
                                $position    = get_sub_field('position');
                                $memberDesc = get_sub_field('member_description');
                    ?>
                                 <div class="<?= $columnCls; ?> member">
                                    <img src="<?= $memberImage; ?>" />
                                    <p class="name"><?= $memberName; ?></p>
                                    <p class="position"><?= $position; ?></p>
                    <?php
                                if(have_rows('member_detail')){
                    ?>
                                         <div class="details">
                                            <p class="name"><?= $memberName; ?></p>
                                            <p class="position"><?= $position; ?></p>
                                            <p class="member-description content-paragraph"><?= $memberDesc; ?></p>
                                    <?php
                                        if(have_rows('member_detail')){
                                    ?>
                                            <ul class="list">
                                    <?php 
                                            while(have_rows('member_detail')) : the_row();
                                            $title = get_sub_field('title');
                                            $description = get_sub_field('detail_description');
                                    ?>
                                            <li>
                                                 <span class="detail-title"><?= $title; ?></span>
                                                 <span class="detail-description"><?= $description; ?></span>
                                             </li>

                                        <?php  endwhile; ?>
                                            </ul>
                                     <?php   } ?>
                                        </div>
                            <?php    } ?>

                                </div>
                           <?php  endwhile; ?>
                        </div>
                <?php
                    }


                }
                if(get_row_layout() == 'brands'){
                    if(have_rows('brands')){
                ?>
            
                        <div class="row brands">
                            <?php while(have_rows('brands')) : the_row(); 
                                    $brandImage = get_sub_field('brand_image');
                                    $brandName = get_sub_field('brand_name');
                                    $brandUrl = get_sub_field('brand_url');

                                ?>
                                <div class="col-md-3">
                                    <p class="brand">
                                        <img src="<?php echo $brandImage;  ?>" />
                                    </p>
                                </div>
                            <?php endwhile; ?>
                        </div>

                <?php
                    }
                }

            endwhile;
        }

    ?>
</div>

