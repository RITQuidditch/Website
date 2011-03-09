<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <!-- PHP INCLUDES -->
    <?php 
        require_once( "php/Render.php" );
        require_once( "php/Contact.php" );
        require_once( "php/ContactFactory.php" );
    ?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

    <?php $render = new RITQ_Render() ?>

    <div class="canvas" >
        <!-- HEADER -->
        <?php $render->header() ?>

        <!-- CONTENT -->
        <div class="content">

            <h1 class="title" >Contact</h1>

            <p class="notice" >Feel free to contact our club GMail account or anyone of our E-Board members. 
            <br /><br />
            <a href='mailto:RITQuidditch@GMail.com' >RITQuidditch@GMail.com</a>
            </p>

            <?php
            $conFact = new RITQ_ContactFactory( 'RITQuidditch', 'Levi000sa', '0At4gh-_5iKZhdDkyXzFjeFp4ZEdsR2N5QWdQYXowdEE', '1' );
            $contacts = $conFact->getContacts();
            foreach ( $contacts as $contact )
            {
                $render->contact( $contact );
            }
            ?>

        </div>

        <!-- FOOTER-->
        <?php $render->footer() ?>
    </div>
</body>

</html>
