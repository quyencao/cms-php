<?php include "includes/db.php"; ?>

<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if(isset($_GET["p_id"])) {

                $post_id = filter_var($_GET["p_id"], FILTER_SANITIZE_NUMBER_INT);

                $query = "SELECT * FROM posts WHERE post_id = {$post_id}";

                $select_all_posts_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_title = $row["post_title"];
                    $post_author = $row["post_author"];
                    $post_date = $row["post_date"];
                    $post_image = $row["post_image"];
                    $post_content = $row["post_content"];

                    ?>

                    <h1 class="my-4">Page Heading <small>Secondary Text</small></h1>

                    <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top img-fluid" src="images/<?php echo $post_image; ?>" alt="Card image cap">
                        <div class="card-block">
                            <h2 class="card-title"><a href="#"><?php echo $post_title; ?></a></h2>
                            <p class="card-text">
                                <?php echo $post_content; ?>
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?php echo $post_date; ?> by <a href="#"><?php echo $post_author; ?></a>
                        </div>
                    </div>

                <?php

            }  }// End while loop

            ?>

            <?php

                if(isset($_POST["create_comment"])) {

                    $post_id = $_GET["p_id"];

                    $comment_author = $_POST["comment_author"];
                    $comment_email = $_POST["comment_email"];
                    $comment_content = $_POST["comment_content"];

                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                    $query .= " VALUES($post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

                    $create_comment = mysqli_query($connection, $query);

                    confirm($create_comment);

                    // increase post_comment_count in posts table
                    $query = "UPDATE posts SET post_comment_count = post_comment_count  + 1 WHERE post_id = {$post_id}";

                    $update_post_comment_count = mysqli_query($connection, $query);

                    confirm($update_post_comment_count);
                }

            ?>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-block">
                    <form method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="comment_author" id="comment_author" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="comment_email" class="form-control" id="email"/>
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content" id="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>
            </div>

            <?php

                $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} AND comment_status = 'approved' ORDER BY comment_id DESC";

                $select_comment = mysqli_query($connection, $query);

                confirm($select_comment);

                while($row = mysqli_fetch_assoc($select_comment)) {

                    $comment_date = $row["comment_date"];
                    $comment_content = $row["comment_content"];
                    $comment_author = $row["comment_author"];
                ?>

                    <!-- Single Comment -->
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo $comment_author; ?> <small><?php echo $comment_date; ?></small></h5>
                            <?php echo $comment_content; ?>
                        </div>
                    </div>

            <?php

                }

            ?>


        </div>

        <!-- Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>


</div>
<!-- /.container -->

<?php include "includes/footer.php"; ?>


