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

            <h1 class="title">Calendar</h1>

            <p class="notice">Check out what the we're up to</p>

            <p class="body_center"><iframe src="https://www.google.com/calendar/b/0/embed?title=RIT%20Quidditch&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=ritquidditch%40gmail.com&amp;color=%232F6213&amp;ctz=America%2FNew_York" style=" border-width:0 " width="700" height="600" frameborder="0" scrolling="no"></iframe></p>


        </div>

        <!-- FOOTER-->
        <?php $render->footer() ?>
    </div>
</body>

</html>
