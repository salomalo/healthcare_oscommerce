<?php

//----------------------------------------------
function newsdesk_get_path($current_category_id = '') {
//----------------------------------------------
  global $cPath_array;

  if ($current_category_id == '') {
    $cPath_new = implode('_', $cPath_array);
  } else {
    if (sizeof($cPath_array) == 0) {
      $cPath_new = $current_category_id;
    } else {
      $cPath_new = '';
      $last_category_query = tep_db_query("select parent_id from " . TABLE_NEWSDESK_CATEGORIES . " where categories_id = '" . $cPath_array[(sizeof($cPath_array)-1)] . "'");
      $last_category = tep_db_fetch_array($last_category_query);
      $current_category_query = tep_db_query("select parent_id from " . TABLE_NEWSDESK_CATEGORIES . " where categories_id = '" . $current_category_id . "'");
      $current_category = tep_db_fetch_array($current_category_query);
      if ($last_category['parent_id'] == $current_category['parent_id']) {
        for ($i = 0, $n = sizeof($cPath_array) - 1; $i < $n; $i++) {
          $cPath_new .= '_' . $cPath_array[$i];
        }
      } else {
        for ($i = 0, $n = sizeof($cPath_array); $i < $n; $i++) {
          $cPath_new .= '_' . $cPath_array[$i];
        }
      }
      $cPath_new .= '_' . $current_category_id;
      if (substr($cPath_new, 0, 1) == '_') {
        $cPath_new = substr($cPath_new, 1);
      }
    }
  }

  return 'cPath=' . $cPath_new;

}


//----------------------------------------------
function newsdesk_output_generated_category_path($id, $from = 'category') {
  //----------------------------------------------
  $calculated_category_path_string = '';
  $calculated_category_path = newsdesk_generate_category_path($id, $from);
  for ($i = 0, $n = sizeof($calculated_category_path); $i < $n; $i++) {
    for ($j = 0, $k = sizeof($calculated_category_path[$i]); $j < $k; $j++) {
      $calculated_category_path_string .= $calculated_category_path[$i][$j]['text'] . '&nbsp;&gt;&nbsp;';
    }
    $calculated_category_path_string = substr($calculated_category_path_string, 0, -16) . '<br>';
  }
  $calculated_category_path_string = substr($calculated_category_path_string, 0, -4);

  if (strlen($calculated_category_path_string) < 1) $calculated_category_path_string = TEXT_TOP;

  return $calculated_category_path_string;

}

//----------------------------------------------
function newsdesk_get_category_tree($parent_id = '0', $spacing = '', $exclude = '', $category_tree_array = '', $include_itself = false) {
  //----------------------------------------------
  global $languages_id;

  if (!is_array($category_tree_array)) $category_tree_array = array();
  if ( (sizeof($category_tree_array) < 1) && ($exclude != '0') ) $category_tree_array[] = array('id' => '0', 'text' => TEXT_TOP);

  if ($include_itself) {
    $category_query = tep_db_query("select cd.categories_name from " . TABLE_NEWSDESK_CATEGORIES_DESCRIPTION . " cd where cd.language_id = '" . $languages_id . "' and cd.categories_id = '" . $parent_id . "'");
    $category = tep_db_fetch_array($category_query);
    $category_tree_array[] = array('id' => $parent_id, 'text' => $category['categories_name']);
  }

  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_NEWSDESK_CATEGORIES . " c, " . TABLE_NEWSDESK_CATEGORIES_DESCRIPTION . " cd where c.categories_id = cd.categories_id and cd.language_id = '" . $languages_id . "' and c.parent_id = '" . $parent_id . "' order by c.sort_order, cd.categories_name");

  while ($categories = tep_db_fetch_array($categories_query)) {
    if ($exclude != $categories['categories_id']) $category_tree_array[] = array('id' => $categories['categories_id'], 'text' => $spacing . $categories['categories_name']);
    $category_tree_array = newsdesk_get_category_tree($categories['categories_id'], $spacing . '&nbsp;&nbsp;&nbsp;', $exclude, $category_tree_array);
  }

  return $category_tree_array;

}

//----------------------------------------------
// Count how many products exist in a category
// TABLES: products, products_to_categories, categories
function newsdesk_products_in_category_count($categories_id, $include_deactivated = false) {
  //----------------------------------------------
  $products_count = 0;

  if ($include_deactivated) {
    $products_query = tep_db_query("select count(*) as total from " . TABLE_NEWSDESK . " p, " . TABLE_NEWSDESK_TO_CATEGORIES . " p2c where p.newsdesk_id = p2c.newsdesk_id and p2c.categories_id = '" . $categories_id . "'");
  } else {
    $products_query = tep_db_query("select count(*) as total from " . TABLE_NEWSDESK . " p, " . TABLE_NEWSDESK_TO_CATEGORIES . " p2c where p.newsdesk_id = p2c.newsdesk_id and p.newsdesk_status = '1' and p2c.categories_id = '" . $categories_id . "'");
  }

  $products = tep_db_fetch_array($products_query);

  $products_count += $products['total'];

  $childs_query = tep_db_query("select categories_id from " . TABLE_NEWSDESK_CATEGORIES . " where parent_id = '" . $categories_id . "'");
  if (tep_db_num_rows($childs_query)) {
    while ($childs = tep_db_fetch_array($childs_query)) {
      $products_count += newsdesk_products_in_category_count($childs['categories_id'], $include_deactivated);
    }
  }

  return $products_count;

}


//----------------------------------------------
// Count how many subcategories exist in a category
// TABLES: categories
function newsdesk_childs_in_category_count($categories_id) {
  //----------------------------------------------
  $categories_count = 0;

  $categories_query = tep_db_query("select categories_id from " . TABLE_NEWSDESK_CATEGORIES . " where parent_id = '" . $categories_id . "'");
  while ($categories = tep_db_fetch_array($categories_query)) {
    $categories_count++;
    $categories_count += newsdesk_childs_in_category_count($categories['categories_id']);
  }

  return $categories_count;

}


//----------------------------------------------
function newsdesk_generate_category_path($id, $from = 'category', $categories_array = '', $index = 0) {
  //----------------------------------------------
  global $languages_id;

  if (!is_array($categories_array)) $categories_array = array();

  if ($from == 'product') {
    $categories_query = tep_db_query("select categories_id from " . TABLE_NEWSDESK_TO_CATEGORIES . " where newsdesk_id = '" . $id . "'");
    while ($categories = tep_db_fetch_array($categories_query)) {
      if ($categories['categories_id'] == '0') {
        $categories_array[$index][] = array('id' => '0', 'text' => TEXT_TOP);
      } else {
        $category_query = tep_db_query("select cd.categories_name, c.parent_id from " . TABLE_NEWSDESK_CATEGORIES . " c, " . TABLE_NEWSDESK_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . $categories['categories_id'] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . $languages_id . "'");
        $category = tep_db_fetch_array($category_query);
        $categories_array[$index][] = array('id' => $categories['categories_id'], 'text' => $category['categories_name']);
        if ( (tep_not_null($category['parent_id'])) && ($category['parent_id'] != '0') ) $categories_array = newsdesk_generate_category_path($category['parent_id'], 'category', $categories_array, $index);
        $categories_array[$index] = array_reverse($categories_array[$index]);
      }
      $index++;
    }
  } elseif ($from == 'category') {
    $category_query = tep_db_query("select cd.categories_name, c.parent_id from " . TABLE_NEWSDESK_CATEGORIES . " c, " . TABLE_NEWSDESK_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . $id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . $languages_id . "'");
    $category = tep_db_fetch_array($category_query);
    $categories_array[$index][] = array('id' => $id, 'text' => $category['categories_name']);
    if ( (tep_not_null($category['parent_id'])) && ($category['parent_id'] != '0') ) $categories_array = newsdesk_generate_category_path($category['parent_id'], 'category', $categories_array, $index);
  }

  return $categories_array;

}


//----------------------------------------------
function newsdesk_remove_category($category_id) {
  //----------------------------------------------
  $category_image_query = tep_db_query("select categories_image from " . TABLE_NEWSDESK_CATEGORIES . " where categories_id = '" . tep_db_input($category_id) . "'");
  $category_image = tep_db_fetch_array($category_image_query);

  $duplicate_image_query = tep_db_query("select count(*) as total from " . TABLE_NEWSDESK_CATEGORIES . " where categories_image = '" . tep_db_input($category_image['categories_image']) . "'");
  $duplicate_image = tep_db_fetch_array($duplicate_image_query);

  if ($duplicate_image['total'] < 2) {
    if (file_exists(DIR_FS_CATALOG_IMAGES . $category_image['categories_image'])) {
      @unlink(DIR_FS_CATALOG_IMAGES . $category_image['categories_image']);
    }
  }

  tep_db_query("delete from " . TABLE_NEWSDESK_CATEGORIES . " where categories_id = '" . tep_db_input($category_id) . "'");
  tep_db_query("delete from " . TABLE_NEWSDESK_CATEGORIES_DESCRIPTION . " where categories_id = '" . tep_db_input($category_id) . "'");
  tep_db_query("delete from " . TABLE_NEWSDESK_TO_CATEGORIES . " where categories_id = '" . tep_db_input($category_id) . "'");

  if (USE_CACHE == 'true') {
    tep_reset_cache_block('categories');
    tep_reset_cache_block('also_purchased');
  }

}


//----------------------------------------------
function newsdesk_remove_product($product_id) {
  //----------------------------------------------
  $product_image_query = tep_db_query("select newsdesk_image, newsdesk_image_two, newsdesk_image_three from " . TABLE_NEWSDESK . " where newsdesk_id = '" . tep_db_input($product_id) . "'");
  $product_image = tep_db_fetch_array($product_image_query);

  $duplicate_image_query = tep_db_query("select count(*) as total from " . TABLE_NEWSDESK . " where newsdesk_image = '" . tep_db_input($product_image['newsdesk_image']) . "'");
  $duplicate_image = tep_db_fetch_array($duplicate_image_query);

  if ($duplicate_image['total'] < 2) {
    if (file_exists(DIR_FS_CATALOG_IMAGES . $product_image['newsdesk_image'])) {
      @unlink(DIR_FS_CATALOG_IMAGES . $product_image['newsdesk_image']);
    }
  }
  $duplicate_image_query_two = tep_db_query("select count(*) as total from " . TABLE_NEWSDESK . " where newsdesk_image_two = '" . tep_db_input($product_image['newsdesk_image_two']) . "'");
  $duplicate_image_two = tep_db_fetch_array($duplicate_image_query_two);

  if ($duplicate_image_two['total'] < 2) {
    if (file_exists(DIR_FS_CATALOG_IMAGES . $product_image['newsdesk_image_two'])) {
      @unlink(DIR_FS_CATALOG_IMAGES . $product_image['newsdesk_image_two']);
    }
  }
  $duplicate_image_query_three = tep_db_query("select count(*) as total from " . TABLE_NEWSDESK . " where newsdesk_image_three = '" . tep_db_input($product_image['newsdesk_image_three']) . "'");
  $duplicate_image_three = tep_db_fetch_array($duplicate_image_query_three);

  if ($duplicate_image_three['total'] < 2) {
    if (file_exists(DIR_FS_CATALOG_IMAGES . $product_image['newsdesk_image_three'])) {
      @unlink(DIR_FS_CATALOG_IMAGES . $product_image['newsdesk_image_three']);
    }
  }

  tep_db_query("delete from " . TABLE_NEWSDESK . " where newsdesk_id = '" . tep_db_input($product_id) . "'");
  tep_db_query("delete from " . TABLE_NEWSDESK_TO_CATEGORIES . " where newsdesk_id = '" . tep_db_input($product_id) . "'");
  tep_db_query("delete from " . TABLE_NEWSDESK_DESCRIPTION . " where newsdesk_id = '" . tep_db_input($product_id) . "'");

  $product_reviews_query = tep_db_query("select reviews_id from " . TABLE_NEWSDESK_REVIEWS . " where newsdesk_id = '" . tep_db_input($product_id) . "'");
  while ($product_reviews = tep_db_fetch_array($product_reviews_query)) {
    tep_db_query("delete from " . TABLE_NEWSDESK_REVIEWS_DESCRIPTION . " where reviews_id = '" . $product_reviews['reviews_id'] . "'");
  }
  tep_db_query("delete from " . TABLE_NEWSDESK_REVIEWS . " where newsdesk_id = '" . tep_db_input($product_id) . "'");
}


//----------------------------------------------
// Sets the status of a product
//----------------------------------------------
function newsdesk_set_product_status($newsdesk_id, $status) {
  if ($status == '1') {
    return tep_db_query("update " . TABLE_NEWSDESK . " set newsdesk_status = '1', newsdesk_last_modified = now() where newsdesk_id = '" . $newsdesk_id . "'");
  } elseif ($status == '0') {
    return tep_db_query("update " . TABLE_NEWSDESK . " set newsdesk_status = '0', newsdesk_last_modified = now() where newsdesk_id = '" . $newsdesk_id . "'");
  } else {
    return -1;
  }
}

//----------------------------------------------
// Parse the data used in the html tags to ensure the tags will not break
function newsdesk_parse_input_field_data($data, $parse) {
  return strtr(trim($data), $parse);
}
//----------------------------------------------


//----------------------------------------------
function newsdesk_not_null($value) {
  if (is_array($value)) {
    if (sizeof($value) > 0) {
      return true;
    } else {
      return false;
    }
  } else {
    if (($value != '') && ($value != 'NULL') && (strlen(trim($value)) > 0)) {
      return true;
    } else {
      return false;
    }
  }

}
//----------------------------------------------


//----------------------------------------------
function newsdesk_set_categories_status($categories_id, $status) {
  if ($status == '1') {
    return tep_db_query("update " . TABLE_NEWSDESK_CATEGORIES . " set catagory_status = '1' where categories_id = '" . $categories_id . "'");
  } elseif ($status == '0') {
    return tep_db_query("update " . TABLE_NEWSDESK_CATEGORIES . " set catagory_status = '0' where categories_id = '" . $categories_id . "'");
  } else {
    return -1;
  }

}
//----------------------------------------------

function tep_get_description_field($table, $field, $key_field, $key_field_value, $language_id = 0){
  global $languages_id;

  if ($language_id == 0) $language_id = $languages_id;
  $query = tep_db_query("select " . $field . " from " . $table . " where " . $key_field . " = '" . $key_field_value . "' and language_id = '" . $language_id . "'");
  $data = tep_db_fetch_array($query);
  return $data[$field];
}


// -----------------------------------------------------------------------
// Sets the sticky of a product
// -----------------------------------------------------------------------
function newsdesk_set_product_sticky($newsdesk_id, $sticky) {
  if ($sticky == '1') {
    return tep_db_query("update " . TABLE_NEWSDESK . " set newsdesk_sticky = '1', newsdesk_last_modified = now() where newsdesk_id = '" . $newsdesk_id . "'");
  } elseif ($sticky == '0') {
    return tep_db_query("update " . TABLE_NEWSDESK . " set newsdesk_sticky = '0', newsdesk_last_modified = now() where newsdesk_id = '" . $newsdesk_id . "'");
  } else {
    return -1;
  }

}


// -----------------------------------------------------------------------
// nl2br >> br2nl ... stripbreaks code found on php.net forum
// -----------------------------------------------------------------------
function stripbr($str) {
  $str=eregi_replace('<BR[[:space:]]*/?[[:space:]]*>',"",$str);
  return $str;
}
// -----------------------------------------------------------------------


// -----------------------------------------------------------------------
function newsdesk_get_newsdesk_meta($product_id, $language_id) {
$product_query = tep_db_query("select newsdesk_article_meta_title, newsdesk_article_meta_description, newsdesk_article_meta_key from " . TABLE_NEWSDESK_DESCRIPTION . " where newsdesk_id = '" . $product_id . "' and language_id = '" . $language_id . "'");
$product = tep_db_fetch_array($product_query);

$arr_return = array('meta_title' => $product['newsdesk_article_meta_title'],
             'meta_description' => $product['newsdesk_article_meta_description'],
						 'meta_key' => $product['newsdesk_article_meta_key']);
						
return $arr_return;
}
// -----------------------------------------------------------------------
?>