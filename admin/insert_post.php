<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
        <script>tinymce.init({selector:'textarea'});</script>
        <style type="text/css">
            td, tr {padding:0px; margin:0px;}
        </style>
    </head>
    <body>
        <form action="insert_post.php" method="post" enctype="multipart/form-data">
            <table width="800" align="center" border="2">
                <tr bgcolor="#FF6600">
                    <td colspan="6" align="center"><h1>Insert New Post:</h1></td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#FF6600"><strong>Post Title:</strong></td>
                    <td><input type="text" name="post_title" size="60" /></td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#FF6600"><strong>Post Category:</strong></td>
                    <td>
                        <select name="post_cat">
                            <option value='null'>Select a Category</option>
                            <?php
                                include("../includes/connect.php");
                                $get_cats = "SELECT * FROM categories";
                                $run_cats = $db->query($get_cats);
                        
                                while($cats_row = $run_cats->fetch_array()) {
                                    $cat_id = $cats_row['cat_id'];
                                    $cat_title = $cats_row['cat_title'];
                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#FF6600"><strong>Post Author:</strong></td>
                    <td><input type="text" name="post_author" size="60" /></td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#FF6600"><strong>Post Keywords:</strong></td>
                    <td><input type="text" name="post_keywords" size="60" /></td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#FF6600"><strong>Post Image:</strong></td>
                    <td><input type="file" name="post_image" size="50" /></td>
                </tr>
                <tr>
                    <td align="right" bgcolor="#FF6600"><strong>Post Content:</strong></td>
                    <td><textarea name="post_content" rows="15" cols="40"></textarea></td>
                </tr>
                <tr bgcolor="#FF6600">
                    <td colspan="6" align="center"><input type="submit" name="submit" value="Publish Now" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
    if(isset($_POST['submit'])) {
        $post_title = $_POST['post_title'];
        $post_date = date('m-d-y');
        $post_cat = $_POST['post_cat'];
        $post_author = $_POST['post_author'];
        $post_keywords = $_POST['post_keywords'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_tmp = $_FILES['post_image']['tmp_name'];
        $post_content = $_POST['post_content'];
        
        if($post_title=='' || $post_cat=='null' || $post_author=='' || $post_keywords=='' || $post_image=='' || $post_content=='') {
            echo "<script>alert('Please fill in all the fields');</script>";
            exit();
        } else {
            move_uploaded_file($post_image_tmp,"post_images/$post_image");
            $insert_posts = "INSERT INTO posts (cat_id, post_title, post_date, post_author, post_keywords, post_image, post_content) values ('$post_cat', '$post_title', '$post_date', '$post_author', '$post_keywords', '$post_image', '$post_content')";
            $run_posts = $db->query($insert_posts);
            if($run_posts===TRUE) {
                echo "<script>alert('Record inserted to the database');</script>";
                echo "<script>window.open('insert_post.php', '_self');</script>";
            }
        }
    }

?>