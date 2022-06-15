<?php

/**
 * Gallery Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values and assign defaults.

$group = get_field('group');
$args = array( 'post_type' => 'team', 'posts_per_page' => 300 );
$loop = new WP_Query( $args );
$i = 0;
?>
<div class="tabbed tabs team-list" data-tabbed-control="control">
<?php if( have_rows('group') ): ?>
    <ul class="nav nav-pills nav-fill nav-slide iso-filters filter option-set button-group" data-filter-group="type">
    <?php while( have_rows('group') ): the_row(); 
        $name = get_sub_field('group_name');
        $name_tag = str_replace(' ', '-', strtolower($name));
        ?>
        
        <li class="nav-item">
            <a href="#" data-tabbed-link="i<?php echo $i; ?>" class="<?php if($i == 0){?>active <?php } ?>h4 <?php echo $name_tag; ?>"><?php echo $name; ?></a>
        </li>
    <?php $i++; endwhile; ?>
    </ul>
<?php endif; ?>
</ul>
<hr>

<?php if( have_rows('group') ): ?>

  <?php $i = 0; while( have_rows('group') ): the_row(); 
        $name = get_sub_field('group_name');
        $name_tag = str_replace(' ', '-', strtolower($name));
        
    ?>
    <div data-tabbed-item<?php if($i == 0){?>="active"<?php } ?> id="i<?php echo $i; ?>" class="tab-content<?php if($i == 0){?> active<?php } ?>">
        <div class="row">
    <?php while( have_rows('group_items') ): the_row(); 
        $groupTitle = get_sub_field('group_type_title');
        $groupType = get_sub_field_object('group_type'); 
        $groupValue = $groupType['value'];
        $groupLabel = $groupType['choices'][$groupValue];
    ?>
    
        <?php if($groupTitle){ ?>
            <h3 title="<?php echo $groupLabel; ?>"><?php echo $groupLabel; ?></h3>
        <?php } ?>
    
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

          <?php
            $pClass = get_field('type', get_the_ID()); //leader, benefits, risk
            $string = get_the_title();
            $dataName   = preg_split('/\s+/', $string);
            $pTitle = get_field('title', get_the_ID());
            $medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
            $pClassItems = implode( ' ', (array)$pClass );
            
            if(in_array($groupValue, $pClass)){
    ?>

            <div class="col-xs-12 col-sm-4 col-md-3 item <?php echo $pClassItems; ?>" data-category="<?php echo $pClassItems; ?>">
                <div class="team-link animated">
                    <a class="fancy" data-fancybox="team<?php echo $i; ?>" data-animation-duration="700" data-src="#member-<?php the_ID(); ?>" href="javascript:;" title="<?php echo $string; ?>">
                        <div class="row">
                            <div class="col-xs-4 col-sm-12">
                                <div class="img square">
                                    <div class="front"></div>
                                    <div class="back" style="background-image:url(<?php echo $medium_image_url[0]; ?>);"></div>
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-12">
                                <?php
                                if(!empty($dataName[2])){
                                    $firstName = $dataName[0] . ' ' . $dataName[1];
                                    $lastName = $dataName[2];
                                }else{
                                    $firstName = $dataName[0];
                                    $lastName = $dataName[1];
                                }
                                ?>
                                <h4 title="<?php echo $string; ?>"><?php echo $firstName; ?> <span class="name"><?php echo $lastName; ?></span></h4>
                                <small>
                                    <?php echo $pTitle; ?><br>
                                    <?php if($pDepartment){echo $pDepartment;?><br><?php } ?>
                                    <div class="location"><?php echo $pLocation; ?></div>
                                </small>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
    <?php
    $pLinkedIn = get_field('linkedin', get_the_ID());
    $pEmail = get_field('email_', get_the_ID());
    $pPhone = get_field('phone_', get_the_ID());
    ?>
        <div style="display:none;" id="member-<?php the_ID(); ?>" class="team-content">
            <div class="row g-0">
                <div class="col-sm-5 team-img">
                    <div class="img" style="background-image:url(<?php echo $large_image_url[0]; ?>);"></div>
                </div>
                <div class="col-sm-7 team-details">
                    <div class="text">
                        <div class="row">
                            <div class="col">
                                <h3><?php the_title(); ?></h3><?php echo $pTitle; ?>
                                <?php if($pDepartment){echo $pDepartment;?><br><?php } ?>
                            <div class="location"><?php echo $pLocation; ?></div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="sm clearfix">
                                    <?php if(!empty($pLinkedIn)){ ?>
                                    <a href="<?php echo $pLinkedIn; ?>" class="fa fa-linkedin" target="_blank"><span></span></a>
                                    <?php } ?>
                                    <?php if(!empty($pPhone)){ ?>
                                    <a href="tel:<?php echo $pPhone; ?>" class="fa fa-phone" target="_blank"></a>
                                    <?php } ?>
                                    <?php if(!empty($pEmail)){ ?>
                                    <a href="mailto:<?php echo $pEmail; ?>" class="fa fa-envelope" target="_blank"></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="text-inner">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <?php } ?>   

        <?php endwhile; wp_reset_query(); ?>
    <?php endwhile; ?>
        </div>
        </div>
	<?php $i++; endwhile; ?>
    
<?php endif; ?>

</div>