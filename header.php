<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Zara Learning - The Software Developer's Toolkit">

    <!-- ========== Page Title ========== -->
    <title>Zara Learning</title>

    <!-- ========== Favicon Icon ========== -->
    <!-- ========== Start Stylesheet ========== -->
    <?php wp_head(); ?>
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    

</head>

<body>

    <!-- Preloader Start -->
    <?php
        if( is_front_page() )
        {
            ?>
                <!-- <div class="se-pre-con"></div> -->
            <?php
        }
    ?>
    <!-- Preloader Ends -->

    <?php

        if( is_front_page(  ) )
        {
            get_template_part( '/includes/header', 'home' );
        }
        else {
            get_template_part( '/includes/header', 'page' );
        }

    ?>