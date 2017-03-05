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

?>