<?php
$title_alignment = get_sub_field('title_alignment');
$paragraph_alignment = get_sub_field('paragraph_alignment');
$title = get_sub_field('title');
$heading_style = get_sub_field('heading_style');
$paragraph = get_sub_field('paragraph');
$paragraph_style = get_sub_field('paragraph_style');
$background_image = get_sub_field('background_image');
$arrow_down_centered = get_sub_field('arrow_down_centered');
if ($title_alignment === 'is-centered') {
  $title_align = 'has-text-centered';
} else {
  $title_align = 'has-text-left';
}
if ($paragraph_alignment === 'is-centered') {
  $paragraph_align = 'has-text-centered';
} else {
  $paragraph_align = 'has-text-left';
}

$background_color = '#d3f4ff';
$color = '#003478';

if ($background_image) {
  $background_color = 'transparent';
  $color = 'white';
}
?>
<section class="section">
  <div id="itg_block_<?php echo $block_id; ?>" class="itgBlock-hero-image swiper-container <?php if (get_sub_field('has_reduced_height')) {
                                                                                              echo 'has_reduced_height';
                                                                                            } ?>" style="color: <?php echo $color; ?>; background-color: <?php echo $background_color; ?>; background-image: url(<?php echo $background_image; ?>)">

    <div class="swiper-item columns is-variable is-12-desktop is-10-touch is-multiline is-marginless">
      <div class="column itgBlock-hero-image-container">
        <div class="columns is-12-desktop is-hidden-touch is-multiline <?php echo $title_alignment; ?>">
          <div class="<?php echo $title_align; ?>">
            <?php
            if (get_field("stampare_breadcrumbs") && $block_id === 0) {
              $breadcrumbs_color = get_field("colore_breadcrumbs") == "nero" ? "#000" : "#fff";

              if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs" style="color: ' . $breadcrumbs_color . '">', '</p>');
              }
            }
            ?>
            <h1>
              <?php echo $title ?>
              <?php echo $heading_style ?>
            </h1>
          </div>
        </div>
        <div class="itgBlock-hero-image__subtitle">
          <div class="<?php echo $paragraph_style ?> itgBlock-hero-image__subtitle--mobile-style">
            <?php echo $paragraph ?>
          </div>
        </div>
        <div class="itgBlock-hero-image__cta-list column is-5">
          <div class="itgBlock-hero-image__cta-list-inner columns">
            <?php
            while (have_rows('cta_list')) : the_row();
              $is_offset = 'is-offset-0';
              require 'atoms/ItgAtomCta.php';
            endwhile;
            ?>
          </div>
        </div>
        <?php if ($arrow_down_centered) { ?>
          <div class="itgBlock-hero-image__arrow-down is-flex is-justify-content-center">
            <a class="itgBlock-hero-image__arrow-down-image" href="#itg_block_<?php echo $block_id + 1; ?>">
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>