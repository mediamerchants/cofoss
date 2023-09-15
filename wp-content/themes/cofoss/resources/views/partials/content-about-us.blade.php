@php
$pageTitle = get_field('page_title');
$pageTitleSubtext = get_field('page_title_subtext');
$pageTitleBGImage = get_field('title_background_image');
$extraClass = get_field('extra_class');
@endphp

<div class="container page-content about">
    <div class="row">
        <div class="col-12">
            <div class="fullwidth" style="background-image: url({!! $pageTitleBGImage !!}); background-repeat: no-repeat;">
                @if($pageTitle)
                    <div class="box">
                        <h1 class="page-title {!! $extraClass !!} fade-in-up">{!! $pageTitle !!}</h1>
                        @if($pageTitleSubtext)
                            <p class="sub-text fade-in-up">{!! $pageTitleSubtext !!}</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
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
                        echo $sectionTitle ? '<h2 class="section-title fade-in-up">'.$sectionTitle.'</h2>' : '';
                        echo $sectionSubTitle ? '<p class="section-subtitle fade-in-up">'.$sectionSubTitle.'</p>' : '';
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
                                <div class="content-paragraph fade-in-up"><?= $paragraph; ?></div>
                            </div>
                        </div>
                    <?php
                    }

                }


                if(get_row_layout() == '2_column_layout'){
                    $extraClassColumn2 = get_sub_field('extra_class_column_2');
                    if(have_rows('2_column_content')){
                    ?>
                        <div class="row col2-layout <?= $extraClassColumn2; ?>">
                    <?php
                        while (have_rows('2_column_content')) : the_row();
                             $image = get_sub_field('image_content');
                             $title = get_sub_field('2_column_title');
                             $paragraph = get_sub_field('2_column_paragraph');

                            if($image){
                            ?>
                                <div class="col-md-6">
                                    <p class="2-col-2-img fade-in-up"><img src="<?= $image; ?>" /></p>
                                </div>
                            <?php
                            }
                            if($title || $paragraph){
                            ?>
                                <div class="col-md-6">
                                    <div class="col2-texts">
                                        <?php echo $title ? '<h3 class="col-2-title fade-in-up">'.$title.'</h3>' : ''; ?>
                                        <?php echo $paragraph ? '<p class="2-col-texts content-paragraph fade-in-up">'.$paragraph.'</p>' : ''; ?>
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
                    $extraClassCol3 = get_sub_field('extra_class_column_3');
                    if(have_rows('column_content')){
                    ?>
                        <div class="row col3-layout <?= $extraClassCol3; ?>">
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
                                <div class="col-content <?= $extraClass; ?>">
                                    <img class=" fade-in-up" src ="<?php echo $iconImg; ?>" />
                                    <div class="texts">
                                        <?php echo  $title ? '<h3 class="sea-blue col-title fade-in-up">'.$title.'</h3>' : ''; ?>
                                        <p class="column-description content-paragraph fade-in-up"><?php echo $description; ?></p>
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

                    if($fwTitle || $fwTextContent || $fwBGimage){
                ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="white fullwidth cta-section" style="background-image: url('<?=  $fwBGimage;?>'); background-repeat: no-repeat;">
                                    <div class="box"> 
                                        <?php echo $fwTitle ? '<h3 class=" fade-in-up">'.$fwTitle.'</h3>' : ''; ?>
                                        <?php echo $fwTextContent ? '<div class="text fade-in-up">'.$fwTextContent.'</div>': ''; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }

                if(get_row_layout() == 'list_items'){
                    if(have_rows('list_item')){
                ?>
                    <div class="row">
                        <div class="col-12">
                            <ul class="icon-item">
                         <?php while (have_rows('list_item')) : the_row(); 
                            $itemText = get_sub_field('item_text');
                            $itemIcon = get_sub_field('item_icon');
                        ?>
                             <li class="display-flex fade-in-up">
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
                            <p class="fade-in-up">
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
                                 <div class="<?= $columnCls; ?> col-sm-6 member fade-in-up">
                                    <img class="image" alt="<?= $memberName; ?>" src="<?= $memberImage; ?>" />
                                    <p class="name"><?= $memberName; ?></p>
                                    <p class="position arrow"><?= $position; ?></p>
                    <?php
                                if(have_rows('member_detail')){
                    ?>
                                    <div class="details">
                                        <div class="detail-content">
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
                                        </div> <!-- .detail-content -->
                                    </div>
                            <?php } ?>

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
                                <div class="col-md-3 col-sm-6">
                                    <p class="brand fade-in-up">
                                        <img alt="<?= $brandName; ?>" src="<?php echo $brandImage;  ?>" />
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

