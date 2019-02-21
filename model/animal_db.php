<?php
function get_animals() {
    global $db;
    $query = 'SELECT * FROM animals
              ORDER BY animalID';
    $statement = $db->prepare($query);
    $statement->execute();
    $animals = $statement->fetchAll();
    $statement->closeCursor();
    return $animals;
}

function get_animals_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM animals
              WHERE animals.categoryID = :category_id
              ORDER BY animalID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $animals = $statement->fetchAll();
    $statement->closeCursor();
    return $animals;
}

function get_animal($animal_id) {
    global $db;
    $query = 'SELECT * FROM animals
              WHERE animalID = :animal_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":animal_id", $animal_id);
    $statement->execute();
    $animal = $statement->fetch();
    $statement->closeCursor();
    return $animal;
}

function delete_animal($animal_id) {
    global $db;
    $query = 'DELETE FROM animals
              WHERE animalID = :animal_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':animal_id', $animal_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_animal($category_id, $location_id, $type, $name) {
    global $db;
    $query = 'INSERT INTO animals
                 (categoryID, locationID, type, name)
              VALUES
                 (:category_id, :location_id, :type, :name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':location_id', $location_id);
    $statement->bindValue(':type', $type);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function update_animal($animal_id, $category_id, $location_id, $type, $name) {
    global $db;
    $query = 'UPDATE animals
              SET categoryID = :category_id,
                  locationID = :location_id,
                  type = :name,
                  name = :price
               WHERE animalID = :animal_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':location_id', $location_id);
    $statement->bindValue(':type', $type);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':animal_id', $animal_id);
    $statement->execute();
    $statement->closeCursor();
}
?>