<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
use mvc\config\myConfigClass as config;
?>  
<!-- LOADER -->	
<div id="loader-overflow">
    <div id="loader3">Please enable JS</div>
</div>	

<div id="wrap" class="boxed ">
    <div class="grey-bg"> <!-- Grey BG  -->
        <?php echo view::includePartial("partials/homepage/navBar"); ?>
        <!-- PAGE TITLE -->
        <div class="page-title-cont page-title-big dotted">
            <div class="relative container align-left">
                <div class="row">

                    <div class="col-md-8">

                    </div>

                    <div class="col-md-4">

                    </div>

                </div>
            </div>
        </div>
        <!-- COTENT CONTAINER -->
        <div class="container p-140-cont">

            <div class="row mb-40">
                <div class="col-md-12 text-center">
                    <div id="clock"></div>
                </div>
                <div class="col-md-6 text-center img-container-404">
                    <img alt="img" src="<?php echo routing::getInstance()->getUrlImg("content/404.png") ?>">
                </div>
                <div class="col-md-6 m-top-10">
                    <h3>OOPS! THE PAGE YOU WERE LOOKING FOR, COULDN'T BE FOUND</h3>
                    <p>We're sorry, but the page you were looking for doesn't exist. Here are some useful links</p>

                    <div class="row m-top-20">
                        <div class="col-md-6">
                            <ul class="icon-list">
                                <li><i class="fa fa-angle-right"></i><a class="a-invert" href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>">Home</a></li>
                                <li><i class="fa fa-angle-right"></i><a class="a-invert" href="#">Daily tickets</a></li>
                                <li><i class="fa fa-angle-right"></i><a class="a-invert" href="#">Events</a></li>
                                <li><i class="fa fa-angle-right"></i><a class="a-invert" href="#">Shuttle</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="icon-list">
                                <li><i class="fa fa-angle-right"></i><a class="a-invert" href="#">Gallery</a></li>
                                <li><i class="fa fa-angle-right"></i><a class="a-invert" href="#">Videos</a></li>
                                <li><i class="fa fa-angle-right"></i><a class="a-invert" href="<?php echo routing::getInstance()->getUrlWeb("about", "index"); ?>">About Us</a></li>
                                <li><i class="fa fa-angle-right"></i><a class="a-invert" href="<?php echo routing::getInstance()->getUrlWeb("contact", "index"); ?>">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <?php if (config::getScope() === 'dev') { ?>
                    <?php echo $exc->getMessage() ?>
                    <br>
                    <pre>
                        <?php print_r($exc->getTrace()) ?>
                    </pre>
                <?php } ?>
            </div>

        </div>
        <?php echo view::includePartial("partials/homepage/footerBar"); ?>
        <?php echo view::includePartial("partials/homepage/menuBar"); ?>
        <!-- BACK TO TOP -->
        <p id="back-top">
            <a href="#top" title="Back to Top"><span class="icon icon-arrows-up"></span></a>
        </p>

    </div><!-- End BG -->	
</div><!-- End wrap -->	
