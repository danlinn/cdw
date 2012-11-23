<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php print $picture ?>
<?php
if ($node->field_linkotmap[0]['view']=="Yes") {
	print "<a href='http://maps.google.com/?q=".urlencode($node->field_address[0]['view'])."+".urlencode($node->field_city[0]['view'])."+".urlencode($node->field_state[0]['view'])."+".urlencode($node->field_zip[0]['view'])."' target='_blank'>";
}
if($node->field_location[0]['view']!="") {
	print "<h3>".$node->field_location[0]['view']."</h3>";
}
if($node->field_location[0]['view']!="" && $node->field_linkotmap[0]['view']=="Yes") {
	print "</a>";
}
if($node->field_address[0]['view']!="") {
	print $node->field_address[0]['view']."<br/>";	
}
if($node->field_city[0]['view']!="") {
	print $node->field_city[0]['view'].", ".$node->field_state[0]['view']."  ".$node->field_zip[0]['view'];
}

if ($node->field_linkotmap[0]['view']=="Yes" && $node->field_location[0]['view']=="") {
print "</a>";
}

?>
  <div class="content clear-block">
    <?php 
	print $node->field_date[0]['view'];
	
	print $node->body;
	
	 ?>
  </div>
</div>