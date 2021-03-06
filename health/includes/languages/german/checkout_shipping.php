<?php
/*
  $Id: checkout_shipping.php,v 1.1.1.1 2005/12/03 21:36:11 max Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Kasse');
define('NAVBAR_TITLE_2', 'Versandinformationen');

define('HEADING_TITLE', 'Versandinformationen');

define('TABLE_HEADING_SHIPPING_ADDRESS', 'Versandadresse');
define('TEXT_CHOOSE_SHIPPING_DESTINATION', 'Bitte w&auml;hlen Sie aus Ihrem Adressbuch die gew&uuml;nschte Versandadresse f&uuml;r Ihre Bestellung.');
define('TITLE_SHIPPING_ADDRESS', 'Versandadresse:');

define('TABLE_HEADING_SHIPPING_METHOD', 'Versandart');
define('TEXT_CHOOSE_SHIPPING_METHOD', 'Bitte w&auml;hlen Sie die gew&uuml;nschte Versandart f&uuml;r Ihre Bestellung.');
define('TITLE_PLEASE_SELECT', 'Bitte w&auml;hlen Sie aus');
define('TEXT_ENTER_SHIPPING_INFORMATION', 'Zur Zeit bieten wir Ihnen nur eine Versandart an.');

define('TABLE_HEADING_COMMENTS', 'F&uuml;gen Sie hier Ihre Anmerkungen zu dieser Bestellung ein');

define('TITLE_CONTINUE_CHECKOUT_PROCEDURE', 'Bestellvorgang fortsetzen');
define('TEXT_CONTINUE_CHECKOUT_PROCEDURE', 'Gew&uuml;nschte Zahlungsweise ausw&auml;hlen.');
define('TEXT_ERROR_CHECKOUT', 'You cann\'t process to checkout due to some limitations. Please <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">contact</a> store owner for more information.');
?>