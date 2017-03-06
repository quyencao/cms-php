<?php

    if(isset($_GET["p_id"])) {

        $update_post_id = filter_var($_GET["p_id"], FILTER_SANITIZE_NUMBER_INT);

        $query = "SELECT * FROM posts WHERE post_id = {$update_post_id}";

        $select_post = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_post)) {

            $post_id = $row["post_id"];
            $post_author = $row["post_author"];
            $post_title = $row["post_title"];
            $post_category_id = $row["post_category_id"];
            $post_status = $row["post_status"];
            $post_image = $row["post_image"];
            $post_tags = $row["post_tags"];
            $post_comment_count = $row["post_comment_count"];
            $post_date = $row["post_date"];
            $post_content = $row["post_content"];

        }

    }

    if(isset($_POST["update_post"])) {
        $update_post_id = filter_var($_GET["p_id"], FILTER_SANITIZE_NUMBER_INT);
        $post_author = $_POST["post_author"];
        $post_title = $_POST["post_title"];
        $post_category_id = $_POST["post_category_id"];
        $post_status = $_POST["post_status"];
        $post_new_image = $_FILES["post_image"]["name"];
        $post_new_image_tmp = $_FILES["post_image"]["tmp_name"];
        $post_tags = $_POST["post_tags"];
        $post_content = $_POST["post_content"];

        if(empty($post_new_image)) {
            $post_new_image = $post_image;
        } else {
            move_uploaded_file($post_new_image_tmp, "images/$post_new_image");
        }

        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_category_id = {$post_category_id}, ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_image = '{$post_new_image}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_date = now() ";
        $query .= "WHERE post_id = {$update_post_id}";

        $update_post = mysqli_query($connection, $query);

        confirm($update_post);

        header("Location: posts.php");
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title" id="title" value="<?php echo $post_title; ?>">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post Category Title</label>
        <select name="post_category_id" class="form-control">
            <?php

                $query = "SELECT * FROM categories";

                $select_categories = mysqli_query($connection, $query);

                confirm($select_categories);

                while($row = mysqli_fetch_assoc($select_categories)) {

                    $cat_id = $row["cat_id"];
                    $cat_title = $row["cat_title"];

                    if($cat_id == $post_category_id) {
                        $selected = "selected";
                    } else {
                        $selected = "";
                    }

                    echo "<option value='{$cat_id}' $selected>{$cat_title}</option>";

                }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="post_author" id="author"
            value="<?php echo $post_author; ?>">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="post_status" value="<?php echo $post_status; ?>">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="post_image" id="post_image" >
        <img src="../images/<?php echo $post_image; ?>" width="100">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" id="post_tags" value="<?php echo $post_tags; ?>">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="post_content" rows="8"><?php echo $post_content; ?>"</textarea>
    </div>
    <input type="submit" value="Update Post" class="btn btn-primary btn-lg" name="update_post">
</form>