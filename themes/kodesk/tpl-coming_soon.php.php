<?php 
/* Template Name: Coming Soon Page */ 
/**
 * @package KODESK
 * @author  ThemeKalia
 * @version 1.0
 */
?>
<?php 
get_header('coming_soon');
$data  = \KODESK\Includes\Classes\Common::instance()->data( 'single' )->get(); ?>
<?php while ( have_posts() ): the_post(); ?>
	<?php echo get_the_content(); ?>
<?php endwhile; ?>
<?php get_footer('coming_soon'); ?>
