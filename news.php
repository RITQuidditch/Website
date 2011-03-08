<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <!-- PHP INCLUDES -->
    <?php 
        require_once( "php-libs/libelement.php" );
        require_once( "php-libs/libnews.php" );
    ?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style-news.css" />
</head>

<body>
    <div class="bounds" >
        <!-- HEADER -->
        <?php element_header() ?>

        <!-- CONTENT -->
        <div class="content">

            <h1>News</h1>

            <p>All the latest ( Quidditch ) news fit to print!</p>

            <?php
                news_display_latest( 5 );
            ?>

        </div>

        <!-- FOOTER-->
        <?php element_footer() ?>
    </div>
</body>

</html>
