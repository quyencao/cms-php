<div class="col-md-4">

    <?php

        if(isset($_POST["submit"])) {
            $search = $_POST["search"];

            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";

            $search_query = mysqli_query($connection, $query);

            if(!$search_query) {
                die ("QUERY FAILED " . mysqli_error($connection));
            }

            $count = mysqli_num_rows($search_query);

            if($count == 0) {
                echo "<h1>NO RESULT</h1>";
            } else {
                echo $count;
            }
        }

    ?>

    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-block">
            <form method="post">
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
        <div class="card-block">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">Freebies</a></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#">JavaScript</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">Tutorials</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-block">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>

</div>