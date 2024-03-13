<?php

/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version  7.8.0
 */

defined('ABSPATH') || exit;

?>

<div class="woocommerce-no-products-found">
    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/bg/no-found.svg'); ?>" alt="<?php esc_attr__('image', 'turio') ?>">
    <span><?php echo esc_html__('Sorry !, No product found', 'turio') ?></span>
    <p><?php echo esc_html__('Nothing Match your search terms. Please try again with some different keywords.', 'turio') ?></p>
</div>