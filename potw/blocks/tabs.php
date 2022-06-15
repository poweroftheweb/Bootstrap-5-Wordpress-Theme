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
$fullWidth = get_field('full_width');
$tabs = get_field('tab_group');
$itemToShow = get_field('slides_to_show');
?>
<?php if($fullWidth){ ?>
</div>
</div>
<div class="breakout-container">
	<div class="curve">
		<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/bg-curve2.png">
	</div>
<?php } ?>
<div class="tabbed tabs <?php echo $sType; ?>-tabs" data-tabbed-control="control">
<?php if( $tabs ){ ?>
	<div class="nav">
	<?php $i = 0; foreach( $tabs as $tab ){ ?>
		<a href="#" data-tabbed-link="i<?php echo $i; ?>" <?php if($i == 0){?>class="active"<?php } ?>><?php echo $tab['title']; ?></a>
	<?php $i++; } ?>
	</div>
	<?php $i = 0; foreach( $tabs as $tab ){ ?>
  	<div data-tabbed-item<?php if($i == 0){?>="active"<?php } ?> id="i<?php echo $i; ?>" class="tab-content">
		<?php echo $tab['content']; ?>
	</div>
	<?php $i++; } ?>
<?php } ?>
</div>
<?php if($fullWidth){ ?>
	<div class="curve">
		<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/bg-curve3.png">
	</div>
</div>
<div class="content container">
<div class="content-area">
<?php } ?>