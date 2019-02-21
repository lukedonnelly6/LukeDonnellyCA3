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
    // Get the current category ID
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    
    // Get animals and category data
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $animals = get_animals_by_category($category_id);

    // Display the animals list
    include('animal_list.php');
} else if ($action == 'show_edit_form') {
    $animal_id = filter_input(INPUT_POST, 'animal_id', 
            FILTER_VALIDATE_INT);
    if ($animal_id == NULL || $animal_id == FALSE) {
        $error = "Missing or incorrect animals id.";
        include('../errors/error.php');
    } else { 
        $animals = get_animals($animal_id);
        include('animal_edit.php');
    }
} else if ($action == 'update_animal') {
    $animal_id = filter_input(INPUT_POST, 'animal_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $location_id = filter_input(INPUT_POST, 'location_id', 
            FILTER_VALIDATE_INT);
    $type = filter_input(INPUT_POST, 'type');
    $name = filter_input(INPUT_POST, 'name');
    

    // Validate the inputs
    if ($animal_id == NULL || $animal_id == FALSE || $category_id == NULL || 
            $category_id == FALSE || $location_id == NULL || $location_id == FALSE ||
            $type == NULL || $name == NULL) {
        $error = "Invalid animals data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_animals($animal_id, $category_id, $location_id, $type, $name);

        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'delete_animal') {
    $animal_id = filter_input(INPUT_POST, 'animal_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $animal_id == NULL || $animal_id == FALSE) {
        $error = "Missing or incorrect animals id or category id.";
        include('../errors/error.php');
    } else { 
        delete_animals($animal_id);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('animal_add.php');
} else if ($action == 'add_animal') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $location_id = filter_input(INPUT_POST, 'location_id', 
            FILTER_VALIDATE_INT);
    $type = filter_input(INPUT_POST, 'type');
    $name = filter_input(INPUT_POST, 'name');
    if ($category_id == NULL || $category_id == FALSE || $location_id == NULL || $location_id == FALSE ||
            $type == NULL || 
            $name == NULL) {
        $error = "Invalid animal data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_animals($category_id, $location_id, $type, $name);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('category_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');      // display the Category List page
}
?>