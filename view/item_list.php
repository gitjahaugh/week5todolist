<?php include('view/header.php'); ?>
    <section id="list" class="list">
        <header class="list__row list__header">
            <h1>Tasks</h1>
            <form action="." method="GET" id="list__header_select" class="list__header_select">
                <input type="hidden" name="action" value="list_items">
                <select name="category_id" required>
                    <option value="0">View All Categories</option>
                    <?php foreach ($categories as $category) : ?>
                    <?php if ($category_id == $category['categoryID']) { ?>
                        <option value="<?= $category['categoryID'] ?>"
                        selected>
                    <?php } else {?>
                        <option value="<?= $category['categoryID'] ?>">
                    <?php } ?>
                        <?= $category['categoryName'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <button class="add-button">Submit</button>
            </form>
        </header>

        <?php if($items) { ?>
            <?php foreach($items as $item) : ?>
            <div class="list__row">
                <div class="list_item">
                    <p class="bold"><?= $item['Title'] ?></p>
                    <p><?= $item['Description'] ?></p>
                    <p><?= $item['categoryName'] ?></p>
                </div>

                <div class="list__removeItem">
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete_item">
                        <input type="hidden" name="item_id" value="<?= $item['ItemNum'] ?>">
                        <button class="remove_button">Delete</button>
                    </form>
                </div>
            </div>

            <?php endforeach; ?>
            <?php } else { ?>
            <br>
            <?php if ($category_id) { ?>
                <p>No to do items exist for this category yet.</p>
            <?php } else { ?>
                <p>No to do items exist yet.</p>
            <?php } ?>
            <br>
            <?php } ?>
    </section>

    <section id="add" class="add">
        <h2>Add Task</h2>
        <form action="." method="POST" id="add__form" class="add_form">
            <input type="hidden" name="action" value="add_item">
            <div class="add__inputs">
                <label>Category:</label>
                <select name="category_id" required>
                    <option value="">Please select a category</option>
                    <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['categoryID']; ?>">
                        <?= $category['categoryName']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <label>Title:</label>
                <input type="text" name="title"  maxlength="20" placeholder="Title" required>
                <label>Description:</label>
                <input type="text" name="description" maxlength="50" placeholder="Description" required>
            </div>

            <div class="add_addItem">
                <button class="add-button">Add Task</button>
            </div>
        </form>
    </section>
    <br>
    <p><a href=".?action=list_categories">View/Edit Categories</a></p>
<?php include('view/footer.php'); ?>