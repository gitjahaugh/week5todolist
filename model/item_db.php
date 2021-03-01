<?php 

    function get_items_by_category($category_id) {
        global $db;
        if ($category_id) {
            $query =   'SELECT T.ItemNum, T.Title, T.Description, C.categoryName
                        FROM todoitems T 
                        LEFT JOIN categories C ON T.categoryID = C.categoryID
                        WHERE T.categoryID = :categoryID
                        ORDER BY T.ItemNum';
        } else {
            $query =   'SELECT T.ItemNum, T.Title, T.Description, C.categoryName
                        FROM todoitems T 
                        LEFT JOIN categories C ON T.categoryID = C.categoryID
                        ORDER BY C.categoryID';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $category_id);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    function delete_item($item_id) {
        global $db;
        $query =   'DELETE FROM todoitems
                    WHERE ItemNum = :item_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':item_id', $item_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_item($category_id, $title, $description) {
        global $db;
        $query =   'INSERT INTO todoitems
                        (Title, Description, categoryID)
                    VALUES 
                        (:title, :description, :category_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $statement->closeCursor();
    }