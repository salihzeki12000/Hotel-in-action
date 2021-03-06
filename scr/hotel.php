<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ξενοδοχεία</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/globalShadowBoxStyle.css" rel="stylesheet">


    <link rel="stylesheet" href="../css/HotelFirstPage.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <![endif]-->


    <?php
    include('includes/header.php');
    include('includes/navbar.php');
    ?>

</head>

<body style="background-color:#D7D7D7">


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<br>

<div id="conteinerMarketing" class="container marketing shadowStyle"><!-- BG COLOR-->
    <!--<hr class="featurette-divider"> -->


    <!-- Main Container body
  ============================================================================================= -->
    <!-------------------------- -->
    <div class="head_title">
        <div class="addNewElement">
            <?php
            if ($_SESSION['userCode'] == 2 || $_SESSION['userCode'] == 0) {

                echo '<button onclick="location.href =' . "'newHotelForm.php'" . '"; type="submit" class="btn btn-primary" >+ Νέο Ξενοδοχείο</button>';
                // <button onclick="location.href ='newHotelForm.php' "  ; type="submit" class="btn btn-primary" >+ Νέο Ξενοδοχείο</button>
            }
            ?>
        </div>
        <p>

        <h3><i>Ξενοδοχεία</i></h3></p>

        <hr class="featurette-divider">

    </div>
    <!-- =============================================PERIEXOMENO SELIDAS ================================================-->

    <p class="infoTxt"> Εδώ θα βρείτε όλες τις απαραίτητες πληροφορίες που χρειάζεστε για τα ξενοδοχεία που
        συνεργαζόμαστε, όπως φωτογραφικό υλικό, τοποθεσία του καταλύματος στον χάρτη κ.τ.λ.
        Επιλέξτε μια παρακάτω επιλογές για να πλοηγηθείτε στο site </p>

    <br><br><br>

    <div class="container marketing">
        <div class="row">
            <?php
            global $link;
            include ("RegisterConnectToDB.php");
            include('ArizFunctions.php');
            $hotels = get_hotels($link);
            $hotels_array = array();
            while ($row = $hotels->fetch_assoc()) {
                $hotels_array [] = $row;
                echo '<div class="col-md-6" >';
                echo '<a href="viewHotel.php?h=' . $row['hotelID'] . '">';
                echo '<img src="data:image;base64,' . base64_encode($row['image']) . '" width=200 height=200/>';
                echo '<p class=HotelName>' . $row["HotelName"] . '</p></a>';
                echo '</div>';
            }
            ?>
            <!-- <div class="col-md-6" >
                 <a href="InoVillageHotelStatic.php">
               <img src="http://r-ec.bstatic.com/images/hotel/square200/147/14764932.jpg">
                 <p class="HotelName">Ino Village Hotel</p></a>
             </div>-->

        </div>


    </div>


    <br><br><br><br><br>


</div>
<!-- /.container -->

<br><br>

<?php
include('includes/footer.php');
?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../js/ie10-viewport-bug-workaround.js"></script>

<!-- jssor slider scripts-->
<!-- use jssor.js + jssor.slider.js instead for development -->
<!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
<script type="text/javascript" src="../js/jssor.slider.mini.js"></script>
<script>
    jQuery(document).ready(function ($) {

        var options = {
            $FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
            $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
            $SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
            //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
            $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
            $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
            $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
            $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
            $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

            $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                $SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                $SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                $Orientation: 1,                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                $Scale: false                                   //Scales bullets navigator or not while slider scale
            },

            $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
            }
        };

        //Make the element 'slider1_container' visible before initialize jssor slider.
        $("#slider1_container").css("display", "block");
        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var bodyWidth = document.body.clientWidth;
            if (bodyWidth)
                jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
            else
                window.setTimeout(ScaleSlider, 30);
        }

        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>
</body>
</html>