<?php
 if (!$is_front && !$teaser) {
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix">
  <?php //print $user_picture; ?>
<div id="subheadbox">
    <div id="subheader">
    <h2 class="title">Discussion Forum</h2>
    <?php print $node->field_subhead[0]['view'] ?></div>
    <div id="headerimage"><?php print $node->field_headimage[0]['view'] ?></div>
  </div>
  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  

  <div class="content" id="subcontent">

    <div id="subbody">
<div class="node<?php print ($sticky) ? " sticky" : ""; ?>">
  <?php //if ($page == 0): ?>
    <p><h1 class="title"><?php if (!$page) { ?><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php } ?><?php print $title ?><?php if (!$page) { ?></a><?php } ?></h1></p>
  <?php //endif; ?>
  <?php print $picture ?>

  <div class="info"><?php print $submitted ?><span class="terms"><?php print $terms ?></span></div>
  <div class="content">
 <?php print $content ?> 
    
  </div>
<?php if ($links): ?> 
    
    <?php if ($picture): ?>
      <br class='clear' /> 
    <?php endif; ?>
    <div class="links"><?php print $links ?></div>
<?php endif; ?>
</div>

    </div>
  </div>

</div> <!-- /.node -->
<?php
 } else if($teaser) {
// dpm($node);
 ?>
 <a href="/<?php print $node->path ?>"><h2 class="title"><?php print $title; ?></h2></a>
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
       <!-- <div class="terms terms-inline"><?php print $terms; ?></div> -->
      <?php endif; ?>
    </div>
  <?php endif; ?>
 <?php
  print $node->content['body']['#value'];
  //dpm($node);
 

	 print $links;
 } else {
   print $node->content['body']['#value'];
 }
