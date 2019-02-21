<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/category_nav.php'; ?>        
    </aside>
    <section>
        <h1><?php echo $category_name; ?></h1>
        <ul class="nav">
            <!-- display links for animals in selected category -->
            <?php foreach ($animals as $animal) : ?>
            <li>
                <a href="?action=view_animal&amp;animal_id=<?php 
                          echo $animal['animalID']; ?>">
                    <?php echo $animal['categoryID']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include '../view/footer.php'; ?>