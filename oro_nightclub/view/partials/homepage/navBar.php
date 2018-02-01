<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
use mvc\config\myConfigClass as config;
?>

<!-- ********************************************************** NAV BAR **************************************************  -->
<!--[if lte IE 8]>
<div id="ie-container">
        <div id="ie-cont-close">
                <a href='#' onclick='javascript&#058;this.parentNode.parentNode.style.display="none"; return false;'><img src='images/ie-warn/ie-warning-close.jpg' style='border: none;' alt='Close'></a>
        </div>
        <div id="ie-cont-content" >
                <div id="ie-cont-warning">
                        <img src='images/ie-warn/ie-warning.jpg' alt='Warning!'>
                </div>
                <div id="ie-cont-text" >
                        <div id="ie-text-bold">
                                You are using an outdated browser
                        </div>
                        <div id="ie-text">
                                For a better experience using this site, please upgrade to a modern web browser.
                        </div>
                </div>
                <div id="ie-cont-brows" >
                        <a href='http://www.firefox.com' target='_blank'><img src='images/ie-warn/ie-warning-firefox.jpg' alt='Download Firefox'></a>
                        <a href='http://www.opera.com/download/' target='_blank'><img src='images/ie-warn/ie-warning-opera.jpg' alt='Download Opera'></a>
                        <a href='http://www.apple.com/safari/download/' target='_blank'><img src='images/ie-warn/ie-warning-safari.jpg' alt='Download Safari'></a>
                        <a href='http://www.google.com/chrome' target='_blank'><img src='images/ie-warn/ie-warning-chrome.jpg' alt='Download Google Chrome'></a>
                </div>
        </div>
</div>
<![endif]-->
<!-- HEADER side menu -->
<header id="nav-stick2" class="header header-1 fixed gray transparent">
    <div class="header-wrapper">

        <div class="container-m-60 clearfix">
            <div class="logo-row">
                <!-- LOGO --> 
                <div class="logo-container-2">
                    <div class="logo-2">
                        <a href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>" class="clearfix">
                            <img src="<?php echo routing::getInstance()->getUrlImg("logo.png") ?>" class="logo-img " alt="Logo Bohemia Realty Group">
                        </a>

                    </div>
                </div>
                <!--                <div class="col-xs-2">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <i class="fa fa-phone" aria-hidden="true"></i> 
                            </div>-->
            </div>

        </div>



        <!-- MAIN MENU CONTAINER -->
        <div class="main-menu-container">

            <div class="container-m-30 clearfix">	

                <!-- MAIN MENU -->
                <div id="main-menu">
                    <div class="navbar navbar-default" role="navigation">
                        <!-- MAIN MENU LIST -->
                        <div class="collapse collapsing navbar-collapse right-1024">
                            <ul class="nav navbar-nav">

                                <!-- MENU ITEM -->
                                <li class="parent current">
                                    <a href="#"><div class="main-menu-title">BUY TICKETS NOW</div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BUTTON --> 
        <div class="menu-btn-respons-container2">
            <a class="fs-primary-nav-trigger" href="#"><span class="fs-menu-icon"></span></a>
        </div>
        <div class="menu-btn-respons-container2 visible-xs">
            <a class="nav-trigger-map" href="#"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i></a>
        </div>
        <div class="menu-btn-respons-container2 visible-xs">
            <a class="nav-trigger-phone" href="#"><i class="fa fa-phone fa-2x" aria-hidden="true"></i> </a>
        </div>
    </div> <!-- END header-wrapper -->

</header>

<!-- ********************************************************** END NAV BAR **************************************************  -->        
