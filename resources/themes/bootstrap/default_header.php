<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <style>
            body { background-image:url("<?php echo THEMEPATH; ?>/img/background.png");
                   background-repeat: no-repeat;
                   background-size: cover; }

        </style>
        <title>Khaperkheda TPS E-library</title>
    </head>
    
    <body>
        <div class="heading">
            <h1 class="headline"></h1>
        </div>
        <span>
            <?php if (isset($_SESSION['firstname'])) { ?>
                <span style="float:right; color: lightskyblue;font-size:20px; margin-right: 2%"> Welcome, <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></span>
            <?php } ?>
        </span>
    </body>
</html>

