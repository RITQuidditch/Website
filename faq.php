<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <!-- PHP INCLUDES -->
    <?php 
        require_once( "php/Render.php" );
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

            <h1 class="title">FAQ</h1>

            <p class="notice">Get to Know More About the Quidditch Club</p>

            <?php
                $faq = new RITQ_FAQ( "xml/FAQ.xml" );

                foreach ( $faq->getEntries() AS $entry )
                {
                    $render->faqentry( $entry );
                }

            ?>


        </div>

        <!-- FOOTER-->
        <?php $render->footer() ?>
    </div>
</body>

</html>
