<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
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
?>
<?php foreach ($fields as $id => $field):

	switch ($id) {
		case "title" :
			$title = $field->content;
		break;
		case "body" :
			$body = $field->content;
		break;
		case "field_url_value" :
			$url = $field->content;

		break;
		case "comment_count" :

					$commentcount = $field->content;

		break;
		case "comments_link" :
 //dpm($field);

			$commentlink = $field->content;

		break;

	}
 endforeach;
	?>
<li class="tool">
	<div class="tool-title"><?php print $title ?></div>
	<div class="tool-container clearfix">
		<div class="tool-body"><?php print $body ?></div>
		<div class="tool-url"><?php print $url ?></div>
		<div class="tool-links"><?php print $commentcount ?> | <?php print $commentlink ?></div>
	</div>
</li>
