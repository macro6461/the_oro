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
        <!-- FEATURES 1 -->
        <div id="about" class="page-section">
            <div class="container fes1-cont">
                <div class="row">

                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="fes1-main-title-cont wow fadeInDown">
                                    <div class="title-fs-60">
                                        THE
                                        <span class="bold">ORO NIGHT CLUB</span>
                                    </div>
                                    <div class="line-3-100"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row container">
                            <p class="mb-60" style="text-align: justify;">
                                After its launch in November 2011,<a href="http://www.oronightclub.com"> <strong>ORO Nightclub</strong> </a><strong><a href="http://www.oronightclub.com">Punta Cana</a>&nbsp;</strong>became the gem of the <strong>Caribbean </strong>and at the moment is ranked as the <strong>Best Nightclub in Dominican Republic.</strong> Located inside the <a href="http://www.hardrockhotelpuntacana.com"><strong>Hard Rock Hotel &amp; Casino Punta Cana</strong></a>, <strong>ORO</strong> is modeled to rival Las Vegas and Miami’s finest nightclubs, boasting over 14,000 square feet of space across two levels and features intelligent show lighting, Kryogenifex and award winning Funktion One sound.
                            </p>   
                            <p class="mb-60" style="text-align: justify;">   
                                Adding to the dramatics is its signature 2 story tall LED wall consisting of over 300 individual LED screens and the first ever infinitive edge bar. Imagined by François Frossard and inspired by the sensuality of the Dominican Republic, <a href="http://www.oronightclub.com"><strong>ORO Nightclub Punta Cana</strong></a>&nbsp;is designed to maximize the nightclub experience, elevating &amp; seducing its guests into uninhibited euphoria.
                            </p>

                        </div>                  

                    </div>

                </div>
                <div class="grey-light-bg clearfix">    
                    <!-- COTENT CONTAINER -->
                    <div class="container white-bg plr-30 pt-50 pb-40 ">

                        <div class="relative">
                            <!-- ITEMS GRID -->
                            <ul class="port-grid port-grid-3 clearfix" id="items-grid">

                                <!-- Item 1 -->
                                <li class="port-item mix development">

                                    <div class="port-img-overlay"><img class="port-main-img" src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img" ></div>

                                    <div class="port-overlay-cont">

                                        <div class="port-title-cont">


                                        </div>
                                        <div class="port-btn-cont">
                                            <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" class="lightbox mr-20" ><div aria-hidden="true" class="icon_search"></div></a>
                                        </div>

                                    </div>
                                </li>

                                <!-- Item 2 -->
                                <li class="port-item mix design">

                                    <div class="port-img-overlay">
                                        <img class="port-main-img" src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img" >
                                    </div>

                                    <div class="port-overlay-cont">

                                        <div class="port-title-cont">

                                        </div>
                                        <div class="port-btn-cont">
                                            <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" class="lightbox mr-20" ><div aria-hidden="true" class="icon_search"></div></a>
                                        </div>

                                    </div>
                                </li>

                                <!-- Item 3 -->
                                <li class="port-item mix photography">

                                    <div class="port-img-overlay">
                                        <img class="port-main-img" src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img" >
                                    </div>

                                    <div class="port-overlay-cont">

                                        <div class="port-title-cont">

                                        </div>
                                        <div class="port-btn-cont">
                                            <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" class="lightbox mr-20" ><div aria-hidden="true" class="icon_search"></div></a>
                                        </div>

                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>

        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=<?php echo config::getGoogleMapsAPI(); ?>"></script>
        <?php echo view::includePartial("partials/homepage/subscribeBar"); ?>
        <?php echo view::includePartial("partials/homepage/footerBar"); ?>
        <?php echo view::includePartial("partials/homepage/menuBar"); ?>
        <!-- BACK TO TOP -->
        <p id="back-top">
            <a href="#top" title="Back to Top"><span class="icon icon-arrows-up"></span></a>
        </p>

    </div><!-- End BG -->	
</div><!-- End wrap -->	