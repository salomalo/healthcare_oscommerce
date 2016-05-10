<?php
/*
  $Id: vendor_statistics.php,v 1.1.1.1 2005/12/03 21:36:02 max Exp $

  OSC-Affiliate

  Contribution based on:

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();
  
  if (tep_session_is_registered('login_vendor')){
    $HTTP_GET_VARS['acID'] = $login_id;
  }

  
  $vendor_query = tep_db_query("select * from " . TABLE_VENDOR . " where vendor_id ='" . $HTTP_GET_VARS['acID'] . "'");
 
  $vendor = tep_db_fetch_array($vendor_query);
  $vendor_percent = 0;
  $vendor_percent = $vendor['vendor_commission_percent'];
  if ($vendor_percent < VENDOR_PERCENT) $vendor_percent = VENDOR_PERCENT;
  

  $vendor_sales_raw = "
    select count(*) as count, sum(vendor_value) as total, sum(vendor_payment) as payment from " . TABLE_VENDOR_SALES . " a 
    left join " . TABLE_ORDERS . " o on (a.vendor_orders_id=o.orders_id) 
    where a.vendor_id = '" . $HTTP_GET_VARS['acID'] . "' and o.orders_status in (" . VENDOR_PAYMENT_ORDER_MIN_STATUS . ")
    ";
  $vendor_sales_query = tep_db_query($vendor_sales_raw);
  $vendor_sales = tep_db_fetch_array($vendor_sales_query);

  $vendor_transactions=$vendor_sales['count'];
  if ($vendor_clickthroughs > 0) {
	  $vendor_conversions = tep_round(($vendor_transactions / $vendor_clickthroughs)*100,2) . "%";
  } else {
    $vendor_conversions = "n/a";
  }

  if ($vendor_sales['total'] > 0) {
    $vendor_average = $vendor_sales['total'] / $vendor_sales['count'];
  } else {
    $vendor_average = 0;
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script language="javascript"><!--
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=450,height=120,screenX=150,screenY=150,top=150,left=150')
}
//--></script>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">
<!-- header //-->
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
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', 1, HEADING_IMAGE_HEIGHT); ?></td>
            <td class="pageHeading" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_VENDOR, tep_get_all_get_params(array('action'))) . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TEXT_SUMMARY_TITLE; ?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellpadding="4" cellspacing="2" class="dataTableContent">
              <center>
                <tr>
                  <td width="35%" align="right" class="dataTableContent"><b><?php echo TEXT_VENDOR_NAME; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td width="15%" class="dataTableContent"><?php echo $vendor['vendor_firstname'] . ' ' . $vendor['vendor_lastname']; ?></td>
                  <td width="35%" align="right" class="dataTableContent"><?php echo TEXT_VENDOR_JOINDATE; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td width="15%" class="dataTableContent"><?php echo tep_date_short($vendor['vendor_date_account_created']); ?></td>
                </tr>
                <tr>
                  <td width="35%" align="right" class="dataTableContent"><?php echo TEXT_TRANSACTIONS; ?><?php echo '<a href="javascript:popupWindow(\'' . tep_catalog_href_link(FILENAME_POPUP_VENDOR_HELP, 'action=3') . '\')">' . TEXT_SUMMARY_HELP . '</a>'; ?></td>
                  <td width="15%" class="dataTableContent"><?php echo $vendor_sales['count']; ?></td>
                </tr>
                <tr>
                  <td width="35%" align="right" class="dataTableContent"><?php echo TEXT_AMOUNT; ?><?php echo '<a href="javascript:popupWindow(\'' . tep_catalog_href_link(FILENAME_POPUP_VENDOR_HELP, 'action=5') . '\')">' . TEXT_SUMMARY_HELP . '</a>'; ?></td>
                  <td width="15%" class="dataTableContent"><?php echo $currencies->display_price($vendor_sales['total'], ''); ?></td>
                  <td width="35%" align="right" class="dataTableContent"><?php echo TEXT_AVERAGE; ?><?php echo '<a href="javascript:popupWindow(\'' . tep_catalog_href_link(FILENAME_POPUP_VENDOR_HELP, 'action=6') . '\')">' . TEXT_SUMMARY_HELP . '</a>'; ?></td>
                  <td width="15%" class="dataTableContent"><?php echo $currencies->display_price($vendor_average, ''); ?></td>
                </tr>
                <tr>
                  <td width="35%" align="right" class="dataTableContent"><?php echo TEXT_COMMISSION_RATE; ?><?php echo '<a href="javascript:popupWindow(\'' . tep_catalog_href_link(FILENAME_POPUP_VENDOR_HELP, 'action=7') . '\')">' . TEXT_SUMMARY_HELP . '</a>'; ?></td>
                  <td width="15%" class="dataTableContent"><?php echo $vendor_percent, ' %'; ?></td>
                  <td width="35%" align="right" class="dataTableContent"><b><?php echo TEXT_COMMISSION; ?><?php echo '<a href="javascript:popupWindow(\'' . tep_catalog_href_link(FILENAME_POPUP_VENDOR_HELP, 'action=8') . '\')">' . TEXT_SUMMARY_HELP . '</a>'; ?></b></td>
                  <td width="15%" class="dataTableContent"><b><?php echo $currencies->display_price($vendor_sales['payment'], ''); ?></b></td>
                </tr>
                <tr>
                  <td colspan="4"><?php echo tep_draw_separator(); ?></td>
                </tr>
                <tr>
                  <td align="center" class="dataTableContent" colspan="4"><b><?php echo TEXT_SUMMARY; ?></b></td>
                </tr>
                <tr>
                  <td colspan="4"><?php echo tep_draw_separator(); ?></td>
                </tr>
                <tr>
                  <td align="right" class="dataTableContent" colspan="4"><?php echo '<a href="' . tep_href_link(FILENAME_VENDOR_SALES, 'acID=' . $HTTP_GET_VARS['acID']) . '">' . tep_image_button('button_affiliate_sales.gif', IMAGE_SALES) . '</a>'; ?></td>
                </tr>
              </center>
            </table></td>
          </tr>
        </table></td>
      </tr>
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
<?php require(DIR_WS_INCLUDES . 'application_bottom.php');?>