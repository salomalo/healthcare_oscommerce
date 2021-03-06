<?php
/*
  $Id: links.php,v 1.1.1.1 2005/12/03 21:36:01 max Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

// define our link functions
  require(DIR_WS_FUNCTIONS . 'links.php');

  $links_statuses = array();
  $links_status_array = array();
  $links_status_query = tep_db_query("select links_status_id, links_status_name from " . TABLE_LINKS_STATUS . " where language_id = '" . (int)$languages_id . "'");
  while ($links_status = tep_db_fetch_array($links_status_query)) {
    $links_statuses[] = array('id' => $links_status['links_status_id'],
                               'text' => $links_status['links_status_name']);
    $links_status_array[$links_status['links_status_id']] = $links_status['links_status_name'];
  }

  $action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : '');

  $error = false;
  $processed = false;

  if (tep_not_null($action)) {
    switch ($action) {
      case 'insert':
      case 'update':

        $links_id = tep_db_prepare_input($HTTP_GET_VARS['lID']);
        $links_title = tep_db_prepare_input($HTTP_POST_VARS['links_title']);
        $links_url = tep_db_prepare_input($HTTP_POST_VARS['links_url']);
        $links_category = tep_db_prepare_input($HTTP_POST_VARS['links_category']);
        $links_description = tep_db_prepare_input($HTTP_POST_VARS['links_description']);
        $links_image_url = tep_db_prepare_input($HTTP_POST_VARS['links_image_url']);
        $links_contact_name = tep_db_prepare_input($HTTP_POST_VARS['links_contact_name']);
        $links_contact_email = tep_db_prepare_input($HTTP_POST_VARS['links_contact_email']);
        $links_reciprocal_url = tep_db_prepare_input($HTTP_POST_VARS['links_reciprocal_url']);
        $links_status = tep_db_prepare_input($HTTP_POST_VARS['links_status']);
        $links_rating = tep_db_prepare_input($HTTP_POST_VARS['links_rating']);

        $languages = tep_get_languages();
        $entry_links_title_error = false;
        for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
          if (strlen($links_title[$languages[$i]['id']]) < ENTRY_LINKS_TITLE_MIN_LENGTH) {
            $error = true;
            $entry_links_title_error = true;
          }
        }

        if (strlen($links_url) < ENTRY_LINKS_URL_MIN_LENGTH) {
          $error = true;
          $entry_links_url_error = true;
        } else {
          $entry_links_url_error = false;
        }

        $languages = tep_get_languages();
        $entry_links_description_error = false;
        for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
          if (strlen($links_description[$languages[$i]['id']]) < ENTRY_LINKS_DESCRIPTION_MIN_LENGTH) {
            $error = true;
            $entry_links_description_error = true;
          }
        }

        if (strlen($links_contact_name) < ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH) {
          $error = true;
          $entry_links_contact_name_error = true;
        } else {
          $entry_links_contact_name_error = false;
        }

        if (strlen($links_contact_email) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
          $error = true;
          $entry_links_contact_email_error = true;
        } else {
          $entry_links_contact_email_error = false;
        }

        if (!tep_validate_email($links_contact_email)) {
          $error = true;
          $entry_links_contact_email_check_error = true;
        } else {
          $entry_links_contact_email_check_error = false;
        }

        if (strlen($links_reciprocal_url) < ENTRY_LINKS_URL_MIN_LENGTH) {
          $error = true;
          $entry_links_reciprocal_url_error = true;
        } else {
          $entry_links_reciprocal_url_error = false;
        }

        if ($error == false) {
          if (!tep_not_null($links_image_url) || ($links_image_url == 'http://')) {
            $links_image_url = '';
          }

          $sql_data_array = array('links_url' => $links_url,
                                  'links_image_url' => $links_image_url,
                                  'links_contact_name' => $links_contact_name,
                                  'links_contact_email' => $links_contact_email,
                                  'links_reciprocal_url' => $links_reciprocal_url, 
                                  'links_status' => $links_status, 
                                  'links_rating' => $links_rating);

          if ($action == 'update') {
            $sql_data_array['links_last_modified'] = 'now()';
          } else if($action == 'insert') {
            $sql_data_array['links_date_added'] = 'now()';
          }

          if ($action == 'update') {
            tep_db_perform(TABLE_LINKS, $sql_data_array, 'update', "links_id = '" . (int)$links_id . "'");
          } else if($action == 'insert') {
            tep_db_perform(TABLE_LINKS, $sql_data_array);

            $links_id = tep_db_insert_id();
          }

          $categories_query = tep_db_query("select link_categories_id from " . TABLE_LINK_CATEGORIES_DESCRIPTION . " where link_categories_name = '" . $links_category . "' and language_id = '" . (int)$languages_id . "'");

          $categories = tep_db_fetch_array($categories_query);
          $link_categories_id = $categories['link_categories_id'];

          if ($action == 'update') {
            tep_db_query("update " . TABLE_LINKS_TO_LINK_CATEGORIES . " set link_categories_id = '" . (int)$link_categories_id . "' where links_id = '" . (int)$links_id . "'");
          } else if($action == 'insert') {
            tep_db_query("insert into " . TABLE_LINKS_TO_LINK_CATEGORIES . " ( links_id, link_categories_id) values ('" . (int)$links_id . "', '" . (int)$link_categories_id . "')");
          }

          $languages = tep_get_languages();
          for ($i=0, $n=sizeof($languages); $i<$n; $i++) {

            $sql_data_array = array('links_title' => $links_title[$languages[$i]['id']],
                                    'links_description' => $links_description[$languages[$i]['id']]);
  
            if ($action == 'update') {
            	$check = tep_db_query("select * from " . TABLE_LINKS_DESCRIPTION . " where links_id = '" . (int)$links_id . "' and language_id = '" . (int)$languages[$i]['id']. "'");
            	if (tep_db_num_rows($check)){
              	tep_db_perform(TABLE_LINKS_DESCRIPTION, $sql_data_array, 'update', "links_id = '" . (int)$links_id . "' and language_id = '" . (int)$languages[$i]['id'] . "'");
            	}else{
	              $insert_sql_data = array('links_id' => $links_id,
	                                       'language_id' => $languages[$i]['id']);
	
	              $sql_data_array = array_merge($sql_data_array, $insert_sql_data);
	              tep_db_perform(TABLE_LINKS_DESCRIPTION, $sql_data_array);
            	}
            } else if($action == 'insert') {
              $insert_sql_data = array('links_id' => $links_id,
                                       'language_id' => $languages[$i]['id']);

              $sql_data_array = array_merge($sql_data_array, $insert_sql_data);
              tep_db_perform(TABLE_LINKS_DESCRIPTION, $sql_data_array);
            }
          }

          if (isset($HTTP_POST_VARS['links_notify']) && ($HTTP_POST_VARS['links_notify'] == 'on')) {
            $email = sprintf(EMAIL_TEXT_STATUS_UPDATE, $links_contact_name, $links_status_array[$links_status]) . "\n\n" . STORE_OWNER . "\n" . STORE_NAME;

            tep_mail($links_contact_name, $links_contact_email, EMAIL_TEXT_SUBJECT, $email, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
          }

          tep_redirect(tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('lID', 'action')) . 'lID=' . $links_id));
        } else if ($error == true) {
          $lInfo = new objectInfo($HTTP_POST_VARS);
          $processed = true;
        }

        break;
      case 'deleteconfirm':
        $links_id = tep_db_prepare_input($HTTP_GET_VARS['lID']);

        tep_remove_link($links_id);

        tep_redirect(tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('lID', 'action'))));
        break;
      default:
        $links_query = tep_db_query("select l.links_id, ld.links_title, l.links_url, ld.links_description, l.links_contact_email, l.links_status, l.links_image_url, l.links_contact_name, l.links_reciprocal_url, l.links_status, l.links_rating from " . TABLE_LINKS . " l left join " . TABLE_LINKS_DESCRIPTION . " ld on ld.links_id = l.links_id where ld.links_id = l.links_id and l.links_id = '" . (int)$HTTP_GET_VARS['lID'] . "' and ld.language_id = '" . (int)$languages_id . "'");
        $links = tep_db_fetch_array($links_query);

        $categories_query = tep_db_query("select lcd.link_categories_name as links_category from " . TABLE_LINKS_TO_LINK_CATEGORIES . " l2lc left join " . TABLE_LINK_CATEGORIES_DESCRIPTION . " lcd on lcd.link_categories_id = l2lc.link_categories_id where l2lc.links_id = '" . (int)$HTTP_GET_VARS['lID'] . "' and lcd.language_id = '" . (int)$languages_id . "'");
        $category = tep_db_fetch_array($categories_query);

        if (is_array($links)) {
          if (!is_array($category)) $category = array();
          $lInfo_array = array_merge($links, $category);
          $lInfo = new objectInfo($lInfo_array);
        }
    }
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/general.js"></script>
<?php
  if ($action == 'edit' || $action == 'update' || $action == 'new' || $action == 'insert') {
?>
<script language="javascript"><!--

function check_form() {
  var error = 0;
  var error_message = "<?php echo JS_ERROR; ?>";


  var links_url = document.links.links_url.value;
  var links_category = document.links.links_category.value;
  var links_image_url = document.links.links_image_url.value;
  var links_contact_name = document.links.links_contact_name.value;
  var links_contact_email = document.links.links_contact_email.value;
  var links_reciprocal_url = document.links.links_reciprocal_url.value;
  var links_rating = document.links.links_rating.value;

<?php
  $languages = tep_get_languages();
  for($i=0,$n=sizeof($languages);$i<$n;$i++){
?>
  var links_description_<?php echo $languages[$i]['name']; ?> = document.getElementById('links_description[<?php echo $languages[$i]['id']; ?>]').value;
  var links_title_<?php echo $languages[$i]['name']; ?> = document.getElementById('links_title[<?php echo $languages[$i]['id']; ?>]').value;
  if (links_title_<?php echo $languages[$i]['name']; ?> == "" || links_title_<?php echo $languages[$i]['name']; ?>.length < <?php echo ENTRY_LINKS_TITLE_MIN_LENGTH; ?>) {
    error_message = error_message + "* " + "<?php echo ENTRY_LINKS_TITLE_ERROR; ?>" + "\n";
    error = 1;
  }
  if (links_description_<?php echo $languages[$i]['name']; ?> == "" || links_description_<?php echo $languages[$i]['name']; ?>.length < <?php echo ENTRY_LINKS_DESCRIPTION_MIN_LENGTH; ?>) {
    error_message = error_message + "* " + "<?php echo ENTRY_LINKS_DESCRIPTION_ERROR; ?>" + "\n";
    error = 1;
  }
<?php
  }
?>
  if (links_url == "" || links_url.length < <?php echo ENTRY_LINKS_URL_MIN_LENGTH; ?>) {
    error_message = error_message + "* " + "<?php echo ENTRY_LINKS_URL_ERROR; ?>" + "\n";
    error = 1;
  }

  if (links_contact_name == "" || links_contact_name.length < <?php echo ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH; ?>) {
    error_message = error_message + "* " + "<?php echo ENTRY_LINKS_CONTACT_NAME_ERROR; ?>" + "\n";
    error = 1;
  }

  if (links_contact_email == "" || links_contact_email.length < <?php echo ENTRY_EMAIL_ADDRESS_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo JS_EMAIL_ADDRESS; ?>";
    error = 1;
  }

  if (links_reciprocal_url == "" || links_reciprocal_url.length < <?php echo ENTRY_LINKS_URL_MIN_LENGTH; ?>) {
    error_message = error_message + "* " + "<?php echo ENTRY_LINKS_RECIPROCAL_URL_ERROR; ?>" + "\n";
    error = 1;
  }

  if (links_rating == "") {
    error_message = error_message + "* " + "<?php echo ENTRY_LINKS_RATING_ERROR; ?>" + "\n";
    error = 1;
  }

  if (error == 1) {
    alert(error_message);
    return false;
  } else {
    return true;
  }
}
//--></script>
<?php
  }
?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onload="SetFocus();">
<!-- header //-->
<?
  $header_title_menu=BOX_HEADING_LINKS;
  $header_title_menu_link= tep_href_link(FILENAME_LINKS, 'selected_box=links');
  $header_title_submenu=HEADING_TITLE;
  $header_title_additional=tep_draw_form('search', FILENAME_LINKS, '', 'get').HEADING_TITLE_SEARCH . ' ' . tep_draw_input_field('search').'</form>';

?>
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td background="images/left_separator.gif" width="<?php echo BOX_WIDTH; ?>" valign="top" height="100%" valign=top>
    <table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="0" height="100%" valign=top>
       <tr>
        <td width=100% height=25 colspan=2>
          <table border="0" width="100%" cellspacing="0" cellpadding="0" background="images/infobox/header_bg.gif">
            <tr>
              <td width="28"><img src="images/l_left_orange.gif" width="28" height="25" alt="" border="0"></td>
              <td background="images/l_orange_bg.gif"><img src="images/spacer.gif" width="1" height="1" alt="" border="0"></td>
            </tr>
          </table>
        </td>
      </tr>
      </tr>
      <tr>
        <td valign=top>
          <table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="0" valign=top>
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
          </table>
        </td>
        <td width=1 background="images/line_nav.gif"><img src="images/line_nav.gif"></td>
      </tr>
    </table></td>
<!-- body_text //-->
    <td width="100%" valign="top" height="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0" height="100%">
<?php
  if ($action == 'edit' || $action == 'update' || $action == 'new' || $action == 'insert') {
    if ($action == 'edit' || $action == 'update') {
      $form_action = 'update';
      $contact_name_default = '';
      $contact_email_default = '';
    } else {
      $form_action = 'insert';
      $contact_name_default = STORE_OWNER;
      $contact_email_default = STORE_OWNER_EMAIL_ADDRESS;
    }
?>
      <tr>
        <td height=25 background="images/l_orange_bg.gif"><img src="images/spacer.gif" width="1"  height=1 alt="" border="0"></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo tep_draw_form('links', FILENAME_LINKS, tep_get_all_get_params(array('action')) . 'action=' . $form_action, 'post', 'onSubmit="return check_form();"'); ?>
        <td class="formAreaTitle"><?php echo CATEGORY_WEBSITE; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">

<?php
  $languages = tep_get_languages();
  for($i=0,$n=sizeof($languages);$i<$n;$i++){
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo ENTRY_LINKS_TITLE; ?></td>
            <td class="main"><?php echo tep_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;';
            if ($error == true) {
              if ($entry_links_title_error == true) {
                echo tep_draw_input_field('links_title[' . $languages[$i]['id'] . ']', $HTTP_POST_VARS['links_title'][$languages[$i]['id']], 'maxlength="64"  id="links_title[' . $languages[$i]['id'] . ']"') . '&nbsp;' . ENTRY_LINKS_TITLE_ERROR;
              } else {
                echo $HTTP_POST_VARS['links_title'][$languages[$i]['id']] . tep_draw_hidden_field('links_title[' . $languages[$i]['id'] . ']', $HTTP_POST_VARS['links_title'][$languages[$i]['id']]);
              }
            } else {
              echo tep_draw_input_field('links_title[' . $languages[$i]['id'] . ']', tep_get_links_title($lInfo->links_id, $languages[$i]['id']), 'maxlength="64" id="links_title[' . $languages[$i]['id'] . ']"', true);
            }
           ?></td>
          </tr>
<?php
  }
?>
          <tr>
            <td class="main"><?php echo ENTRY_LINKS_URL; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_links_url_error == true) {
      echo tep_draw_input_field('links_url', $lInfo->links_url, 'maxlength="255"') . '&nbsp;' . ENTRY_LINKS_URL_ERROR;
    } else {
      echo $lInfo->links_url . tep_draw_hidden_field('links_url');
    }
  } else {
    echo tep_draw_input_field('links_url', tep_not_null($lInfo->links_url) ? $lInfo->links_url : 'http://', 'maxlength="255"', true);
  }
?></td>
          </tr>
<?php
    $categories_array = array();
    $categories_query = tep_db_query("select lcd.link_categories_id, lcd.link_categories_name from " . TABLE_LINK_CATEGORIES_DESCRIPTION . " lcd where language_id = '" . (int)$languages_id . "' order by lcd.link_categories_name");
    while ($categories_values = tep_db_fetch_array($categories_query)) {
      $categories_array[] = array('id' => $categories_values['link_categories_name'], 'text' => $categories_values['link_categories_name']);
    }
?>
          <tr>
            <td class="main"><?php echo ENTRY_LINKS_CATEGORY; ?></td>
            <td class="main">

<?php
  if ($error == true) {
    echo $lInfo->links_category . tep_draw_hidden_field('links_category');
  } else {
    echo tep_draw_pull_down_menu('links_category', $categories_array, $lInfo->links_category, '', true);
  }
?></td>
          </tr>
          
<?php
  $languages = tep_get_languages();
  for($i=0,$n=sizeof($languages);$i<$n;$i++){
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo ENTRY_LINKS_DESCRIPTION; ?></td>
            <td class="main"><?php echo tep_image(DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name'], '', '', 'align="top"') . '&nbsp;';
            if ($error == true) {
              if ($entry_links_description_error == true) {
                echo tep_draw_textarea_field('links_description[' . $languages[$i]['id'] . ']', 'hard', 40, 5, $HTTP_POST_VARS['links_description'][$languages[$i]['id']], 'id="links_description[' . $languages[$i]['id'] . ']"') . '&nbsp;' . ENTRY_LINKS_DESCRIPTION_ERROR;
              } else {
                echo $HTTP_POST_VARS['links_description'][$languages[$i]['id']] . tep_draw_hidden_field('links_description[' . $languages[$i]['id'] . ']', $HTTP_POST_VARS['links_description'][$languages[$i]['id']]);
              }
            } else {
              echo tep_draw_textarea_field('links_description[' . $languages[$i]['id'] . ']', 'hard', 40, 5, tep_get_links_description($lInfo->links_id, $languages[$i]['id']), 'id="links_description[' . $languages[$i]['id'] . ']"') . TEXT_FIELD_REQUIRED;
            }
           ?></td>
          </tr>
<?php
  }
?>          
          <tr>
            <td class="main"><?php echo ENTRY_LINKS_IMAGE; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    echo $lInfo->links_image_url . tep_draw_hidden_field('links_image_url');
  } else {
    echo tep_draw_input_field('links_image_url', tep_not_null($lInfo->links_image_url) ? $lInfo->links_image_url : 'http://', 'maxlength="255"');
  }
?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo CATEGORY_CONTACT; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_LINKS_CONTACT_NAME; ?></td>
            <td class="main">
<?php
    if ($error == true) {
      if ($entry_links_contact_name_error == true) {
        echo tep_draw_input_field('links_contact_name', $lInfo->links_contact_name, 'maxlength="64"', true) . '&nbsp;' . ENTRY_LINKS_CONTACT_NAME_ERROR;
      } else {
        echo $lInfo->links_contact_name . tep_draw_hidden_field('links_contact_name');
      }
    } else {
      echo tep_draw_input_field('links_contact_name', tep_not_null($lInfo->links_contact_name) ? $lInfo->links_contact_name : $contact_name_default, 'maxlength="64"', true);
    }
?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_EMAIL_ADDRESS; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_links_contact_email_error == true) {
      echo tep_draw_input_field('links_contact_email', $lInfo->links_contact_email, 'maxlength="96"') . '&nbsp;' . ENTRY_EMAIL_ADDRESS_ERROR;
    } elseif ($entry_links_contact_email_check_error == true) {
      echo tep_draw_input_field('links_contact_email', $lInfo->links_contact_email, 'maxlength="96"') . '&nbsp;' . ENTRY_EMAIL_ADDRESS_CHECK_ERROR;
    } else {
      echo $lInfo->links_contact_email . tep_draw_hidden_field('links_contact_email');
    }
  } else {
    echo tep_draw_input_field('links_contact_email', tep_not_null($lInfo->links_contact_email) ? $lInfo->links_contact_email : $contact_email_default, 'maxlength="96"', true);
  }
?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo CATEGORY_RECIPROCAL; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_LINKS_RECIPROCAL_URL; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_links_reciprocal_url_error == true) {
      echo tep_draw_input_field('links_reciprocal_url', $lInfo->links_reciprocal_url, 'maxlength="255"') . '&nbsp;' . ENTRY_LINKS_RECIPROCAL_URL_ERROR;
    } else {
      echo $lInfo->links_reciprocal_url . tep_draw_hidden_field('links_reciprocal_url');
    }
  } else {
    echo tep_draw_input_field('links_reciprocal_url', tep_not_null($lInfo->links_reciprocal_url) ? $lInfo->links_reciprocal_url : 'http://', 'maxlength="255"', true);
  }
?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo CATEGORY_OPTIONS; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_LINKS_STATUS; ?></td>
            <td class="main">
<?php 
  $link_statuses = array();
  $links_status_array = array();
  $links_status_query = tep_db_query("select links_status_id, links_status_name from " . TABLE_LINKS_STATUS . " where language_id = '" . (int)$languages_id . "'");
  while ($links_status = tep_db_fetch_array($links_status_query)) {
    $link_statuses[] = array('id' => $links_status['links_status_id'],
                               'text' => $links_status['links_status_name']);
    $links_status_array[$links_status['links_status_id']] = $links_status['links_status_name'];
  }

  echo tep_draw_pull_down_menu('links_status', $link_statuses, $lInfo->links_status); 

  if ($action == 'edit' || $action == 'update') {
    echo '&nbsp;&nbsp;' . ENTRY_LINKS_NOTIFY_CONTACT;
    echo tep_draw_checkbox_field('links_notify');
  }
?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_LINKS_RATING; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_links_rating_error == true) {
      echo tep_draw_input_field('links_rating', $lInfo->links_rating, 'size ="2" maxlength="2"') . '&nbsp;' . ENTRY_LINKS_RATING_ERROR;
    } else {
      echo $lInfo->links_rating . tep_draw_hidden_field('links_rating');
    }
  } else {
    echo tep_draw_input_field('links_rating', tep_not_null($lInfo->links_rating) ? $lInfo->links_rating : '0', 'size ="2" maxlength="2"', true);
  }
?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td align="right" class="main"><?php echo (($action == 'edit') ? tep_image_submit('button_update.gif', IMAGE_UPDATE) : tep_image_submit('button_insert.gif', IMAGE_INSERT)) . ' <a href="' . tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('action'))) .'">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </tr></form>
<?php
  } else {
?>
      <tr>
        <td height="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0" height="100%">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_TITLE; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_URL; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_CLICKS; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_STATUS; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php
    $search = '';
    if (isset($HTTP_GET_VARS['search']) && tep_not_null($HTTP_GET_VARS['search'])) {
      $keywords = tep_db_input(tep_db_prepare_input($HTTP_GET_VARS['search']));
      $search = " and ld.links_title like '%" . $keywords . "%'";
    }
    $links_query_raw = "select l.links_id, l.links_url, l.links_image_url, l.links_date_added, l.links_last_modified, l.links_status, l.links_clicked, ld.links_title, ld.links_description, l.links_contact_name, l.links_contact_email, l.links_reciprocal_url, l.links_status from " . TABLE_LINKS . " l left join " . TABLE_LINKS_DESCRIPTION . " ld on l.links_id = ld.links_id where ld.language_id = '" . (int)$languages_id . "'" . $search . " order by ld.links_title, l.links_url";
    $links_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $links_query_raw, $links_query_numrows);
    $links_query = tep_db_query($links_query_raw);

    while ($links = tep_db_fetch_array($links_query)) {
      if ( ( !isset($HTTP_GET_VARS['lID']) || 
             (isset($HTTP_GET_VARS['lID']) && ($HTTP_GET_VARS['lID'] == $links['links_id']))
           ) && !is_object($lInfo) ) { 
        $categories_query = tep_db_query("select lcd.link_categories_name as links_category from " . TABLE_LINKS_TO_LINK_CATEGORIES . " l2lc left join " . TABLE_LINK_CATEGORIES_DESCRIPTION . " lcd on lcd.link_categories_id = l2lc.link_categories_id where l2lc.links_id = '" . (int)$links['links_id'] . "' and lcd.language_id = '" . (int)$languages_id . "'");
        $category = tep_db_fetch_array($categories_query);
        if ( !is_array($category) ) $category = array();

        $lInfo_array = array_merge($links, $category);
        $lInfo = new objectInfo($lInfo_array);
      }

      if (isset($lInfo) && is_object($lInfo) && ($links['links_id'] == $lInfo->links_id)) {
        echo '          <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('lID', 'action')) . 'lID=' . $lInfo->links_id . '&action=edit') . '\'">' . "\n";
      } else {
        echo '          <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('lID')) . 'lID=' . $links['links_id']) . '\'">' . "\n";
      }
?>
                <td class="dataTableContent"><?php echo $links['links_title']; ?></td>
                <td class="dataTableContent"><?php echo $links['links_url']; ?></td>
                <td class="dataTableContent" align="center"><?php echo $links['links_clicked']; ?></td>
                <td class="dataTableContent"><?php echo $links_status_array[$links['links_status']]; ?></td>
                <td class="dataTableContent" align="right"><?php if (isset($lInfo) && is_object($lInfo) && ($links['links_id'] == $lInfo->links_id)) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('lID')) . 'lID=' . $links['links_id']) . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    }
?>
              <tr>
                <td colspan="5"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText" valign="top"><?php echo $links_split->display_count($links_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_LINKS); ?></td>
                    <td class="smallText" align="right"><?php echo $links_split->display_links($links_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y', 'lID'))); ?></td>
                  </tr>
                  <tr>
<?php
    if (isset($HTTP_GET_VARS['search']) && tep_not_null($HTTP_GET_VARS['search'])) {
?>
                    <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_LINKS) . '">' . tep_image_button('button_reset.gif', IMAGE_RESET) . '</a>'; ?></td>
                    <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_LINKS, 'page=' . $HTTP_GET_VARS['page'] . '&action=new') . '">' . tep_image_button('button_new_link.gif', IMAGE_NEW_LINK) . '</a>'; ?></td>
<?php
    } else {
?>
                    <td align="right" colspan="2"><?php echo '<a href="' . tep_href_link(FILENAME_LINKS, 'page=' . $HTTP_GET_VARS['page'] . '&action=new') . '">' . tep_image_button('button_new_link.gif', IMAGE_NEW_LINK) . '</a>'; ?></td>
<?php
    }
?>
                  </tr>
                </table></td>
              </tr>
            </table></td>
<?php
  $heading = array();
  $contents = array();

  switch ($action) {
    case 'confirm':
      $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_LINK . '</b>');

      $contents = array('form' => tep_draw_form('links', FILENAME_LINKS, tep_get_all_get_params(array('lID', 'action')) . 'lID=' . $lInfo->links_id . '&action=deleteconfirm'));
      $contents[] = array('text' => TEXT_DELETE_INTRO . '<br><br><b>' . $lInfo->links_url . '</b>');
      $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('lID', 'action')) . 'lID=' . $lInfo->links_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;
    case 'check':
      $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_CHECK_LINK . '</b>');

      $url = $lInfo->links_reciprocal_url;

      if (file($url)) {
        $file = fopen($url,'r');

        $link_check_status = false;

        while (!feof($file)) {
          $page_line = trim(fgets($file, 4096));

          if (eregi(LINKS_CHECK_PHRASE, $page_line)) {
            $link_check_status = true;
            break;
          }
        }

        fclose($file);

        if ($link_check_status == true) {
          $link_check_status_text = TEXT_INFO_LINK_CHECK_FOUND;
        } else {
          $link_check_status_text = TEXT_INFO_LINK_CHECK_NOT_FOUND;
        }
      } else {
        $link_check_status_text = TEXT_INFO_LINK_CHECK_ERROR;
      }

      $contents[] = array('text' => TEXT_INFO_LINK_CHECK_RESULT . ' ' . $link_check_status_text);
      $contents[] = array('text' => '<br><b>' . $lInfo->links_reciprocal_url . '</b>');
      $contents[] = array('align' => 'center', 'text' => '<br><a href="' . tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('lID', 'action')) . 'lID=' . $lInfo->links_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;
    default:
      if (isset($lInfo) && is_object($lInfo)) {
        $heading[] = array('text' => '<b>' . $lInfo->links_title . '</b>');

        $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('lID', 'action')) . 'lID=' . $lInfo->links_id . '&action=edit') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('lID', 'action')) . 'lID=' . $lInfo->links_id . '&action=confirm') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a> <a href="' . tep_href_link(FILENAME_LINKS, tep_get_all_get_params(array('lID', 'action')) . 'lID=' . $lInfo->links_id . '&action=check') . '">' . tep_image_button('button_check_link.gif', IMAGE_CHECK_LINK) . '</a> <a href="' . tep_href_link(FILENAME_LINKS_CONTACT, 'link_partner=' . $lInfo->links_contact_email) . '">' . tep_image_button('button_email.gif', IMAGE_EMAIL) . '</a>');

        $contents[] = array('text' => '<br>' . TEXT_INFO_LINK_STATUS . ' '  . $links_status_array[$lInfo->links_status]);
        $contents[] = array('text' => '<br>' . TEXT_INFO_LINK_CATEGORY . ' '  . $lInfo->links_category);
        $contents[] = array('text' => '<br>' . tep_link_info_image($lInfo->links_image_url, $lInfo->links_title, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT) . '<br>' . $lInfo->links_title);
        $contents[] = array('text' => '<br>' . TEXT_INFO_LINK_CONTACT_NAME . ' '  . $lInfo->links_contact_name);
        $contents[] = array('text' => '<br>' . TEXT_INFO_LINK_CONTACT_EMAIL . ' ' . $lInfo->links_contact_email);
        $contents[] = array('text' => '<br>' . TEXT_INFO_LINK_CLICK_COUNT . ' ' . $lInfo->links_clicked);
        $contents[] = array('text' => '<br>' . TEXT_INFO_LINK_DESCRIPTION . ' ' . $lInfo->links_description);
        $contents[] = array('text' => '<br>' . TEXT_DATE_LINK_CREATED . ' ' . tep_date_short($lInfo->links_date_added));

        if (tep_not_null($lInfo->links_last_modified)) {
          $contents[] = array('text' => '<br>' . TEXT_DATE_LINK_LAST_MODIFIED . ' ' . tep_date_short($lInfo->links_last_modified));
        }
      }
      break;
  }

  if ( (tep_not_null($heading)) && (tep_not_null($contents)) ) {
    echo '            <td width="25%" valign="top" background="images/right_bg.gif">' . "\n";

    $box = new box;
    echo $box->infoBox($heading, $contents);

    echo '            </td>' . "\n";
  }
?>
          </tr>
        </table></td>
      </tr>
<?php
  }
?>
    </table></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
