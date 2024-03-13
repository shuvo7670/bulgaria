<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package turio
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner-post">
	    <?php
	    the_content();
	    Egns_Helpers::turio_get_post_pagination();
	    ?>
	</div>
</article>