<?php include "includes/header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

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
                    <form action="">
                        <label for="cat-title">Add Category</label>
                        <div class="form-group">
                            <input type="text" name="cat-title" class="form-control" id="cat-title"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                        </div>
                    </form>
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
                            <tr>
                                <td>Football</td>
                                <td>Baseball</td>
                            </tr>
                            <tr>
                                <td>Football</td>
                                <td>Baseball</td>
                            </tr>
                            <tr>
                                <td>Football</td>
                                <td>Baseball</td>
                            </tr>
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

<?php include "includes/footer.php"; ?>