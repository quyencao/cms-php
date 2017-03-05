<form action="" method="post">
    <label for="cat-title">Edit Category</label>

    <?php

    // Populate field when click update link

    if(isset($_GET["update"])) {

        $update_cat_id = $_GET["update"];

        if(filter_var($update_cat_id, FILTER_VALIDATE_INT)) {

            $update_cat_id = filter_var($update_cat_id, FILTER_SANITIZE_NUMBER_INT);

            $query = "SELECT * FROM categories WHERE cat_id = {$update_cat_id}";

            $update_category = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($update_category)) {

                $cat_id = $row["cat_id"];
                $cat_title = $row["cat_title"];

                ?>
                <div class="form-group">
                    <input type="text" name="cat-title" class="form-control" id="cat-title" value="<?php echo $cat_title; ?>"/>
                </div>

                <?php
            }
        }

    }

    ?>

    <?php
    // Update query
    if(isset($_POST["update_category"])) {

        $update_cat_title = $_POST["cat-title"];
        $update_cat_id = $_GET["update"];

        if($update_cat_title == "" || empty($update_cat_title)) {

            echo "<div class='alert alert-danger'>This field should not be empty</div>";

        } else {

            $update_cat_title = filter_var($update_cat_title, FILTER_SANITIZE_STRING);

            $update_cat_id = filter_var($update_cat_id, FILTER_SANITIZE_NUMBER_INT);

            $query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id = {$update_cat_id}";

            $update_category = mysqli_query($connection, $query);

            if(!$update_category) {

                die("QUERY FAILED " . mysqli_error($connection));

            }

            header("Location: categories.php");

        }

    }
    ?>
    <div class="form-group">
        <input type="submit" name="update_category" value="Update Category" class="btn btn-primary">
    </div>
</form>