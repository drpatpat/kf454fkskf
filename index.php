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
            <?php include("includes/navbar.php"); ?>
            
            <?php include("includes/sidebar.php"); ?>
            
            <?php include("includes/post_content.php"); ?>
            
            <div class="footer_area">This is the footer</div>
        </div>
    </body>
</html>
