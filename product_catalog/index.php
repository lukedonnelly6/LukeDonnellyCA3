<?php
require('../model/database.php');
require('../model/animal_db.php');
require('../model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_animals';
    }
} 

if ($action == 'list_animals') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $categories = get_categories();
    $category_name = get_category_name($category_id);
    $animals = get_animals_by_category($category_id);

    include('animal_list.php');
} else if ($action == 'view_animal') {
    $animal_id = filter_input(INPUT_GET, 'animal_id', 
            FILTER_VALIDATE_INT);   
    if ($animal_id == NULL || $animal_id == FALSE) {
        $error = 'Missing or incorrect animal id.';
        include('../errors/error.php');
    } else {
        $categories = get_categories();
        $animal = get_animal($animal_id);

        // Get animal data
        $code = $animal['animalID'];
        $name = $animal['categoryID'];
        $list_price = $animal['locationID'];

        // Calculate discounts
        $discount_percent = 30;  // 30% off for all web orders
        $discount_amount = round($list_price * ($discount_percent/100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Format the calculations
        $discount_amount_f = number_format($discount_amount, 2);
        $unit_price_f = number_format($unit_price, 2);

        // Get image URL and alternate text
        $image_filename = '../images/' . $code . '.png';
        $image_alt = 'Image: ' . $code . '.png';

        include('animal_view.php');
    }
}
?>