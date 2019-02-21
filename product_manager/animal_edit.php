<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Animal</h1>
    <form action="index.php" method="post" id="add_animal_form">

        <input type="hidden" name="action" value="update_animal">

        <input type="hidden" name="animal_id"
               value="<?php echo $animal['animalID']; ?>">

        <label>Category ID:</label>
        <input type="category_id" name="category_id"
               value="<?php echo $animal['categoryID']; ?>">
      
        <label>Location ID:</label>
        <input type="location_id" name="location_id"
               value="<?php echo $animal['locationID']; ?>">
        <br>
        
        <label>Type:</label>
        <input type="input" name="type"
               value="<?php echo $animal['type']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $animal['name']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_animals">View Animal List</a></p>

</main>
<?php include '../view/footer.php'; ?>