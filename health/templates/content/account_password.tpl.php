    <?php echo tep_draw_form('account_password', tep_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL'), 'post', 'onSubmit="return check_form(account_password);"') . tep_draw_hidden_field('action', 'process'); ?><table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB; ?>">
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
  $infobox_contents[] = array(array('text' =>HEADING_TITLE), array('params'=> 'align=right', 'text' => tep_image(DIR_WS_TEMPLATE_IMAGES . 'spacer.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT)));
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
$header_text = HEADING_TITLE;
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

<?php
  if ($messageStack->size('account_password') > 0) {
?>
      <tr>
        <td><?php echo $messageStack->output('account_password'); ?></td>
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
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td class="inputRequirement" align="right"><?php echo FORM_REQUIRED_INFORMATION; ?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('text' => MY_PASSWORD_TITLE);

  new contentBoxHeading($info_box_contents, false, false);

?>
        <table border="0" width="100%" cellspacing="0" cellpadding="1" class="contentBox">
          <tr>
            <td><table border="0" cellspacing="2" cellpadding="2" class="contentBoxContents" width="100%" height="100%">  
                  <tr>
                    <td class="main"><?php echo ENTRY_PASSWORD_CURRENT; ?></td>
                    <td class="main"><?php echo tep_draw_password_field('password_current') . '&nbsp;' . (tep_not_null(ENTRY_PASSWORD_CURRENT_TEXT) ? '<span class="inputRequirement">' . ENTRY_PASSWORD_CURRENT_TEXT . '</span>': ''); ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                  </tr>
                  <tr>
                    <td class="main"><?php echo ENTRY_PASSWORD_NEW; ?></td>
                    <td class="main"><?php echo tep_draw_password_field('password_new') . '&nbsp;' . (tep_not_null(ENTRY_PASSWORD_NEW_TEXT) ? '<span class="inputRequirement">' . ENTRY_PASSWORD_NEW_TEXT . '</span>': ''); ?></td>
                  </tr>
                  <tr>
                    <td class="main"><?php echo ENTRY_PASSWORD_CONFIRMATION; ?></td>
                    <td class="main"><?php echo tep_draw_password_field('password_confirmation') . '&nbsp;' . (tep_not_null(ENTRY_PASSWORD_CONFIRMATION_TEXT) ? '<span class="inputRequirement">' . ENTRY_PASSWORD_CONFIRMATION_TEXT . '</span>': ''); ?></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_bottom();
}
// EOF: Lango Added for template MOD
?>
<?php
  if (CELLPADDING_SUB < 5){
?>      
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
                               array('params' => 'align="left" class="main" width=100%', 'text' => '<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . tep_template_image_button('button_back.' . BUTTON_IMAGE_TYPE, IMAGE_BUTTON_BACK, 'class="transpng"') . '</a>'),
                               array('params' => 'align="right" class="main"', 'text' => tep_template_image_submit('button_continue.' . BUTTON_IMAGE_TYPE, IMAGE_BUTTON_CONTINUE, 'class="transpng"')),
                               array('text' => tep_draw_separator('pixel_trans.gif', '10', '1')));
  new buttonBox($info_box_contents);
?> 
        </td>
      </tr>
    </table></form>
