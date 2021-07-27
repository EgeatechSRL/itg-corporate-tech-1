<?php

/**
	* The header for our theme
	*
	* This is the template that displays all of the <head> section and everything up until <div id="content">
	*
	* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	*
	* @package Itg_Sustainability
	*/

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<?php
			$left_menu = wp_get_nav_menu_items('pre-header-left-side');
			$reshape_menu = pre_header_menu_reshape($left_menu);

			foreach ($reshape_menu as $key => $item) {
			?>
<<<<<<< Updated upstream
			<div id="Itg_PreHeaderData_<?php echo $key; ?>" class="itgPreHeader__bottomSide" data-menu-id="Itg_PreHeaderData_<?php echo $key; ?>">
				<div class="columns">
=======
			    <div id="Itg_PreHeaderData_<?php echo $key; ?>" class="itgPreHeader__bottomSide" data-menu-id="Itg_PreHeaderData_<?php echo $key; ?>">
				    <div class="columns">
>>>>>>> Stashed changes
					<?php
						foreach ($item as $label => $content) {
							foreach ($content as $c => $data) {
						?>
					<div class="column">
						<ul class="Itg_PreHeaderData_submenu">
							<?php
							foreach ($data as $d => $data_info) {
								$reshape_menu_item_title = $data_info->title;
								$reshape_menu_item_url = $data_info->url;
								$reshape_menu_item_target = $data_info->target;
								$reshape_menu_item_ID = $data_info->ID;
								$reshape_label = get_field('label_submenu', $left_menu_item_ID);
							?>
								<?php if ($label && $c == 0 && $d == 0 && is_string($label)) { ?>
									<li class="itg_submenulabel"><span><?php echo $label; ?></span></li>
								<?php } ?>
								<li><a href="<?php echo $reshape_menu_item_url; ?>"><?php echo $reshape_menu_item_title; ?></a></li>
							<?php } ?>
						</ul>
					</div>
					<?php }
						} ?>
				</div>
<<<<<<< Updated upstream
			</div>
=======
			    </div>
>>>>>>> Stashed changes
			<?php } ?>
			<div class="itgPreHeader itg-px-56 is-hidden-touch">
				<div class="itgPreHeader__leftSide">
					<?php
					$left_menu = wp_get_nav_menu_items('pre-header-left-side');
					if ($left_menu) : echo '<span class="itg_preheader-left_label">In evidenza&nbsp;</span>';
					endif;
					foreach ($left_menu as $key => $left_menu_item) {
						if ($left_menu_item->menu_item_parent == 0) {
							$left_menu_item_title = $left_menu_item->title;
							$left_menu_item_url = $left_menu_item->url;
							$left_menu_item_target = $left_menu_item->target;
							$left_menu_item_ID = $left_menu_item->ID;
							$left_menu_icon_image = get_field('image_icon', $left_menu_item_ID);
					?>
					<div class="itg_a_container">
						<a id="itg_a_button_<?php echo $key; ?>" data-target="Itg_PreHeaderData_<?php echo $left_menu_item_ID; ?>" class="itgPreHeader--singleItem itg-mr-10">
							<?php
									if ($left_menu_icon_image) {
									?>
							<img id="itg_a_image_<?php echo $key; ?>" class="itg-mr-10" src="<?php echo $left_menu_icon_image; ?>" alt="<?php echo $left_menu_item_title; ?>">
							<?php } ?>
							<?php echo $left_menu_item_title; ?></a>
					</div>
					<?php
						}
						?>
					<?php
					}
					?>
					<div class="Itg_stock_update">
						<div id="title-perc"></div>
						<div class="lastprice">
							<?php _e('Ultimo prezzo'); ?>
						</div>
						<div id="title-price"></div> €
						<script type="text/javascript">
							jQuery.ajax({
								url: "https://syndication.teleborsa.it/Italgas/Feeds/jsonValues",
								method: "get",
								success: function(result) {
									jQuery("#title-perc").text(result.percentChange);
									jQuery("#title-price").text(result.lastTrade);
								}
							});
						</script>
					</div>
					<?php
					if (get_field('news', $left_menu_item->news)) {
					?>
					<a class="itgPreHeader--singleItem itg-mr-10">
						<?php echo $left_menu_item->news; ?>
					</a>
					<?php
					}
					?>
				</div>
				<div class=" itgPreHeader__rightSide">
					<?php $links_menu = wp_get_nav_menu_items('links-menu');
					if ($links_menu) :
						foreach ($links_menu as $key => $links_menu_item) {
							$links_menu_item_ID = $links_menu_item->ID;
							$links_menu_item_title = $links_menu_item->post_title;
							$links_menu_item_url = $links_menu_item->url;
							$links_menu_item_target = $links_menu_item->target;
					?>
					<?php
							if (get_field('image_icon', $links_menu_item_ID)) {
							?>
					<a target="_blank" href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image">
						<img class="itg-mr-10" src="<?php echo get_field('image_icon', $links_menu_item_ID); ?>" alt="<?php echo $links_menu_item_title; ?>">
					</a>
					<?php
							} else if (get_field('link_tipology', $links_menu_item_ID) === 'linblank') {
							?>
					<a target="_blank" href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linblank">
						<?php echo $links_menu_item_title; ?>
						<img class="itg-mr-10" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/external_page_blue.svg" alt="<?php echo $links_menu_item_title; ?>">
					</a>
					<?php
							} else if (get_field('link_tipology', $links_menu_item_ID) === 'linkself') {
							?>
					<a href="<?php echo $links_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linkself">
						<?php echo $links_menu_item_title; ?>
						<img class="itg-mr-10" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/internal_page_blue.svg" alt="<?php echo $links_menu_item_title; ?>">
					</a>
					<?php } else { ?>
					<p class="itgPreHeader--singleItem itg-mr-10"><?php echo $links_menu_item_title; ?></p>
					<?php } ?>
					<?php
						}
					endif;
					?>
					<?php
					$right_menu = wp_get_nav_menu_items('pre-header-right-side');


					foreach ($right_menu as $key => $right_menu_item) {
						$right_menu_item_ID = $right_menu_item->ID;
						$right_menu_item_title = $right_menu_item->post_title;
						$right_menu_item_url = $right_menu_item->url;
						$right_menu_item_target = $right_menu_item->target;

					?>
					<?php
						if (get_field('image', $right_menu_item_ID)) {
						?>
					<a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image">
						<img class="itg-mr-10" src="<?php echo get_field('image', $right_menu_item_ID); ?>" alt="<?php echo $right_menu_item_title; ?>">
					</a>
					<?php
						} else if (get_field('link_tipology', $right_menu_item_ID) === 'linblank') {
						?>
					<a target="_blank" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linblank">
						<?php echo $right_menu_item_title; ?>
						<img class="itg-mr-10" src="<?php echo get_template_directory_uri() . '/dist/src/images/external_page_blue.svg' ?>" alt="<?php echo $right_menu_item_title; ?>">
					</a>
					<?php
						} else if (get_field('link_tipology', $right_menu_item_ID) === 'linkself') {
						?>
					<a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linkself">
						<?php echo $right_menu_item_title; ?>
						<img class="itg-mr-10" src="<?php echo get_template_directory_uri() . '/dist/src/images/internal_page_blue.svg' ?>" alt="<?php echo $right_menu_item_title; ?>">
					</a>
					<?php } else { ?>
					<p class="itgPreHeader--singleItem itg-mr-10"><?php echo $right_menu_item_title; ?></p>
					<?php
						}
						?>
					<?php
					}
					?>
					<!-- Selettore Lingua WPML -->
					<?php do_action( 'wpml_add_language_selector' ); ?>
				</div>
			</div>
<<<<<<< Updated upstream
			<nav class="navbar" aria-label="main navigation">
				<button id="main-menu-toggle" class="button navbar-burger" data-target="main-menu" aria-controls="main-menu" aria-haspopup="true" aria-label="Menu Button" aria-pressed="false">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</button>

				<div class="navbar-brand navbar-brand-centered">
					<a class="navbar-item" href="<?php echo esc_url( home_url( '/' ) );?>">
						<img class="itgHeader--logo" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/ITG_logo_positivo.png" alt="Logo Italgas">
					</a>
				</div>
				<div id="main_search is-hidden-desktop">
				</div>
					<nav id="main-menu" class="main-menu navbar-menu Itg-hero-menu-lower itgMainMenu__container is-hidden-desktop">
						<ul class="main-menu__list" id="main-menu__list">
						<?php
						$menuitems = wp_get_nav_menu_items('main-menu');

						$submenu = false;
						$level = 0;
						$count = 0;
						$stack = array('0');
						foreach( $menuitems as $key => $item ):
							while($item->menu_item_parent != array_pop($stack)) {
									$level--;
								}
								$level++;
								$stack[] = $item->menu_item_parent;
								$stack[] = $item->ID;
								$menuitems[$key]->classes[] = ''. ($level - 1);
								$link = $item->url;
								$title = $item->title;
								$anchor_level = $item->classes[1];
								// item does not have a parent so menu_item_parent equals 0 (false)
								if ( !$item->menu_item_parent ):

								// save this id for later comparison with sub-menu items
								$parent_id = $item->ID;

						?>

						<li class="main-menu__item main-menu__item--with-child">

								<a href="<?php echo $link; ?>" class="main-menu__link level-<?php echo $anchor_level;  ?>" data-childLevel="<?php echo $anchor_level + 1; ?>">
										<?php echo $title; ?>
								</a>
						<?php endif; ?>

								<?php if ( $parent_id == $item->menu_item_parent ): ?>

										<?php if ( !$submenu ): $submenu = true; ?>

										<ul class="main-menu__list main-menu__list--child">
												<?php
												$titleparent = get_post( $parent_id )->post_title;
												$subitemparent = get_post( $parent_id );

												?>
												<button class="main-menu__back" type="button" data-childLevel="<?php echo ($anchor_level - 1); ?>"><?php echo $titleparent; ?></button>
												<?php endif; ?>

													<li class="main-menu__item main-menu__item--with-child">
															<a href="<?php echo $link; ?>" class="main-menu__link level-<?php echo $anchor_level;  ?>" data-childLevel="<?php echo ($anchor_level + 1); ?>"><?php echo $title; ?></a>
													</li>

											<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
											</ul>
										<?php $submenu = false; endif; ?>

								<?php endif; ?>

						<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
						</li>
						<?php $submenu = false; endif; ?>


						<?php $count++; endforeach; ?>

						</ul>


						<div class="Itg_mobile_menu_right_container">
						<?php
						$right_menu = wp_get_nav_menu_items('pre-header-right-side');


						foreach ($right_menu as $key => $right_menu_item) {
							$right_menu_item_ID = $right_menu_item->ID;
							$right_menu_item_title = $right_menu_item->post_title;
							$right_menu_item_url = $right_menu_item->url;
							$right_menu_item_target = $right_menu_item->target;

						?>
						<?php
							if (get_field('image', $right_menu_item_ID)) {
							?>
						<a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image">
							<img class="itg-mr-10" src="<?php echo get_field('image', $right_menu_item_ID); ?>" alt="<?php echo $right_menu_item_title; ?>">
						</a>
						<?php
							} else if (get_field('link_tipology', $right_menu_item_ID) === 'linblank') {
							?>
						<a target="_blank" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linblank">
							<?php echo $right_menu_item_title; ?>
							<img class="itg-mr-10" src="<?php echo get_template_directory_uri() . '/dist/src/images/external_page_blue.svg' ?>" alt="<?php echo $right_menu_item_title; ?>">
						</a>
						<?php
							} else if (get_field('link_tipology', $right_menu_item_ID) === 'linkself') {
							?>
						<a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linkself">
							<?php echo $right_menu_item_title; ?>
							<img class="itg-mr-10" src="<?php echo get_template_directory_uri() . '/dist/src/images/internal_page_blue.svg' ?>" alt="<?php echo $right_menu_item_title; ?>">
						</a>
						<?php } else { ?>
						<p class="itgPreHeader--singleItem itg-mr-10"><?php echo $right_menu_item_title; ?></p>
						<?php
							}
							?>
						<?php
						}
						?>
						<!-- Selettore Lingua WPML -->
						<?php do_action( 'wpml_add_language_selector' ); ?>
						</div>
					</nav>
				<div id="mega-menu" class="navbar-menu Itg-hero-menu-lower is-hidden-touch">
					<div class="navbar-start">
						<?php
								$main_mega_menu = wp_get_nav_menu_items('main-mega-menu');
								$itg_submenu_label = get_field('label_submenu', $left_menu_item_ID);
								foreach ($main_mega_menu as $key => $main_menu_item) {

											$main_menu_item_ID = $main_menu_item->ID;
											$main_menu_item_title = $main_menu_item->title;
											$main_menu_item_url = $main_menu_item->url;
											$main_menu_item_target = $main_menu_item->target;
											$main_menu_item_class = $main_menu_item->classes[1];
											$itg_megamenu_bgimage = get_field('background_image', $main_menu_item_ID);
											$itg_megamenu_title = get_field('title_menu', $main_menu_item_ID);
											$itg_megamenu_subtitle = get_field('subtitle_menu', $main_menu_item_ID);
											$itg_megamenu_cta = get_field('cta_link', $main_menu_item_ID);
											$itg_megamenu_cta_name = $main_menu_item->post_name;
								?>
						<div class="navbar-item has-dropdown is-mega">
							<div class="navbar-trigger navbar-link flex <?php echo $main_menu_item_class; ?>">
								<span id="itg_header_tab_span_<?php echo $main_menu_item_ID; ?>"><?php echo $main_menu_item_title; ?></span>
							</div>
							<div id="Itg-hero-menu__<?php echo $main_menu_item_ID; ?>Dropdown" class="<?php echo $main_menu_item_class; ?> navbar-dropdown is-link is-hide" style="background-image: url(' <?php echo $itg_megamenu_bgimage; ?>');" data-style="width: 18rem;">

								<div class="itg_bg_heromenu is-fluid">

									<div class="itg__rowtitle">
										<div class="Itg-hero-menu-upper columns is-flex is-vcentered is-multiline">
											<div class="Itg-hero-menu-upper-left column is-6">
												<span><?php echo $itg_megamenu_title; ?></span>
												<p><?php echo $itg_megamenu_subtitle; ?></p>
											</div>
											<div class="Itg-hero-menu-upper-right column is-6">

												<?php if ($itg_megamenu_cta_name == 'servizi') { ?>
												<div class="columns">

													<?php
																			// Check rows exists.
																				if( have_rows('launch_megamenu', $main_menu_item_ID) ):

																						// Loop through rows.
																						while( have_rows('launch_megamenu', $main_menu_item_ID) ) : the_row();
																								$cta_megamenu_title =  get_sub_field('cta_title', $main_menu_item_ID);
																								$cta_megamenu_link	= get_sub_field('cta_link', $main_menu_item_ID);
																								$cta_megamenu_image = get_sub_field('cta_image', $main_menu_item_ID); ?>
													<div class="column is-6">
														<div class="Itg_mega_menu_cta">
															<a href="<?php echo $cta_megamenu_link; ?>">
																<div class="img_cta_megamnu"><img src="<?php echo $cta_megamenu_image; ?>" width="80" height="80" /></div>
																<p><?php echo $cta_megamenu_title; ?></p>
																<img class="linkIcon" src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
															</a>
														</div>
													</div>

													<?php  // End loop.
																						endwhile;

																				// No value.
																				else :
																						// Do something...
																				endif;
																				?>
												</div>
												<?php } else { ?>
												<?php
																			// Check rows exists.
																				if( have_rows('launch_megamenu', $main_menu_item_ID) ):

																						// Loop through rows.
																						while( have_rows('launch_megamenu', $main_menu_item_ID) ) : the_row();
																								$cta_megamenu_title =  get_sub_field('cta_title', $main_menu_item_ID);
																								$cta_megamenu_link	= get_sub_field('cta_link', $main_menu_item_ID);
																								$cta_megamenu_image = get_sub_field('cta_image', $main_menu_item_ID); ?>

												<div class="Itg_mega_menu_cta">
													<a href="<?php echo $cta_megamenu_link; ?>">
														<div class="img_cta_megamnu"><img src="<?php echo $cta_megamenu_image; ?>" width="80" height="80" /></div>
														<p><?php echo $cta_megamenu_title; ?></p>
														<img class="linkIcon" src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
													</a>
												</div>


												<?php  // End loop.
																						endwhile;

																				// No value.
																				else :
																						// Do something...
																				endif;
																				?>

												<?php } ?>

											</div>
										</div>
									</div>


									<div class="itg_bg_herocolumnsmenu">
										<div class="itg__columns-menus">
											<div class="columns Itg-hero-menu-lower">

												<div class="column is-12 ItgLeftTabs">
													<div class="Itg-hero-menu-lower-left-tabs is-flex-direction-row is-justify-content-space-between is-align-items-center">

														<div class="columns">

															<div class="Itg_mega_menu_cta column is-3">
																<ul class="itg_navtabs">
																	<?php // Check rows exists.
																										$main_menu_item_ID = $main_menu_item->ID;
																							$main_menu_item_title = $main_menu_item->title;
																							$main_menu_item_url = $main_menu_item->url;
																							$main_menu_item_target = $main_menu_item->target;
																							$main_menu_item_class = $main_menu_item->classes[1];
																							$itg_megamenu_cta = get_field('cta_link', $main_menu_item_ID);

																					if( have_rows('tabs_links', $main_menu_item_ID) ):
																					$i=0;
																							// Loop through rows.
																							while( have_rows('tabs_links', $main_menu_item_ID) ) : the_row();
																									$cta_megamenu_tabslink	= get_sub_field('tab_link', $main_menu_item_ID);
																									$cta_megamenu_tabscontent	= get_sub_field('tab_content', $main_menu_item_ID);
																									$cta_megamenu_tabsid	= get_sub_field('tab_id', $main_menu_item_ID);
																									$fields = get_fields($main_menu_item_ID);


																									?>

																	<li class="">
																		<span href="" data-name="<?php echo $cta_megamenu_tabsid; ?>" class="is-narrow <?php if($i==0) { $i=1; echo 'active is-active'; } ?>" data-toggle="tab" aria-controls="<?php echo $cta_megamenu_tabsid; ?>">
																			<?php echo $cta_megamenu_tabslink; ?>

																		</span>
																	</li>

																	<?php  // End loop.
																										endwhile;

																								// No value.
																								else :
																										// Do something...
																								endif;
																								?>

																</ul>
															</div>

															<div class="Itg-hero-menu-lower-central column is-9 tab-content">

																<?php // Check rows exists.
																										if( have_rows('tabs_links', $main_menu_item_ID) ):
																										$i=0;
																												// Loop through rows.
																												while( have_rows('tabs_links', $main_menu_item_ID) ) : the_row();
																														$cta_megamenu_tabslink	= get_sub_field('tab_link', $main_menu_item_ID);
																														$cta_megamenu_tabscontent	= get_sub_field('tab_content', $main_menu_item_ID);
																														$cta_megamenu_tabsid	= get_sub_field('tab_id', $main_menu_item_ID);
																														$cta_megamenu_tabstitle	= get_sub_field('title_content', $main_menu_item_ID);
																														$cta_megamenu_tabsscdncolumn	= get_sub_field('tab_content_2ndcolumn', $main_menu_item_ID);

																														?>
																<div class="tab-pane <?php echo $cta_megamenu_tabsid; ?> <?php if($i==0) { $i=1; echo 'active'; } ?>" role="tabpanel" aria-labelledby="<?php echo $cta_megamenu_tabsid; ?>">
																	<div class="columns is-multiline">
																		<div class="column is-12">
																			<?php if($cta_megamenu_tabstitle) :  ?>
																			<p><strong><?php echo $cta_megamenu_tabstitle; ?></strong></p>
																			<hr>
																			<?php endif; ?>
																		</div>
																		<?php if($cta_megamenu_tabsscdncolumn) {  ?>
																		<div class="column is-6">
																			<?php echo $cta_megamenu_tabscontent; ?>
																		</div>
																		<div class="column is-6">
																			<?php echo $cta_megamenu_tabsscdncolumn; ?>
																		</div>
																		<?php } else { ?>
																		<div class="column is-12">
																			<?php echo $cta_megamenu_tabscontent; ?>
																		</div>
																		<?php } ?>
																	</div>

																</div>
																<?php  // End loop.
																															endwhile;

																													// No value.
																													else :
																															// Do something...
																													endif;
																													?>
															</div>

														</div>


													</div>

												</div>

											</div>

											<!--
																								<div class="column is-3 launchlinks">
																									<div class="is-flex is-flex-direction-row is-align-items-center">
																										<a>Scopri anche</a>
																										<img src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
																										</div>
																							</div>
																							-->
											<div>

											</div>

										</div>

									</div>

								</div>

							</div>
						</div>

						<?php } ?>

					</div>
				</div>
			</nav>
	</div>




	</header><!-- #masthead -->
=======
                <nav class="navbar" aria-label="main navigation">
                    <button id="main-menu-toggle" class="button navbar-burger" data-target="main-menu" aria-controls="main-menu" aria-haspopup="true" aria-label="Menu Button" aria-pressed="false">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </button>

                    <div class="navbar-brand navbar-brand-centered">
                        <a class="navbar-item" href="<?php echo esc_url( home_url( '/' ) );?>">
                            <img class="itgHeader--logo" src="<?php echo get_template_directory_uri(); ?>/dist/src/images/ITG_logo_positivo.png" alt="Logo Italgas">
                        </a>
                    </div>
                    <div id="main_search is-hidden-desktop">
                    </div>
                            <nav id="main-menu" class="main-menu navbar-menu Itg-hero-menu-lower itgMainMenu__container is-hidden-desktop">

                                <?php

                                function hasChild($menu, $parent){

                                    $submenu = array();  // all menu items under $menuID
                                    foreach($menu as $item){
                                        if($item->menu_item_parent == $parent)
                                            $submenu[] = $item;
                                    }

                                    if ($submenu) { // if we found any
                                        return true;
                                    }
                                }

                                function getMenuChilds($menu, $parent, $level){

                                    $submenu = array();  // all menu items under $menuID
                                    foreach($menu as $item){
                                        if($item->menu_item_parent == $parent)
                                            $submenu[] = $item;
                                    }

                                    if ($submenu) { // if we found any
                                        $level++;
                                        foreach($submenu as $menuItem){

                                            $child = hasChild($menu, $menuItem->ID);

                                            $hasChildrenClass = $child
                                                ? 'main-menu__item--with-child'
                                                : '';

                                            echo "<li class='main-menu__item $hasChildrenClass'>";

                                            if ($hasChildrenClass) {
                                                $previousDepth = (int)$level - 1;
                                                echo "<a href='{$menuItem->url}' class='main-menu__link level-{$previousDepth}' data-childLevel='{$level}'>{$menuItem->title}</a>";

                                                echo '<ul class="main-menu__list main-menu__list--child">';
                                                echo "<button class='main-menu__back' type='button' data-childLevel='{$previousDepth}'>{$menuItem->title}</button>";

                                                getMenuChilds($menu, $menuItem->ID, $level);

                                                echo '</ul>';


                                            } else {
                                                echo "<a href='{$menuItem->url}' class='main-menu_url'>{$menuItem->title}</a>";
                                            }


                                            echo '</li>';


                                        }
                                    }
                                }






                                /*$base = array_filter(
                                    $menuitems,
                                    function($itemx) {
                                        return !$itemx->menu_item_parent;
                                    }
                                );


                                foreach ( $base as $navItem ) {

                                    echo ($navItem->ID . ") ");
                                    echo ($navItem->title);
                                    echo(": " . $navItem->menu_item_parent);
                                    echo("<br>");
                                    echo("<br>");

                                    //echo '<li><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';
                                }*/
                                /*
                                function buildHierarchy($parentNode, $childDepth, &$remainingItems) {

                                    $children = [];
                                    foreach($remainingItems as $index => $item) {
                                        if ($item->menu_item_parent == $parentNode->ID) {
                                            $children[] = $item;
                                            unset($remainingItems[$index]);
                                        }
                                    }

                                    foreach ($children as $child) {
                                        $child->depth = $childDepth;
                                        $child->parentNode = $parentNode;
                                        $child->children = buildHierarchy($child, $childDepth + 1, $remainingItems);
                                    }

                                    return $children;
                                }
                                $nodeHierarchy = array_filter(
                                    $menuitems,
                                    function($item) {
                                        return !$item->menu_item_parent;

                                    }
                                );
                                $currentParentNodeIndex = 0;
                                while (count($menuitems) && array_key_exists($currentParentNodeIndex, $nodeHierarchy)) {

                                    $currentNode = $nodeHierarchy[$currentParentNodeIndex];
                                    $currentNode->depth = 0;
                                    $currentNode->parentNode = null;
                                    $currentNode->children = buildHierarchy($currentNode, 1, $menuitems);
                                    $currentParentNodeIndex += 1;

                                }
                                function renderHierarchy($menuItem) {
                                    $hasChildrenClass = !empty($menuItem->children)
                                        ? 'main-menu__item--with-child'
                                        : '';

                                    echo "<li class='main-menu__item $hasChildrenClass'>";

                                        if ($hasChildrenClass) {
                                            $nextDepth = (int)$menuItem->depth + 1;
                                            echo "<a href='{$menuItem->url}' class='main-menu__link level-{$menuItem->depth}' data-childLevel='{$nextDepth}'>{$menuItem->title}</a>";
                                        } else {
                                            echo "<a href='{$menuItem->url}' class='main-menu_url'>{$menuItem->title}</a>";
                                        }

                                        if (!empty($menuItem->children)) {
                                            echo '<ul class="main-menu__list main-menu__list--child">';

                                            // Back button, if parent node exists
                                            $previousDepth = (int)$menuItem->depth - 1;
                                            echo "<button class='main-menu__back' type='button' data-childLevel='{$previousDepth}'>{$menuItem->title}</button>";

                                            // Menu links
                                            foreach($menuItem->children as $childItem) {
                                                $hasChildrenClass = !empty($childItem->children)
                                                    ? 'main-menu__item--with-child'
                                                    : '';

                                                    echo "<li class='main-menu__item $hasChildrenClass'>";

                                                    if (!empty($childItem->children)) {
                                                        $nextChildDepth = (int)$childItem->depth + 1;
                                                        echo "<a href='#' class='main-menu__link level-{$childItem->depth}' data-childLevel='{$nextChildDepth}'>{$childItem->title}</a>";
                                                    } else {
                                                        echo "<a href='{$childItem->url}' class='main-menu_url'>{$childItem->title}</a>";
                                                    }
                                                    ?>
                                                    <ul class="main-menu__list main-menu__list--child third_child level_<?php echo $childItem->depth; ?>">

                                                        <?php
                                                        $previousDepth = (int)$menuItem->depth + 1;
                                                        $menuchildparentid = $childItem->children[0]->menu_item_parent;
                                                        $menu_itemsparent = wp_get_nav_menu_object($menuchildparentid);
                                                        $menuchildparenttitle = get_the_title( $menuchildparentid );

                                                        echo "<button class='main-menu__back' type='button' data-childLevel='{$previousDepth}'>{$childItem->title}</button>";
                                                        ?>
                                                        <?php
                                                        for ($i = 0; $i < count($childItem->children); $i++) {
                                                        ?>
                                                        <li class="main-menu__item">
                                                            <a href='<?php echo $childItem->children[$i]->url; ?>' class='main-menu_url level-<?php echo $childItem->children[$i]->depth; ?>''><?php echo $childItem->children[$i]->title; ?></a>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                    <?php echo '</li>';
                                                }

                                            echo '</ul>';
                                        }

                                    echo '</li>';

                                }
*/
                                ?>

                                <ul class="main-menu__list" id="main-menu__list">
                                <?php
                                $menuitems = wp_get_nav_menu_items('main-menu');
                                getMenuChilds($menuitems,0,0);


                                //foreach($nodeHierarchy as $menuItem) {
                                    //renderHierarchy($menuItem);
                                //}
                                ?>
                                </ul>


                            <div class="Itg_mobile_menu_right_container">
                            <?php
                            $right_menu = wp_get_nav_menu_items('pre-header-right-side');


                            foreach ($right_menu as $key => $right_menu_item) {
                                $right_menu_item_ID = $right_menu_item->ID;
                                $right_menu_item_title = $right_menu_item->post_title;
                                $right_menu_item_url = $right_menu_item->url;
                                $right_menu_item_target = $right_menu_item->target;

                            ?>
                            <?php
                                if (get_field('image', $right_menu_item_ID)) {
                                ?>
                            <a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image">
                                <img class="itg-mr-10" src="<?php echo get_field('image', $right_menu_item_ID); ?>" alt="<?php echo $right_menu_item_title; ?>">
                            </a>
                            <?php
                                } else if (get_field('link_tipology', $right_menu_item_ID) === 'linblank') {
                                ?>
                            <a target="_blank" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linblank">
                                <?php echo $right_menu_item_title; ?>
                                <img class="itg-mr-10" src="<?php echo get_template_directory_uri() . '/dist/src/images/external_page_blue.svg' ?>" alt="<?php echo $right_menu_item_title; ?>">
                            </a>
                            <?php
                                } else if (get_field('link_tipology', $right_menu_item_ID) === 'linkself') {
                                ?>
                            <a target="<?php echo $right_menu_item_target; ?>" href="<?php echo $right_menu_item_url; ?>" class="itgPreHeader--singleItem itg_a_image itg_linkself">
                                <?php echo $right_menu_item_title; ?>
                                <img class="itg-mr-10" src="<?php echo get_template_directory_uri() . '/dist/src/images/internal_page_blue.svg' ?>" alt="<?php echo $right_menu_item_title; ?>">
                            </a>
                            <?php } else { ?>
                            <p class="itgPreHeader--singleItem itg-mr-10"><?php echo $right_menu_item_title; ?></p>
                            <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                            <!-- Selettore Lingua WPML -->
                            <?php do_action( 'wpml_add_language_selector' ); ?>
                            </div>
                        </nav>
                    <div id="mega-menu" class="navbar-menu Itg-hero-menu-lower is-hidden-touch">
                        <div class="navbar-start">
                            <?php
                                    $main_mega_menu = wp_get_nav_menu_items('main-mega-menu');
                                    $itg_submenu_label = get_field('label_submenu', $left_menu_item_ID);
                                    foreach ($main_mega_menu as $key => $main_menu_item) {

                                                $main_menu_item_ID = $main_menu_item->ID;
                                                $main_menu_item_title = $main_menu_item->title;
                                                $main_menu_item_url = $main_menu_item->url;
                                                $main_menu_item_target = $main_menu_item->target;
                                                $main_menu_item_class = $main_menu_item->classes[1];
                                                $itg_megamenu_bgimage = get_field('background_image', $main_menu_item_ID);
                                                $itg_megamenu_title = get_field('title_menu', $main_menu_item_ID);
                                                $itg_megamenu_subtitle = get_field('subtitle_menu', $main_menu_item_ID);
                                                $itg_megamenu_cta = get_field('cta_link', $main_menu_item_ID);
                                                $itg_megamenu_cta_name = $main_menu_item->post_name;
                                    ?>
                            <div class="navbar-item has-dropdown is-mega">
                                <div class="navbar-trigger navbar-link flex <?php echo $main_menu_item_class; ?>">
                                    <span id="itg_header_tab_span_<?php echo $main_menu_item_ID; ?>"><?php echo $main_menu_item_title; ?></span>
                                </div>
                                <div id="Itg-hero-menu__<?php echo $main_menu_item_ID; ?>Dropdown" class="<?php echo $main_menu_item_class; ?> navbar-dropdown is-link is-hide" style="background-image: url(' <?php echo $itg_megamenu_bgimage; ?>');" data-style="width: 18rem;">

                                    <div class="itg_bg_heromenu is-fluid">

                                        <div class="itg__rowtitle">
                                            <div class="Itg-hero-menu-upper columns is-flex is-vcentered is-multiline">
                                                <div class="Itg-hero-menu-upper-left column is-6">
                                                    <span><?php echo $itg_megamenu_title; ?></span>
                                                    <p><?php echo $itg_megamenu_subtitle; ?></p>
                                                </div>
                                                <div class="Itg-hero-menu-upper-right column is-6">

                                                    <?php if ($itg_megamenu_cta_name == 'servizi') { ?>
                                                    <div class="columns">

                                                        <?php
                                                                                // Check rows exists.
                                                                                    if( have_rows('launch_megamenu', $main_menu_item_ID) ):

                                                                                            // Loop through rows.
                                                                                            while( have_rows('launch_megamenu', $main_menu_item_ID) ) : the_row();
                                                                                                    $cta_megamenu_title =  get_sub_field('cta_title', $main_menu_item_ID);
                                                                                                 $cta_megamenu_link	= get_sub_field('cta_link', $main_menu_item_ID);
                                                                                                    $cta_megamenu_image = get_sub_field('cta_image', $main_menu_item_ID); ?>
                                                        <div class="column is-6">
                                                            <div class="Itg_mega_menu_cta">
                                                                <a href="<?php echo $cta_megamenu_link; ?>">
                                                                    <div class="img_cta_megamnu"><img src="<?php echo $cta_megamenu_image; ?>" width="80" height="80" /></div>
                                                                    <p><?php echo $cta_megamenu_title; ?></p>
                                                                    <img class="linkIcon" src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <?php  // End loop.
                                                                                            endwhile;

                                                                                    // No value.
                                                                                    else :
                                                                                            // Do something...
                                                                                    endif;
                                                                                    ?>
                                                    </div>
                                                    <?php } else { ?>
                                                    <?php
                                                                                // Check rows exists.
                                                                                    if( have_rows('launch_megamenu', $main_menu_item_ID) ):

                                                                                            // Loop through rows.
                                                                                            while( have_rows('launch_megamenu', $main_menu_item_ID) ) : the_row();
                                                                                                    $cta_megamenu_title =  get_sub_field('cta_title', $main_menu_item_ID);
                                                                                                 $cta_megamenu_link	= get_sub_field('cta_link', $main_menu_item_ID);
                                                                                                    $cta_megamenu_image = get_sub_field('cta_image', $main_menu_item_ID); ?>

                                                    <div class="Itg_mega_menu_cta">
                                                        <a href="<?php echo $cta_megamenu_link; ?>">
                                                            <div class="img_cta_megamnu"><img src="<?php echo $cta_megamenu_image; ?>" width="80" height="80" /></div>
                                                            <p><?php echo $cta_megamenu_title; ?></p>
                                                            <img class="linkIcon" src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
                                                        </a>
                                                    </div>


                                                    <?php  // End loop.
                                                                                            endwhile;

                                                                                    // No value.
                                                                                    else :
                                                                                            // Do something...
                                                                                    endif;
                                                                                    ?>

                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="itg_bg_herocolumnsmenu">
                                            <div class="itg__columns-menus">
                                                <div class="columns Itg-hero-menu-lower">

                                                    <div class="column is-12 ItgLeftTabs">
                                                        <div class="Itg-hero-menu-lower-left-tabs is-flex-direction-row is-justify-content-space-between is-align-items-center">

                                                            <div class="columns">

                                                                <div class="Itg_mega_menu_cta column is-3">
                                                                    <ul class="itg_navtabs">
                                                                        <?php // Check rows exists.
                                                                                                            $main_menu_item_ID = $main_menu_item->ID;
                                                                                                $main_menu_item_title = $main_menu_item->title;
                                                                                                $main_menu_item_url = $main_menu_item->url;
                                                                                                $main_menu_item_target = $main_menu_item->target;
                                                                                                $main_menu_item_class = $main_menu_item->classes[1];
                                                                                                $itg_megamenu_cta = get_field('cta_link', $main_menu_item_ID);

                                                                                        if( have_rows('tabs_links', $main_menu_item_ID) ):
                                                                                        $i=0;
                                                                                                // Loop through rows.
                                                                                                while( have_rows('tabs_links', $main_menu_item_ID) ) : the_row();
                                                                                                     $cta_megamenu_tabslink	= get_sub_field('tab_link', $main_menu_item_ID);
                                                                                                     $cta_megamenu_tabscontent	= get_sub_field('tab_content', $main_menu_item_ID);
                                                                                                     $cta_megamenu_tabsid	= get_sub_field('tab_id', $main_menu_item_ID);
                                                                                                     $fields = get_fields($main_menu_item_ID);


                                                                                                     ?>

                                                                        <li class="">
                                                                            <span href="" data-name="<?php echo $cta_megamenu_tabsid; ?>" class="is-narrow <?php if($i==0) { $i=1; echo 'active'; } ?>" data-toggle="tab" aria-controls="<?php echo $cta_megamenu_tabsid; ?>">
                                                                                <?php echo $cta_megamenu_tabslink; ?>

                                                                            </span>
                                                                        </li>

                                                                        <?php  // End loop.
                                                                                                            endwhile;

                                                                                                    // No value.
                                                                                                    else :
                                                                                                            // Do something...
                                                                                                    endif;
                                                                                                    ?>

                                                                    </ul>
                                                                </div>

                                                                <div class="Itg-hero-menu-lower-central column is-9 tab-content">

                                                                    <?php // Check rows exists.
                                                                                                            if( have_rows('tabs_links', $main_menu_item_ID) ):
                                                                                                            $i=0;
                                                                                                                    // Loop through rows.
                                                                                                                    while( have_rows('tabs_links', $main_menu_item_ID) ) : the_row();
                                                                                                                         $cta_megamenu_tabslink	= get_sub_field('tab_link', $main_menu_item_ID);
                                                                                                                         $cta_megamenu_tabscontent	= get_sub_field('tab_content', $main_menu_item_ID);
                                                                                                                         $cta_megamenu_tabsid	= get_sub_field('tab_id', $main_menu_item_ID);
                                                                                                                         $cta_megamenu_tabstitle	= get_sub_field('title_content', $main_menu_item_ID);
                                                                                                                         $cta_megamenu_tabsscdncolumn	= get_sub_field('tab_content_2ndcolumn', $main_menu_item_ID);

                                                                                                                         ?>
                                                                    <div class="tab-pane <?php echo $cta_megamenu_tabsid; ?> <?php if($i==0) { $i=1; echo 'active'; } ?>" role="tabpanel" aria-labelledby="<?php echo $cta_megamenu_tabsid; ?>">
                                                                        <div class="columns is-multiline">
                                                                            <div class="column is-12">
                                                                                <?php if($cta_megamenu_tabstitle) :  ?>
                                                                                <p><strong><?php echo $cta_megamenu_tabstitle; ?></strong></p>
                                                                                <hr>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <?php if($cta_megamenu_tabsscdncolumn) {  ?>
                                                                            <div class="column is-6">
                                                                                <?php echo $cta_megamenu_tabscontent; ?>
                                                                            </div>
                                                                            <div class="column is-6">
                                                                                <?php echo $cta_megamenu_tabsscdncolumn; ?>
                                                                            </div>
                                                                            <?php } else { ?>
                                                                            <div class="column is-12">
                                                                                <?php echo $cta_megamenu_tabscontent; ?>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>

                                                                    </div>
                                                                    <?php  // End loop.
                                                                                                                                endwhile;

                                                                                                                        // No value.
                                                                                                                        else :
                                                                                                                                // Do something...
                                                                                                                        endif;
                                                                                                                        ?>
                                                                </div>

                                                            </div>


                                                        </div>

                                                    </div>

                                                </div>

                                                <!--
                                                                                                    <div class="column is-3 launchlinks">
                                                                                                        <div class="is-flex is-flex-direction-row is-align-items-center">
                                                                                                            <a>Scopri anche</a>
                                                                                                            <img src="<?php echo get_template_directory_uri() . '/dist/src/images/icons/internal_page.svg'; ?>" alt="">
                                                                                                            </div>
                                                                                                </div>
                                                                                                -->
                                                <div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                            <?php } ?>

                        </div>
                    </div>
                </nav>
            </div>
	    </header><!-- #masthead -->
>>>>>>> Stashed changes
