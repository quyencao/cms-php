<?php

    function insert_categories() {

        // use global $connection
        global $connection;

        if(isset($_POST["submit"])) {

            $cat_title = $_POST["cat-title"];

            if($cat_title == "" || empty($cat_title)) {

                echo "<div class='alert alert-danger'>This field should not be empty</div>";

            } else {

                $cat_title = filter_var($cat_title, FILTER_SANITIZE_STRING);

                $query = "INSERT INTO categories (cat_title) VALUES ('{$cat_title}')";

                $create_category = mysqli_query($connection, $query);

                if(!$create_category) {

                    die("QUERY FAILED " . mysqli_error($connection));

                }

            }

        }
    }

    function findAllCategories() {
        global $connection;

        $query = "SELECT * FROM categories";

        $select_categories = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_categories)) {

            $cat_id = $row["cat_id"];
            $cat_title = $row["cat_title"];

            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?update={$cat_id}' class='btn btn-info'>Update</a></td>";
            echo "<td><a href='categories.php?delete={$cat_id}' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";

        }

    }

    function deleteCategory() {
        global $connection;

        if(isset($_GET["delete"])) {

            $delete_cat_id = $_GET["delete"];

            if(filter_var($delete_cat_id, FILTER_VALIDATE_INT)) {

                $delete_cat_id = filter_var($delete_cat_id, FILTER_SANITIZE_NUMBER_INT);

                $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id}";

                $delete_query = mysqli_query($connection, $query);

                header("Location: categories.php");

            } else {

                echo "<div class='alert alert-danger'>Unable to delete category</div>";

            }

        }
    }

?>