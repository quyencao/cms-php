<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Quyen</small>
                    </h1>
                </div>
                <div class="col-xs-6">

                    <?php insert_categories(); ?>

                    <form action="" method="post">
                        <label for="cat-title">Add Category</label>
                        <div class="form-group">
                            <input type="text" name="cat-title" class="form-control" id="cat-title"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                        </div>
                    </form>

                    <?php

                        if(isset($_GET["update"])) {
                            include "includes/update_category.php";
                        }

                    ?>

                </div>
                <div class="col-xs-6">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                // Find all categories query

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

                            ?>

                            <?php

                                // Delete Category Query
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

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>