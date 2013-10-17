<?php
// $Id: views-view-unformatted.tpl.php,v 1.6 2008/10/01 20:52:11 merlinofchaos Exp $
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div id="subheadbox">
    <div id="subheader">
    <?php
    $displayName = $view->current_display;
    $title = $view->display[$displayName]->display_options['title'];

    ?>
    <h2 class="title"><?php if($title) { print $title; } else { print $node->title; } ?></h2>
    <?php print $node->field_subhead[0]['view'] ?></div>
    <div id="headerimage"><?php print $node->field_headimage[0]['view'] ?></div>
  </div>
 <div class="content" id="subcontent">

    <div id="subbody">
<?php foreach ($rows as $id => $row): ?>
  <div class="<?php print $classes[$id]; ?>">
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
 </div>
  </div>
