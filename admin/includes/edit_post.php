<?php

    if(isset($_GET["p_id"])) {

        $update_post_id = filter_var($_GET["p_id"], FILTER_SANITIZE_NUMBER_INT);

        $query = "SELECT * FROM posts WHERE post_id = {$update_post_id}";

        $update_post = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($update_post)) {

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


?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="title" value="<?php echo $post_title; ?>">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post Category Id</label>
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
        <input type="text" class="form-control" name="author" id="author"
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