<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $query = "SELECT * FROM comments";

    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {

        $comment_id = $row["comment_id"];
        $comment_post_id = $row["comment_post_id"];
        $comment_author = $row["comment_author"];
        $comment_email = $row["comment_email"];
        $comment_content = $row["comment_content"];
        $comment_status = $row["comment_status"];
        $comment_date = $row["comment_date"];


        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";

//        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
//
//        $select_category = mysqli_query($connection, $query);
//
//        while($row = mysqli_fetch_assoc($select_category)) {
//            $cat_id = $row["cat_id"];
//            $cat_title = $row["cat_title"];
//            echo "<td>{$cat_title}</td>";
//        }

        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

        $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";

        $select_post_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_post_id)) {
            $post_id = $row["post_id"];
            $post_title = $row["post_title"];
            echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
        }

        echo "<td>{$comment_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$comment_id}' class='btn btn-info'>Approve</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$comment_id}' class='btn btn-info'>Unapprove</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$comment_id}' class='btn btn-warning'>Edit</a></td>";
        echo "<td><a href='comments.php?delete_comment={$comment_id}' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
    }

    ?>

    </tbody>
</table>

<?php
if(isset($_GET["delete_comment"])) {

    $delete_comment_id = filter_var($_GET["delete_comment"], FILTER_SANITIZE_NUMBER_INT);

    $query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id}";

    $delete_comment = mysqli_query($connection, $query);

    confirm($delete_comment);

    header("Location: comments.php");
}
?>