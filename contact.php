<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <!-- PHP INCLUDES -->
    <?php 
        require_once( "php-libs/libelement.php" );
        require_once( "php-libs/libdb.php" );
        require_once( "php-libs/libcontact.php" );
    ?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style_contact.css" />


</head>

<body>
    <div class="bounds" >
        <!-- HEADER -->
        <?php element_header() ?>

        <!-- CONTENT -->
        <div class="content">

            <?php $link = db_connect() ?>

            <h1>Contact</h1>

            <p class="intro">Feel free to contact our club GMail account, or anyone of our E-Board members.</p>

            <a href="RITQuidditch@Gmail.com">RITQuidditch@GMail.com</a>
            <br/>

            <table border="0" width="720">
                <tr><?php contact_get( $link, "President" ); ?></tr>
                <tr><?php contact_get( $link, "Vice President" ); ?></tr>
                <tr><?php contact_get( $link, "Treasurer" ); ?></tr>
                <tr><?php contact_get( $link, "Secretary" ); ?></tr>
            </table>

            <?php db_close( $link ) ?>

        </div>

        <!-- FOOTER-->
        <?php element_footer() ?>
    </div>
</body>

</html>
