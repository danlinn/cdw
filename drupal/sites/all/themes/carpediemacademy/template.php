<?php
// $Id: template.php,v 1.21 2009/08/12 04:25:15 johnalbin Exp $

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to carpediemacademy_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: carpediemacademy_breadcrumb()
 *
 *   where carpediemacademy is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */
$external_js = 'http://w.sharethis.com/button/buttons.js';

drupal_add_js('document.write(unescape("%3Cscript src=\''. $external_js . '\' type=\'text/javascript\'%3E%3C/script%3E"));', 'inline');
drupal_add_js("stLight.options({publisher:'eed0472e-e2bf-42c9-ad2e-e23c8cfa4b7a'});", "inline");
/**
 * Implementation of HOOK_theme().
 */
function carpediemacademy_theme(&$existing, $type, $theme, $path) {
  $hooks = zen_theme($existing, $type, $theme, $path);

  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */

  // @TODO: Needs detailed comments. Patches welcome!
  return $hooks;
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function carpediemacademy_breadcrumb($breadcrumb) {
 //44 characters should be the limit
   // Determine if we are to display the breadcrumb.

  ////

     // Determine if we are to display the breadcrumb.
  $show_breadcrumb = theme_get_setting('zen_breadcrumb');
  if ($show_breadcrumb == 'yes' || $show_breadcrumb == 'admin' && arg(0) == 'admin') {


	  $links = array();
	  $path = '';
	  $arguments = explode('/', $_REQUEST['q']);

	  // Remove empty values
	  foreach ($arguments as $key => $value) {
	    if (empty($value)) {
	      unset($arguments[$key]);
	    }
	  }
	  $arguments = array_values($arguments);


    // Optionally get rid of the homepage link.
    $show_breadcrumb_home = theme_get_setting('zen_breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }
   // dpm($breadcrumb);
		    // Return the breadcrumb with separators.
    if (!empty($breadcrumb)) {
      $breadcrumb_separator = theme_get_setting('zen_breadcrumb_separator');
      $trailing_separator = $title = '';
      if (theme_get_setting('zen_breadcrumb_title')) {
        if ($title = drupal_get_title()) {
          $trailing_separator = $breadcrumb_separator;
        }
      }
      elseif (theme_get_setting('zen_breadcrumb_trailing')) {
        $trailing_separator = $breadcrumb_separator;
      }

		  // Add other links
		  if (!empty($arguments)) {
		  	$use = false;
		    foreach ($arguments as $key => $value) {
		      //remove fr from breadcrumb

		      if ($value == 'fr') {
		        continue;
		      }

		      // Don't make last breadcrumb a link
		      if ($key != (count($arguments) - 1)) {
		        if (!empty($path)) {
		          $path .= '/'. $value;
		          $nodetitle = $value;
		        } else {
		          $path .= $value;
		          $node=node_load(substr(drupal_get_normal_path($path), 5));
		          $nodetitle=node_page_title($node);
		          if($nodetitle == "Overview" || $path == "/tools") {
		          	$nodetitle = "Tools";
		          	$use = true;
		          }
		        }
		        //Check if path is valid

		        if (drupal_lookup_path('source', $path)) {
		          $links[] = l($nodetitle, $path);
		        } else {
		          $links[] = drupal_ucfirst($value);
		        }
		      }
		    }
		  }

		     // if($use) { $breadcrumb = array_merge($breadcrumb, $links); };
		   foreach ($breadcrumb as $key => $value) {
		   	if($value == '<a href="/community/forum">Forums</a>') {
		   		$breadcrumb[$key] = '<a href="/resources">Resources</a>';
		   		$breadcrumbA = '<a href="/resources">Resources</a>';
		   		//array_splice( $breadcrumb, $key, 0, $breadcrumbA );
		   	}
		   //	dpm($key);
		   }
		       //   dpm($breadcrumb);
		      return '<div class="breadcrumb">' . implode($breadcrumb_separator, array_unique(
		      $breadcrumb)) . "$trailing_separator$title</div>";
		}

      // Otherwise, return an empty string.
  	return '';
  }
}

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function carpediemacademy_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function carpediemacademy_preprocess_page(&$vars, $hook) {
	$external_js = 'http://w.sharethis.com/button/buttons.js';
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function carpediemacademy_preprocess_node(&$vars, $hook) {
  $title = $vars['title'];
  if (substr($title,0,5) == 'STAGE') {
    $block = module_invoke('views', 'block', 'view', 'Tools-block_1');
    $vars['tool_block'] = "<h3>" . $block['subject']  . "</h3>" . $block['content'];
  }
  // if ($vars['title'] == "Webinars"){
  //   if ($vars->logged_in) {
  //     $block = module_invoke('block', 'block', 'view', 13);
  //     $vars['webinar_text'] .= $block['content'];
  //   } else {
  //     $block = module_invoke('block', 'block', 'view', 14);
  //     $vars['webinar_text'] = $block['content'];
  //   }
  //   $vars["webinars"] = views_embed_view('webinar_listings', 'block_1');
  //   // dpm($vars["webinars"]);
  // }
}
// */
function carpediemacademy_preprocess_forums(&$variables, $hook) {
  if(!empty($variables['links']['login']['title'])) {
    $variables['links']['login'] = array(
          'title' => t('<a href="@reg">Create a new account</a> or <a href="@login">Login</a> to post new content in the forum.', array(
            '@login' => url('user/login', array('query' => drupal_get_destination())),
            '@reg' => url('user/register', array('query' => drupal_get_destination()))
            )), 'html' => TRUE);
  }
}

function carpediemacademy_views_view_field($view, $field, $row) {
  // dpm($row);
  return $view->field[$field->options['id']]->advanced_render($row);
}

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
function carpediemacademy_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */


function carpediemacademy_username($object) {

	//$object = user_load($object->uid);
	//dpm($object);
  profile_load_profile($object);
	//dpm($object);
  $name = $object->profile_first_name . ' ' . $object->profile_last_name;
	//dpm($user);
	if ($object->uid && $object->name) {
    // Shorten the name when it is too long or it will break many tables.
    if (drupal_strlen($object->name) > 20) {
      $object->$name = drupal_substr($object->name, 0, 15) .'...';
    }
    if (drupal_strlen($name) > 20) {
      $name = drupal_substr($name, 0, 15) .'...';
    }
    if($name==' ' || empty($name)) {
    	$name = $object->name;
    }

    if (user_access('access user profiles')) {
      $output = l($name, 'user/'. $object->uid, array('attributes' => array('title' => t('View user profile.'))));
    }
    else {
      $output = check_plain($name);
    }
  }
  else if ($object->name) {
    // Sometimes modules display content composed by people who are
    // not registered members of the site (e.g. mailing list or news
    // aggregator modules). This clause enables modules to display
    // the true author of the content.
    if (!empty($object->homepage)) {
      $output = l($object->name, $object->homepage, array('attributes' => array('rel' => 'nofollow')));
    }
    else {
      $output = check_plain($object->name);
    }

    $output .= ' ('. t('not verified') .')';
  }
  else {
    $output = variable_get('anonymous', t('Anonymous'));
  }

  return $output;
}


/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function carpediemacademy_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */
