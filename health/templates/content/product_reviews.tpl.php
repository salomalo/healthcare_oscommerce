    <table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB;?>">
<?php
// BOF: Lango Added for template MOD
if (SHOW_HEADING_TITLE_ORIGINAL == 'yes') {
$header_text = '&nbsp;'
//EOF: Lango Added for template MOD
?>
      <tr>
        <td>
<?php
  $infobox_contents = array();
  $infobox_contents[] = array(array('text' =>$products_name), array('params'=> 'align=right', 'text' => $products_price));
  new contentPageHeading($infobox_contents);
?>        
        </td>
      </tr>
<?php
  if (CELLPADDING_SUB < 5){
?>      
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
  }
?>
<?php
}else{
$header_text = $products_name . '&nbsp;&nbsp;&nbsp;&nbsp;' . $products_price;
}
?>
<?php
  if ($messageStack->size('review') > 0) {
?>
      <tr>
        <td><?php echo $messageStack->output('review'); ?></td>
      </tr>
<?php
  if (CELLPADDING_SUB < 5){
?>      
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
  }
?> 
<?php
  }
?>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php

  $add_sql_query = "";
  if(isset($HTTP_GET_VARS['rs']) && $HTTP_GET_VARS['rs']!="")
  {
   $arr_reviews = explode("_", $HTTP_GET_VARS['rs']);
   if(count($arr_reviews)>0)
   {
    $add_sql_query = " and r.reviews_id not in ('" . implode("', '", $arr_reviews) . "')";
   }
  }

  $reviews_query_raw = "select r.reviews_id, rd.reviews_text as reviews_text, r.reviews_rating, r.date_added, r.customers_name from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd where status and r.products_id = '" . (int)$product_info['products_id'] . "' and r.reviews_id = rd.reviews_id and rd.languages_id = '" . (int)$languages_id . "' " . $add_sql_query . " order by r.reviews_id desc";
  $reviews_split = new splitPageResults($reviews_query_raw, MAX_DISPLAY_NEW_REVIEWS);

  if ($reviews_split->number_of_rows > 0) {
    if ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3')) {
?>
              <tr>
                <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></td>
                    <td align="right" class="smallText"><?php echo TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))); ?></td>
                  </tr>
                </table></td>
              </tr>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_top(false, false, $header_text);
}
// EOF: Lango Added for template MOD
?>
<?php
    }
    $reviews_query = tep_db_query($reviews_split->sql_query);
    while ($reviews = tep_db_fetch_array($reviews_query)) {
?>
              <tr>
                <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="main"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $product_info['products_id'] . '&reviews_id=' . $reviews['reviews_id'] . (isset($HTTP_GET_VARS['rs']) && $HTTP_GET_VARS['rs']!=""?"&rs=" . $HTTP_GET_VARS['rs']:"")) . '"><u><b>' . sprintf(TEXT_REVIEW_BY, tep_output_string_protected($reviews['customers_name'])) . '</b></u></a>'; ?></td>
                    <td class="smallText" align="right"><?php echo sprintf(TEXT_REVIEW_DATE_ADDED, tep_date_long($reviews['date_added'])); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>
        <table border="0" width="100%" cellspacing="0" cellpadding="1" class="contentBox">
          <tr>
            <td><table border="0" cellspacing="2" cellpadding="2" class="contentBoxContents" width="100%" height="100%"> 
                      <tr>
                        <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                        <td valign="top" class="main">
	                        <?php echo $reviews['reviews_text'];?><br>
	                        <br>
	                        <i>Rating:</i>
	                        <img src="templates/Original/images/reviews/stars_<?=$reviews['reviews_rating'];?>.gif" alt="<?=$reviews['reviews_rating'];?> stars">
	                        <i>[<?=$reviews['reviews_rating'];?> of 5 stars]</i>
                       </td>
                        <td width="10" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
<?php
  if (CELLPADDING_SUB < 5){
?>      
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
  }
?>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_bottom();
}
// EOF: Lango Added for template MOD
?>
<?php
    }
?>
<?php
  } else {
?>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_top(false, false, $header_text);
}
// EOF: Lango Added for template MOD
?>
              <tr>
                <td align="center" class="infoboxContents"><?php echo TEXT_NO_REVIEWS; ?></td>
              </tr>
              <tr>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_bottom();
}
// EOF: Lango Added for template MOD
?>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
<?php
  }
  if (($reviews_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
              <tr>
                <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></td>
                    <td align="right" class="smallText"><?php echo TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
<?php
  }
?>
              <tr>
                <td>
<?php
  $info_box_contents = array();
  $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '10', '1')),
                               array('params' => 'align=left width=100%', 'text' => '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params()) . '">' . tep_template_image_button('button_back.' . BUTTON_IMAGE_TYPE, IMAGE_BUTTON_BACK, 'class="transpng"') . '</a>'),
                               array('params' => 'align=right width=100%', 'text' => '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, tep_get_all_get_params()) . '">' . tep_template_image_button('button_write_review.' . BUTTON_IMAGE_TYPE, IMAGE_BUTTON_WRITE_REVIEW, 'class="transpng"') . '</a>'),
                               array('text' => tep_draw_separator('pixel_trans.gif', '10', '1')));
  new buttonBox($info_box_contents);
?>                

                </td>
              </tr>
            </table></td>
            <td width="<?php echo SMALL_IMAGE_WIDTH + 10; ?>" align="right" valign="top"><table border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td align="center" class="smallText">
<?php
  if (tep_not_null($product_info['products_image'])) {
?>
<script language="javascript"><!--
document.write('<?php echo '<a href="javascript:popupWindow(\\\'' . tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id']) . '\\\')">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], addslashes($product_info['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"') . '<br>' . tep_template_image_button('image_enlarge.' . BUTTON_IMAGE_TYPE, TEXT_CLICK_TO_ENLARGE, 'class="transpng" align="absmiddle"')  . '</a>'; ?>');
//-->
</script>
<noscript>
<?php echo '<a href="' . tep_href_link(DIR_WS_IMAGES . $product_info['products_image']) . '" target="_blank">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"') . '<br>' . tep_template_image_button('image_enlarge.' . BUTTON_IMAGE_TYPE, TEXT_CLICK_TO_ENLARGE, 'class="transpng" align="absmiddle"') . '</a>'; ?>
</noscript>
<?php
  }
  $wishlist_id_query = tep_db_query('select products_id as wPID from ' . TABLE_WISHLIST . ' where products_id= ' . $product_info['products_id'] . ' and customers_id = ' . (int)$customer_id . ' order by products_name');
$wishlist_Pid = tep_db_fetch_array($wishlist_id_query);

  echo '<p><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now') . '">' . tep_template_image_button('button_in_cart.' . BUTTON_IMAGE_TYPE, IMAGE_BUTTON_IN_CART, 'class="transpng"') . '</a><br><br>';
echo '<form name="wishlist_quantity" method="post" action="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=add_wishlist', 'NONSSL') . '">';
echo '                    <input type="hidden" name="products_id" value="' . $product_info['products_id'] . '">
                          <input type="hidden" name="products_model" value="' . $product_info['products_model'] . '">
                          <input type="hidden" name="products_name" value="' . $product_info['products_name'] . '">
                          <input type="hidden" name="products_price" value="' . $product_info['products_price'] . '">
                          <input type="hidden" name="final_price" value="' . $product_info['final_price'] . '">
                          <input type="hidden" name="products_tax" value="' . $product_info['products_tax'] . '">'; 
    
if ( (!tep_not_null($wishlist_Pid[wPID])) && (tep_session_is_registered('customer_id')) )  echo tep_template_image_submit('button_add_wishlist.' . BUTTON_IMAGE_TYPE, IMAGE_BUTTON_ADD_WISHLIST, 'class="transpng"');
echo  '
                        </form>
</p>';
?>
                </td>
              </tr>
            </table>
          </td>
        </table></td>
      </tr>
    </table>
