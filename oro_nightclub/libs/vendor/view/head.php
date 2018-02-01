<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> 
<!--<![endif]--> 
<html class="" lang="<?php echo \mvc\config\configClass::getDefaultCulture() ?>">
    <head>
        <?php echo \mvc\view\viewClass::genTitle(); ?>
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <?php echo \mvc\view\viewClass::genMetas(); ?>
        <?php echo \mvc\view\viewClass::genFavicon(); ?>
        <!--External libraries -->

        <?php echo \mvc\view\viewClass::genStylesheetLibrary(); ?>
        <?php echo \mvc\view\viewClass::genStylesheet(); ?>
        <!-- IE Warning CSS -->
        <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ie-warning.css" ><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ie8-fix.css" ><![endif]-->

        <!-- Magnific popup  in style.css	Owl Carousel Assets in style.css -->		

        <!-- CSS end -->

        <!-- JS begin some js files in bottom of file-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Modernizr -->
        <!-- <script src="js/modernizr.js"></script> -->
        <?php echo \mvc\view\viewClass::genJavascriptLibrary(); ?>

        <?php if (mvc\session\sessionClass::getInstance()->isUserAuthenticated()) { ?>
            <script type="text/javascript">
                (function (global) {

                    if (typeof (global) === "undefined") {
                        throw new Error("window is undefined");
                    }

                    var _hash = "!";
                    var noBackPlease = function () {
                        global.location.href += "#";

                        // making sure we have the fruit available for juice (^__^)
                        global.setTimeout(function () {
                            global.location.href += "!";
                        }, 50);
                    };

                    global.onhashchange = function () {
                        if (global.location.hash !== _hash) {
                            global.location.hash = _hash;
                        }
                    };

                    global.onload = function () {
                        noBackPlease();

                        // disables backspace on page except on input fields and textarea..
                        document.body.onkeydown = function (e) {
                            var elm = e.target.nodeName.toLowerCase();
                            if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
                                e.preventDefault();
                            }
                            // stopping event bubbling up the DOM tree..
                            e.stopPropagation();
                        };
                    };

                })(window);
            </script>
        <?php } ?>
    </head>
    <body>
