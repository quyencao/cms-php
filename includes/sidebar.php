<div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-block">
            <form method="post" action="search.php">
                <div class="input-group">
                    <input name="search" type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit" name="submit">Go!</button>
                    </span>
                </div>
            </form> <!-- End Form -->
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">

        <h5 class="card-header">Categories</h5>

        <?php

            $query = "SELECT * FROM categories";

            $select_categories_sidebar= mysqli_query($connection, $query);

        ?>

        <div class="card-block">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">

                        <?php
                            while($row = mysqli_fetch_assoc($select_categories_sidebar)) {

                                $cat_title = $row["cat_title"];
                                echo "<li><a href='#' class='nav-link'>{$cat_title}</a></li>";

                            }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Widget -->
    <?php include "widget.php"; ?>

</div>