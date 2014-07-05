<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);


/**
 * Force WordPress 1 Column Backend
 */
function wpse126301_dashboard_columns() {
    add_screen_option(
        'layout_columns',
        array(
            'max'     => 2,
            'default' => 1
        )
    );
}
add_action( 'admin_head-index.php', 'wpse126301_dashboard_columns' );

add_action( 'admin_head-index.php', function()
{
    ?>
<style>
.postbox-container {min-width: 100% !important;}
.meta-box-sortables.ui-sortable.empty-container {vdisplay: none;}
.no-activity p:last-child {display:none;}
</style>
    <?php
});