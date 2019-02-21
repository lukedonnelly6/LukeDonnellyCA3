<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM category
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM category
              WHERE categoryID = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['categoryName'];
    return $category_name;
}

function add_category($name) {
    global $db;
    $query = 'INSERT INTO category (categoryName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_category($category_id) {
    global $db;
    $query = 'DELETE FROM category
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}
?>