<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>A News Platform</title>
        <link rel="stylesheet" href="styles/style.css" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="head">
                <img id="logo" src="images/logo.png" />
                <img id="banner" src="images/ad_banner.png" />
            </div>
            
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
            
            <div class="sidebar">This is the sidebar</div>
            <div class="post_area">This is the body</div>
            <div class="footer_area">This is the footer</div>
        </div>
    </body>
</html>
