<?php
// $Id: page.tpl.php,v 1.26.2.3 2010/06/26 15:36:04 johnalbin Exp $

/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It should be placed within the <body> tag. When selecting through CSS
 *   it's recommended that you use the body tag, e.g., "body.front". It can be
 *   manipulated through the variable $classes_array from preprocess functions.
 *   The default values can be one or more of the following:
 *   - front: Page is the home page.
 *   - not-front: Page is not the home page.
 *   - logged-in: The current viewer is logged in.
 *   - not-logged-in: The current viewer is not logged in.
 *   - node-type-[node type]: When viewing a single node, the type of that node.
 *     For example, if the node is a "Blog entry" it would result in "node-type-blog".
 *     Note that the machine name will often be in a short form of the human readable label.
 *   - page-views: Page content is generated from Views. Note: a Views block
 *     will not cause this class to appear.
 *   - page-panels: Page content is generated from Panels. Note: a Panels block
 *     will not cause this class to appear.
 *   The following only apply with the default 'sidebar_first' and 'sidebar_second' block regions:
 *     - two-sidebars: When both sidebars have content.
 *     - no-sidebars: When no sidebar content exists.
 *     - one-sidebar and sidebar-first or sidebar-second: A combination of the
 *       two classes when only one of the two sidebars have content.
 * - $node: Full node object. Contains data that may not be safe. This is only
 *   available if the current page is on the node's primary url.
 * - $menu_item: (array) A page's menu item. This is only available if the
 *   current page is in the menu.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing the Primary menu links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title: The page title, for use in the actual HTML content.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the
 *   view and edit tabs when displaying a node).
 * - $help: Dynamic help text, mostly for admin pages.
 * - $content: The main content of the current page.
 * - $feed_icons: A string of all feed icons for the current page.
 *
 * Footer/closing data:
 * - $footer_message: The footer message as defined in the admin settings.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * Regions:
 * - $content_top: Items to appear above the main content of the current page.
 * - $content_bottom: Items to appear below the main content of the current page.
 * - $navigation: Items for the navigation bar.
 * - $sidebar_first: Items for the first sidebar.
 * - $sidebar_second: Items for the second sidebar.
 * - $header: Items for the header region.
 * - $footer: Items for the footer region.
 * - $page_closure: Items to appear below the footer.
 *
 * The following variables are deprecated and will be removed in Drupal 7:
 * - $body_classes: This variable has been renamed $classes in Drupal 7.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess()
 * @see zen_process()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <meta name="description" content="Carpe Diem West is a nonprofit organization finding smart, science-based solutions that create water security for our communities, the food we grow, our economy and our environment." /><meta name="keywords" content="carpe diem project, western water and climate change, exloco, water scarcity, water security, water policy, water management, peak water, peak energy, water-energy nexus, climate change, climate crisis, american west,cooperative solutions, science-based solutions, network, leaders, convening, kimery wiltshire, matt clifford, sausalito, confluence, in the west, headwaters, user contribution programs, colorado river, colorado river basin, colorado river accord, water and energy, healthy headwaters, carpe diem academy, era of uncertainty, public health, water and climate change" />
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="FrontPage <?php print $classes; ?>">
 <?php if ($primary_links): ?>
    <div id="skip-link"><a href="#main-menu"><?php print t('Jump to Navigation'); ?></a></div>
  <?php endif; ?>
<div id="container">
  <div id="header"><a href="http://carpediemwestacademy.org" id="swaplink">Go to Carpe Diem West Academy</a>
  <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan">
          <?php if ($site_name): ?>
            <?php if ($title): ?>
              <div id="site-name"><strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong></div>
            <?php else: /* Use h1 when the content title is empty */ ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /#name-and-slogan -->
      <?php endif; ?>

      <?php if ($search_box): ?>
        <div id="search-box"><?php print $search_box; ?></div>
      <?php endif; ?>

      <?php print $header; ?>
  <!-- end #header -->
  </div>
   <?php if ($primary_links || $navigation): ?>
  <div id="navigation">
<!-- <div id="donate"><a href="donate"><img src="<?php print $directory; ?>/images/donate.gif" border="0" alt="Donate to Carpe Diem" /></a></div> -->
   <?php
   // print theme(array('links__system_main_menu', 'links'), $primary_links,
//            array(
//              'id' => 'main-menu',
//              'class' => 'links clearfix',
//            ),
//            array(
//              'text' => t('Main menu'),
//              'level' => 'h2',
//              'class' => 'element-invisible',
//            ));
          ?>

          <?php //print $navigation; ?>
          <?php //print $NavigationBar; ?>
		  <?php print $content_top; ?>
  <!-- end #header -->
  </div>  <?php endif; ?>
  <div id="mainContent">
  	<div id="homebox">
    	<div id="motto">
    <?php if ($mission): ?>
          <div id="mission"><?php print $mission; ?></div>
        <?php endif; ?>

        <?php print $highlight; ?>

        <?php print $breadcrumb; ?>
        <?php if ($title): ?>
         <!-- <h1 class="title"><?php print $title; ?></h1>-->
        <?php endif; ?>
        <?php print $messages; ?>
        <?php if ($tabs): ?>
          <div class="tabs"><?php print $tabs; ?></div>
        <?php endif; ?>
        <?php print $help; ?>


        <div id="content-area">
          <?php print $content; ?>
          <?php print $ContentBox; ?>
        </div>

        <?php print $content_bottom; ?>

        <?php if ($feed_icons): ?>
         <!-- <div class="feed-icons"><?php print $feed_icons; ?></div> -->
        <?php endif; ?>
    </div>
  <!-- end #mainContent -->
  </div>

  <!-- NEW FOOTER  -->
  <div id="footer">
    <a href="/contact/whats-new" id="whatsnewlink">what's new</a>

    <div class="footer-left">
      <div id="whatsnew">
        <?php print $whatsnew; ?>
      </div>

      <div id="blog">
        <a href="/blog" id="bloglink">blog</a>
        <h2>view our recent blog posts</h2>
      <?php
        /**
        * The following displays a list of the 10 most recent blog titles
        * as links to the full blogs. If you want to increase/reduce
        * the number of titles displayed, simply change $listlength value.
        *
        */
        $listlength="2";

        $nodetype="blog";
        $output = node_title_list(db_query_range(db_rewrite_sql("SELECT n.nid, n.title, n.created FROM {node} n WHERE n.type = '%s' AND n.status = 1 ORDER BY n.created DESC"), $nodetype, 0, $listlength));
        print $output;
      ?>

      </div>
    </div>
    <div class="footer-right">
      <div id="news">
        <a href="/contact/join-our-network" id="newsletterlink">contact</a>
        <?php print $news; ?>
        <?php print $cdanews; ?>
        <div class="st_sharethis_custom" displayText="">
        </div>
        <a href="https://twitter.com/#!/carpediemwest" target="_blank" class="twitter-icon">
          <img src="/sites/all/themes/carpediem/images/twitter.png" />
        </a>
      </div>
    </div>


  </div>

  <!-- END NEW FOOTER  -->

  <?php
    print theme(array('links__system_secondary_menu', 'links'), $secondary_links,
      array(
        'id' => 'secondary-menu',
        'class' => 'links clearfix',
      ),
      array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => 'element-invisible',
      ));
    if ($footer):
      if ($footer_message): ?>
  <div id="footer-message"><?php print $footer_message; ?></div>
  <?php endif;
    print $footer;
  endif;
  ?>
  </div>


  <?php print $page_closure; ?>

  <?php print $closure; ?>

</body>
</html>
