<div class="sidebar">
    <?php
        $get_posts = "SELECT * FROM posts ORDER BY 1 DESC LIMIT 0,5";
        $run_posts = $db->query($get_posts);
                    
        while($posts_row = $run_posts->fetch_array()) {
            $post_id = $posts_row['post_id'];
            $post_title = $posts_row['post_title'];
            $post_image = $posts_row['post_image'];
                        
            echo "
                <h2><a class='ltitle' href='details.php?post=$post_id'>$post_title</a></h2>
                <img src='admin/post_images/$post_image' width='100' height='100' />
            ";
        }
    ?>
</div>