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

            Content goes here.

        </div>

        <!-- FOOTER-->
        <?php $render->footer() ?>
    </div>
</body>

</html>
