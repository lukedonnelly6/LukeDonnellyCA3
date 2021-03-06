<?php include '../view/header.php'; ?>
<main>
    <h1>Add Animal</h1>
    <form action="index.php" method="post" id="add_animal_form">
        <input type="hidden" name="action" value="add_animal">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Type:</label>
        <input type="input" name="type">
        <br>

        <label>Name:</label>
        <input type="input" name="name">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Animal">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_animals">View Animal List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>