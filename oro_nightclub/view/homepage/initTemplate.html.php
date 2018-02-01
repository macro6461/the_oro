<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>  
<!-- LOADER -->	
<div id="loader-overflow">
    <div id="loader3">Please enable JS</div>
</div>	

<div id="wrap" class="boxed ">
    <div class="grey-bg"> <!-- Grey BG  -->
        <?php echo view::includePartial("partials/homepage/navBar"); ?>
        <!-- REVO SLIDER FULLSCREEN 1 -->
        <div class="relative">
            <div class="rs-fullscr-container">

                <div id="rs-fullscr" class="tp-banner" >
                    <ul>
                        <!-- SLIDE 1 -->
                       <li data-transition="zoomout" data-slotamount="1" data-masterspeed="1500" data-thumb="<?php echo routing::getInstance()->getUrlImg("revo-slider/homepage/white_bg_gold_dots.png") ?>"  data-saveperformance="on"  data-title="WELCOME">

<!--                             MAIN IMAGE -->
                            <img src="<?php echo routing::getInstance()->getUrlImg("revo-slider/homepage/white_bg_gold_dots.png") ?>"  alt="citybg" data-lazyload="<?php echo routing::getInstance()->getUrlImg("revo-slider/homepage/white_bg_gold_dots.png") ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

<!--                             LAYERS 

                             LAYER NR. 0 BG CAPTIONS -->
                            <div class="tp-caption rs-parallaxlevel-4 zoomout"
                                 data-x="left"
                                 data-y="center" 
                                 data-speed="1300"
                                 data-start="200"
                                 data-easing="Power3.easeInOut"
                                 style="z-index: 0;">
                                <div class="slider-bg-white-cap"></div>
                            </div>

<!--                            PARALLAX & OPACITY container -->
                            <div class="rs-parallaxlevel-4  opacity-scroll2">					
<!--                                 LAYER NR. 1 -->
                                <div class="tp-caption dark-light-60 center-0-478 sfb tp-resizeme"
                                     data-x="345"
                                     data-y="218" 
                                     data-speed="500"
                                     data-start="850"
                                     data-easing="Power1.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;"><a href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>" >
                                        <img src="<?php echo routing::getInstance()->getUrlImg("logo.png") ?>" style="height: 500px; width: 500px; text-align: center;" class="logo-img" alt="Logo Bohemia Realty Group">
                                        </a>
                                </div>

<!--                                 LAYER NR. 2 -->
                                <div class="tp-caption dark-black-60 center-0-478 sfb tp-resizeme"
                                     data-x="310"
                                     data-y="295" 
                                     data-speed="500"
                                     data-start="1050"
                                     data-easing="Power1.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">
                                </div>

<!--                                 LAYER NR. 3 -->
                                <div class="tp-caption center-0-478 hide-0-736 sfb tp-resizeme"
                                     data-x="350"
                                     data-y="395" 
                                     data-speed="900"
                                     data-start="1200"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                                </div>

<!--                                 LAYER NR. 4 -->
                                <div class="tp-caption center-0-478 sfb"
                                     data-x="500"
                                     data-y="465" 
                                     data-speed="900"
                                     data-start="1350"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                                </div>					
                            </div>					

                        </li>
                        <!-- SLIDE 2 -->
                        <li data-transition="zoomout" data-slotamount="1" data-masterspeed="1500" data-thumb="<?php echo routing::getInstance()->getUrlImg("revo-slider/homepage/Ladies-Nights_BANNER-1600x500.jpg") ?>"  data-saveperformance="on"  data-title="LADIES NIGHT">
                            <!-- MAIN IMAGE -->

                            <img src="<?php echo routing::getInstance()->getUrlImg("revo-slider/homepage/Ladies-Nights_BANNER-1600x500.jpg") ?>"  alt="slidebg1" data-lazyload="<?php echo routing::getInstance()->getUrlImg("revo-slider/homepage/Ladies-Nights_BANNER-1600x500.jpg") ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">


                            <!-- LAYERS -->

                            <!-- LAYER NR. 0 BG CAPTIONS -->
                            <div class="tp-caption rs-parallaxlevel-4 zoomout"
                                 data-x="left"
                                 data-y="center" 

                                 data-speed="1300"
                                 data-start="200"

                                 data-easing="Power3.easeInOut"
                                 style="z-index: 0;">
                                <div class="slider-bg-white-cap"></div>
                            </div>

                            <!--PARALLAX & OPACITY container -->
                            <div class="rs-parallaxlevel-4 opacity-scroll2">
                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption dark-light-100 tp-left sfb tp-resizeme"
                                     data-x="640"
                                     data-y="205" 
                                     data-speed="500"
                                     data-start="850"
                                     data-easing="Power1.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption dark-black-100 tp-left sfb tp-resizeme"
                                     data-x="650"
                                     data-y="295" 
                                     data-speed="500"
                                     data-start="1050"
                                     data-easing="Power1.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">
                                </div>

                                <!-- LAYER NR. 3 LINE -->
                                <div class="tp-caption slider-1-cap-line tp-left hide-0-736 sfb tp-resizeme"
                                     data-x="650"
                                     data-y="420" 
                                     data-speed="1000"
                                     data-start="1250"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
                                    <div class="cap-line"></div>
                                </div> 			

                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption dark-light-32 fs16-when-0-736 tp-left sfb tp-resizeme"
                                     data-x="650"
                                     data-y="450" 
                                     data-speed="900"
                                     data-start="1500"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><a class="button large thin hover tp-button" href=""><b>BUY TICKETS NOW</b></a>
                                </div>
                            </div>



                        </li>

                        <!-- SLIDE 3 -->
                        <li data-transition="zoomout" data-slotamount="1" data-masterspeed="1500" data-thumb="<?php echo routing::getInstance()->getUrlImg("revo-slider/homepage/COOLBEATS_BANNER-1600x500.jpg") ?>"  data-saveperformance="on"  data-title="COOL BEATS">

                            <!-- MAIN IMAGE -->
                            <img src="<?php echo routing::getInstance()->getUrlImg("revo-slider/homepage/COOLBEATS_BANNER-1600x500.jpg") ?>"  alt="slidebg2" data-lazyload="<?php echo routing::getInstance()->getUrlImg("revo-slider/homepage/COOLBEATS_BANNER-1600x500.jpg") ?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                            <!-- LAYERS -->

                            <!-- LAYER NR. 0 BG CAPTIONS -->
                            <div class="tp-caption rs-parallaxlevel-4 zoomout"
                                 data-x="left"
                                 data-y="center" 
                                 data-speed="1300"
                                 data-start="200"
                                 data-easing="Power3.easeInOut"
                                 style="z-index: 0;">
                                <div class="slider-bg-white-cap"></div>
                            </div>	

                            <!--PARALLAX & OPACITY container -->
                            <div class="rs-parallaxlevel-4 opacity-scroll2">

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption center-0-478 dark-light-61 sfb tp-resizeme"
                                     data-x="645"
                                     data-y="255" 
                                     data-speed="500"
                                     data-start="850"
                                     data-easing="Power1.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">COOL
                                </div>

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption center-0-478 dark-light-54 sfb tp-resizeme"
                                     data-x="650"
                                     data-y="330" 
                                     data-speed="500"
                                     data-start="1050"
                                     data-easing="Power1.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;">BEATS
                                </div>

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption center-0-478 dark-black-63 sfb tp-resizeme"
                                     data-x="650"
                                     data-y="407" 
                                     data-speed="900"
                                     data-start="1500"
                                     data-easing="Power3.easeInOut"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-elementdelay="0.1"
                                     data-endelementdelay="0.1"
                                     style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">Every Thursday
                                </div>
                            </div>
                        </li>

                        

                    </ul>

                </div>

            </div>

            <!-- SCROLL ICON -->
            <div class="local-scroll-cont">
                <a href="#subscribe_form" class="scroll-down smooth-scroll">
                    <div class="icon icon-arrows-down"></div>
                </a>  
            </div> 
        </div>
         <?php echo view::includePartial("partials/homepage/subscribeBar"); ?>
        <?php echo view::includePartial("partials/homepage/footerBar"); ?>
        <?php echo view::includePartial("partials/homepage/menuBar"); ?>
        <!-- BACK TO TOP -->
        <p id="back-top">
            <a href="#top" title="Back to Top"><span class="icon icon-arrows-up"></span></a>
        </p>

    </div><!-- End BG -->	
</div><!-- End wrap -->	