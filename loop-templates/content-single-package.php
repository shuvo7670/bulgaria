<div class="tour-package-details">
    <div class="pd-header">
        <div class=" pd-top row row-cols-lg-4 row-cols-md-2 row-cols-2 gy-4">

            <?php if (!empty(Egns_Helpers::turio_package_info('tp_duration'))) : ?>
                <div class="col">
                    <div class="pd-single-info">
                        <div class="info-icon">
                            <img src="<?php echo esc_url(get_theme_file_uri() . '/assets/images/icons/pd1.svg'); ?>" alt="<?php echo esc_attr('icons') ?>">
                        </div>
                        <div class="info">
                            <h6><?php echo esc_html__('Duration', 'turio') ?></h6>
                            <span> <?php echo esc_html(Egns_Helpers::turio_package_info('tp_duration')); ?> </span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            $travel_type = get_the_terms(get_the_ID(), 'turio-package-type');
            if (!empty($travel_type)) : ?>
                <div class="col">
                    <div class="pd-single-info">
                        <div class="info-icon">
                            <img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/icons/pd2.svg'; ?>" alt="<?php echo esc_attr('icons') ?>">
                        </div>
                        <div class="info">
                            <h6><?php echo esc_html__('Tour Type', 'turio') ?></h6>
                            <?php
                            if (!empty($travel_type)) {
                                foreach ($travel_type as $key => $value) {
                            ?>
                                    <span><?php echo sprintf(__('%s','turio'),$value->name) . '<br>'; ?></span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty(Egns_Helpers::turio_package_info('tp_group_size'))) : ?>
                <div class="col">
                    <div class="pd-single-info">
                        <div class="info-icon">
                            <img src="<?php echo esc_url(get_theme_file_uri()) . '/assets/images/icons/pd3.svg'; ?>" alt="<?php echo esc_attr('icons') ?>">
                        </div>
                        <div class="info">
                            <h6><?php echo esc_html__('Group Size', 'turio') ?> </h6>
                            <span> <?php echo esc_html(Egns_Helpers::turio_package_info('tp_group_size')) ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty(Egns_Helpers::turio_package_info('tp_total_tour_guide'))) : ?>
                <div class="col">
                    <div class="pd-single-info">
                        <div class="info-icon">
                            <img src="<?php echo esc_url(get_theme_file_uri() . '/assets/images/icons/pd4.svg'); ?>" alt="<?php echo esc_attr('icons') ?>">
                        </div>
                        <div class="info">
                            <h6><?php echo esc_html__('Tour Guide', 'turio') ?></h6>
                            <span> <?php echo esc_html(Egns_Helpers::turio_package_info('tp_total_tour_guide')) ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>


        <?php if (has_post_thumbnail()) { ?>
            <div class="pd-thumb">
                <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
            </div>
        <?php } ?>
        <div class="header-bottom">
            <div class="pd-lavel d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h5 class="location"><i class="bi bi-geo-alt"></i>
                    <?php
                    $destination = get_the_terms(get_the_ID(), 'turio-package-destination');
                    $count = 1;
                    if (!empty($destination)) {
                        foreach ($destination as $des) :
                            echo sprintf(esc_html__("%s", 'turio'), $des->name);
                            if ($count != count($destination)) {
                                echo ", ";
                            }
                            $count++;
                        endforeach;
                    }
                    ?>
                </h5>
                <?php if (Egns_Helpers::egns_get_all_rating_count_by_tour_title(get_the_title()) > 0) : ?>
                    <ul class="d-flex align-items-center rating">
                        <?php
                        for ($x = 1; $x <= 5; $x++) {
                            if (Egns_Helpers::egns_get_avg_rating_by_tour_title(get_the_title()) >= $x) {
                                echo wp_kses_post('<li><i class="bi bi-star-fill"></i></li>');
                            } else {
                                echo wp_kses_post('<li><i class="bi bi-star"></i></li>');
                            }
                        }
                        ?>
                    </ul>
                <?php endif ?>
            </div>
        </div>
    </div>


    <div class="package-details-tabs">
        <ul class="nav nav-pills tab-switchers gap-xxl-4 gap-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-package1" data-bs-toggle="pill" data-bs-target="#pill-body1" type="button" role="tab" aria-controls="pill-body1" aria-selected="true"><i class="bi bi-info-lg"></i> <?php echo esc_html__('Information', 'turio') ?></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-package2" data-bs-toggle="pill" data-bs-target="#pill-body2" type="button" role="tab" aria-controls="pill-body2" aria-selected="false"> <i class="bi bi-file-earmark-spreadsheet"></i><?php echo esc_html__('Travel Plan', 'turio') ?></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-package3" data-bs-toggle="pill" data-bs-target="#pill-body3" type="button" role="tab" aria-controls="pill-body3" aria-selected="false"><i class="bi bi-images"></i> <?php echo esc_html__('Tour Gallery', 'turio') ?></button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-package4" data-bs-toggle="pill" data-bs-target="#pill-body4" type="button" role="tab" aria-controls="pill-body4" aria-selected="false"><i class="bi bi-geo-alt"></i> <?php echo esc_html__('Location', 'turio') ?></button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <!-- package info tab -->
            <div class="tab-pane fade show active package-info-tab mt-3" id="pill-body1" role="tabpanel" aria-labelledby="pills-package1">
                <h3 class="d-subtitle"><?php echo esc_html(the_title()); ?></h3>
                <?php the_content(); ?>
            </div>

            <!-- package plans tab -->
            <?php if (!empty(Egns_Helpers::turio_travel_plan_options('tp_travel_plan_overview'))) : ?>
                <div class="tab-pane fade package-plan-tab tab-body mt-3" id="pill-body2" role="tabpanel" aria-labelledby="pills-package2">
                    <h3 class="d-subtitle"><?php echo esc_html__('Details', 'turio') ?></h3>
                    <p><?php echo Egns_Helpers::turio_travel_plan_options('tp_travel_plan_overview'); ?></p>

                    <div class="accordion plans-accordion" id="planAccordion">
                        <?php
                        $packages = Egns_Helpers::turio_travel_plan_options('opt-travel-plan-repeater-2');
                        if (!empty($packages)) {
                            $count = 1;
                            foreach ($packages as $package) {
                                $show = '';
                                if (str_pad($count, 2, "0", STR_PAD_LEFT) == '01') {
                                    $show = 'show';
                                }
                        ?>
                                <div class="accordion-item plans-accordion-single">
                                    <div class="accordion-header" id="planHeading<?php echo str_pad($count, 2, "0", STR_PAD_LEFT); ?>">
                                        <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#planCollapse<?php echo str_pad($count, 2, "0", STR_PAD_LEFT); ?>" aria-expanded="true" role="navigation">
                                            <div class="paln-index-circle">
                                                <h4><?php echo str_pad($count, 2, "0", STR_PAD_LEFT); ?></h4>
                                            </div>
                                            <div class="plan-title">
                                                <?php if (!empty($package['travel_plan_title'])) : ?>
                                                    <h5><?php echo sprintf(esc_html__("%s", 'turio'), $package['travel_plan_title']) ?></h5>
                                                <?php endif ?>
                                                <?php if (!empty($package['travel_plan_time'])) : ?>
                                                    <h6><?php echo sprintf(esc_html__("%s", 'turio'), $package['travel_plan_time']) ?></h6>
                                                <?php endif ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div id="planCollapse<?php echo str_pad($count, 2, "0", STR_PAD_LEFT); ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="planHeading<?php echo str_pad($count, 2, "0", STR_PAD_LEFT); ?>" data-bs-parent="#planAccordion">
                                        <div class="accordion-body plan-info">
                                            <?php if (!empty($package['travel_plan_description'])) : ?>
                                                <?php echo sprintf(esc_html__("%s", 'turio'), $package['travel_plan_description']) ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                                $count++;
                            }
                        }
                        ?>

                    </div>
                </div>
            <?php endif; ?>
            <!-- package gallary tab -->
            <?php if (!empty(Egns_Helpers::turio_gallery_option('tp_gallery'))) : ?>
                <div class="tab-pane fade package-gallary-tab mt-3" id="pill-body3" role="tabpanel" aria-labelledby="pills-package3">
                    <div class="row g-4">
                        <?php
                        $galleryExplode = explode(',', Egns_Helpers::turio_gallery_option('tp_gallery'));
                        $i = 0;
                        foreach ($galleryExplode as $gallery) {
                            $i++;
                            $imgUrl = wp_get_attachment_image_url($gallery, 'full');
                            $caption_title = wp_get_attachment_caption($gallery);
                            if (!empty($imgUrl)) :
                        ?>
                                <div class="<?php if ($i % 3 == 0) {
                                                echo 'col-12';
                                            } else {
                                                echo 'col-6';
                                            } ?>">
                                    <a class="package-gallary-item" href="<?php echo esc_url($imgUrl); ?>" data-caption="<?php echo esc_html($caption_title) ?>" data-fancybox="gallery">
                                        <img class="img-fluid" src="<?php echo esc_url($imgUrl); ?>" alt="<?php echo esc_attr('gallery-image') ?>">
                                    </a>
                                </div>
                        <?php
                            endif;
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="tab-pane fade package-location-tab mt-3" id="pill-body4" role="tabpanel" aria-labelledby="pills-package4">
                <embed src="<?php echo esc_url('https://maps.google.com/maps?q=') ?><?php echo  esc_html(Egns_Helpers::turio_location_option('tp_map')['latitude']); ?>,<?php echo esc_html(Egns_Helpers::turio_location_option('tp_map')['longitude']); ?>&hl=es;z=<?php echo esc_html(Egns_Helpers::turio_location_option('tp_map')['zoom']); ?>&amp;output=embed" />
            </div>
        </div>
    </div>
</div>