<?php

/**
 * @file forums.tpl.php
 * Default theme implementation to display a forum which may contain forum
 * containers as well as forum topics.
 *
 * Variables available:
 * - $links: An array of links that allow a user to post new forum topics.
 *   It may also contain a string telling a user they must log in in order
 *   to post.
 * - $forums: The forums to display (as processed by forum-list.tpl.php)
 * - $topics: The topics to display (as processed by forum-topic-list.tpl.php)
 * - $forums_defined: A flag to indicate that the forums are configured.
 *
 * @see template_preprocess_forums()
 * @see theme_forums()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix">
  <?php //print $user_picture; ?>
<div id="subheadbox" class="nographic">
    <div id="subheader">
    <!-- <img src="/sites/all/themes/carpediemacademy/images/forum.png" class="forum-icon"> --><h2 class="title">Discussion Forum</h2>
    </div>
    <div id="headerimage"><?php print $node->field_headimage[0]['view'] ?></div>
  </div>
  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  <?php if ($display_submitted || $terms): ?>
    <div class="meta">
      <?php if ($display_submitted): ?>
        <span class="submitted">
          <?php
            print t('Submitted by !username on !datetime',
              array('!username' => $name, '!datetime' => $date));
          ?>
        </span>
      <?php endif; ?>

      <?php if ($terms): ?>
        <div class="terms terms-inline"><?php print $terms; ?></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div class="content" id="subcontent">

    <div id="subbody">
<?php if ($forums_defined): ?>
<div id="forum">
  <?php print theme('links', $links); ?>
  <?php print $forums; ?>
  <?php print str_replace('</td>\\','</td>', $topics); ?>
</div>
<?php endif; ?>
</div>
  </div>

  <?php //print $links; ?>
</div> <!-- /.node -->