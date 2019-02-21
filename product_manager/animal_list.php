<?php include '../view/header.php'; ?>
<main>

    <h1>Product List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/category_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of animals -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>AnimalID</th>
                <th>CategoryID</th>
                <th class="right">LocationID</th>
                <th>Type</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($animals as $animal) : ?>
            <tr>
                <td><?php echo $animal['animalID']; ?></td>
                <td><?php echo $animal['categoryID']; ?></td>
                <td class="right"><?php echo $animal['locationID']; ?></td>
                <td><?php echo $animal['type']; ?></td>
                <td><?php echo $animal['name']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="animal_id"
                           value="<?php echo $animal['animalID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $animal['categoryID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_animal">
                    <input type="hidden" name="animal_id"
                           value="<?php echo $animal['animalID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $animal['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Product</a></p>
        <p><a href="?action=list_categories">List Categories</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>