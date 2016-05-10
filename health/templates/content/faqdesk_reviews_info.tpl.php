<?php

?>

<!-- body_text //-->
<table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB; ?>">

<?php
tep_db_query("update " . TABLE_FAQDESK_REVIEWS . " set reviews_read = reviews_read+1 where reviews_id = '" . (int)$HTTP_GET_VARS['reviews_id'] . "'");

$reviews = tep_db_query("select rd.reviews_text, r.reviews_rating, r.reviews_id, r.faqdesk_id, r.customers_name, r.date_added, r.last_modified, r.reviews_read from " . TABLE_FAQDESK_REVIEWS . " r, " . TABLE_FAQDESK_REVIEWS_DESCRIPTION . " rd where r.reviews_id = '" . (int)$HTTP_GET_VARS['reviews_id'] . "' and r.reviews_id = rd.reviews_id");

$reviews_values = tep_db_fetch_array($reviews);

$reviews_text = htmlspecialchars($reviews_values['reviews_text']);
$reviews_text = tep_break_string($reviews_text, 60, '-<br>');

$product = tep_db_query("select p.faqdesk_id, pd.faqdesk_question, p.faqdesk_image from " . TABLE_FAQDESK . " p, " . TABLE_FAQDESK_DESCRIPTION . " pd where p.faqdesk_id = '" . (int)$reviews_values['faqdesk_id'] . "' and pd.faqdesk_id = p.faqdesk_id and pd.language_id = '". (int)$languages_id . "'");

$product_info_values = tep_db_fetch_array($product);
?>
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
  $infobox_contents[] = array(array('text' =>sprintf(HEADING_TITLE, $product_info_values['products_name'])), array('params'=> 'align=right', 'text' => tep_image(DIR_WS_TEMPLATE_IMAGES . 'spacer.gif', sprintf(HEADING_TITLE, $product_info_values['faqdesk_question']), HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT)));
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
// BOF: Lango Added for template MOD
}else{
$header_text = sprintf(HEADING_TITLE, $product_info_values['products_name']);
}
// EOF: Lango Added for template MOD
?>
 
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_top(false, false, $header_text);
}
// EOF: Lango Added for template MOD
?>


	<tr>
		<td><table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="main"><b><?php echo SUB_TITLE_PRODUCT; ?></b> <?php echo $product_info_values['faqdesk_question']; ?></td>
		<td class="smallText" rowspan="3" align="center">
<?php if ($product_info_values['faqdesk_image']) echo tep_image(DIR_WS_IMAGES . $product_info_values['faqdesk_image'], $product_info_values['faqdesk_question'], '', '', 'align="center" hspace="5" vspace="5"'); ?>
		</td>
	</tr>
	<tr>
		<td class="main"><b><?php echo SUB_TITLE_FROM; ?></b> <?php echo $reviews_values['customers_name']; ?></td>
	</tr>
	<tr>
		<td class="main"><b><?php echo SUB_TITLE_DATE; ?></b> <?php echo tep_date_long($reviews_values['date_added']); ?></td>
	</tr>
</table>
		</td>
	</tr>
	<tr>
		<td class="main"><b><?php echo SUB_TITLE_REVIEW; ?></b></td>
	</tr>
	<tr>
		<td class="main"><br><?php echo nl2br($reviews_text); ?></td>
	</tr>
	<tr>
		<td class="main">
<br><b>
<?php
echo SUB_TITLE_RATING; ?></b> <?php echo tep_image(DIR_WS_TEMPLATE_IMAGES . 'reviews/stars_' . $reviews_values['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews_values['reviews_rating'])); ?> <small>[<?php echo sprintf(TEXT_OF_5_STARS, $reviews_values['reviews_rating']); ?>]</small>
		</td>
	</tr>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_bottom();
}
// EOF: Lango Added for template MOD
?>	
	<tr>
		<td>
		<br>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="main">
		</td>
		<td align="right" class="main">
<?php
  $info_box_contents = array();
  $info_box_contents[] = array(array('text' => tep_draw_separator('pixel_trans.gif', '10', '1')),
                               array('params' => 'align=right width=100%', 'text' => '<a href="' . tep_href_link(FILENAME_FAQDESK_REVIEWS_ARTICLE, $get_params, 'NONSSL') . '">' . tep_template_image_button('button_back.' . BUTTON_IMAGE_TYPE, IMAGE_BUTTON_BACK, 'class="transpng"') . '</a>'),
                               array('text' => tep_draw_separator('pixel_trans.gif', '10', '1')));
  new buttonBox($info_box_contents);
?>    

		</td>
	</tr>
</table>
		</td>
	</tr>
</table>

<!-- body_text_eof //-->

<?php
/*

	osCommerce, Open Source E-Commerce Solutions ---- http://www.oscommerce.com
	Copyright (c) 2002 osCommerce
	Released under the GNU General Public License

	IMPORTANT NOTE:

	This script is not part of the official osC distribution but an add-on contributed to the osC community.
	Please read the NOTE and INSTALL documents that are provided with this file for further information and installation notes.

	script name:	FaqDesk
	version:		1.2.5
	date:			2003-09-01
	author:			Carsten aka moyashi
	web site:		www..com

*/
?>