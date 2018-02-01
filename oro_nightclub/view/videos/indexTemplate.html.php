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
        <div id="about" class="page-section">
            <div class="container fes1-cont">
                <div class="grey-light-bg clearfix">    
                    <!-- COTENT CONTAINER -->
                    <div class="container white-bg plr-30 pt-50 pb-40 ">

                        <div class="relative">
                            <!-- ITEMS GRID -->
                            <ul class="port-grid port-grid-3 port-grid-gut clearfix" id="items-grid">

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