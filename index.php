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
            <div class="post_area">
                <?php
                    $get_posts = "SELECT * FROM posts ORDER BY rand() LIMIT 0,5";
                    $run_posts = $db->query($get_posts);
                    
                    while($posts_row = $run_posts->fetch_array()) {
                        $post_id = $posts_row['post_id'];
                        $post_title = $posts_row['post_title'];
                        $post_date = $posts_row['post_date'];
                        $post_author = $posts_row['post_author'];
                        $post_image = $posts_row['post_image'];
                        $post_content = substr($posts_row['post_content'],0,300);
                        
                        echo "
                            <h2><a class='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>
                            <span><i>Posted By</i> <b>$post_author</b> &nbsp; on <b>$post_date</b></span>&nbsp;<span style='color: brown;'><b>Comments (2)</b></span>
                            <img src='admin/post_images/$post_image' width='100' height='100' />
                            <div>$post_content<a class='rmlink' href='details.php?post=$post_id'>Read More</a></div><br />
                        ";
                    }
                ?>
            </div>
            <div class="footer_area">This is the footer</div>
        </div>
    </body>
</html>
