<div class="navbar">
    <ul id="menu">
    <?php
        include("includes/connect.php");
                    
        $get_cats = "SELECT * FROM categories";
        $run_cats = $db->query($get_cats);
                        
        while($cats_row = $run_cats->fetch_array()) {
            $cat_id = $cats_row['cat_id'];
            $cat_title = $cats_row['cat_title'];
            echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
        }
    ?>
    </ul>
                
    <div>
        <form id="navbar-form" method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="search_query" />
            <input type="submit" name="search" value="Search Now" />
        </form>
    </div>
</div>