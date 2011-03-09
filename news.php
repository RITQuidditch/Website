<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <!-- PHP INCLUDES -->
    <?php 
        require_once( "php/Render.php" );
        require_once( "php/NewsFactory.php" );
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

            <h1 class="title">News</h1>

            <p class="notice">All the (Quidditch) News That's Fit to Print</p>

            <?php
                $factory = new RITQ_NewsFactory( 'RITQuidditch', 'Levi000sa', '4921289786469378725' );

                $newslist = $factory->getNewsInterval( 0, 5 );
                foreach ( $newslist AS $news )
                {
                    $render->news( $news );
                }
            ?>

        </div>

        <!-- FOOTER-->
        <?php $render->footer() ?>
    </div>
</body>

</html>
