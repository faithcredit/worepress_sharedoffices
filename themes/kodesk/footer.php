<?php
/**
 * Footer Main File.
 *
 * @package KODESK
 * @author  Theme Kalia
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>

	<div class="clearfix"></div>

	<?php kodesk_template_load( 'templates/footer/footer.php', compact( 'page_id' ) ); ?>

	<!-- scroll to top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fal fa-long-arrow-up"></i>
    </button>
    
</div><!-- End Page Wrapper -->

<?php wp_footer(); ?>
</body>
</html>
