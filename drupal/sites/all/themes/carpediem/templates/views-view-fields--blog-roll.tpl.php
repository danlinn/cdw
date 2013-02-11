<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
if(isset($fields['value_1'])) {
  $name = "<a href='/users/" . $fields['name']->content . "'>" . $fields['value_1']->content . " " . $fields['value_2']->content . "</a>, " . $fields["value"]->content;
  unset($fields['value_1']);
  unset($fields['value_2']);
  unset($fields['value']);
} else {
  $name = "<a href='/users/" . $fields['name']->content . "'>" . $fields['name']->content . "</a>";
}
?>

<div class="blog my-view-row clearfix">
  <h2 class="blog-title"><?php print $fields['title']->content; ?></h2>
  <div class="user-pic"><?php print $fields['picture']->content; ?></div>
  <span class="user-info"><?php print $name; ?></span>
  <div class="user-info"><?php print $fields['created']->content; ?></div>
  <div class="body clearfix"><?php print $fields['body']->content; ?></div>
  <span class="view-link clearfix"><?php print $fields['view_node']->content; ?></span>
</div>
