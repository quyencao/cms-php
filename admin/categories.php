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
                                findAllCategories();

                            ?>

                            <?php

                                // Delete Category Query
                                deleteCategory();

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