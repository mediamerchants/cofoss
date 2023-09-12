<?php
  $head_tags = get_field('inside_head_tags','option');
  $body_tags = get_field('after_body_tags','option');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <?php echo $head_tags ? $head_tags : ''; ?>
  </head>

  <body <?php body_class(); ?>>
    <?php echo $body_tags ? $body_tags : ''; ?>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
