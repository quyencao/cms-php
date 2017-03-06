<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <a class="navbar-brand" href="index.php">CMS</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="navbar-nav ml-auto">

                <?php
                    $query = "SELECT * FROM categories";

                    $select_all_categories_query = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                        $cat_title = $row["cat_title"];
                        echo "<li><a href='#' class='nav-link'>{$cat_title}</a></li>";
                    }
                ?>

                <li><a href="admin" class="nav-link">Admin</a></li>

            </ul>
        </div>
    </div>
</nav>