<div class="post_area">
    <?php
        
        if(isset($_GET['cat'])) {
            $cat_id = $_GET['cat'];
            $get_posts = "SELECT * FROM posts WHERE cat_id ='$cat_id'";
        } else {
            $get_posts = "SELECT * FROM posts ORDER BY rand() LIMIT 0,5";
        }
        
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