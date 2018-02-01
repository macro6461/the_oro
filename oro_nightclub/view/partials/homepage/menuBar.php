<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
use mvc\config\myConfigClass as config;
?>
<!-- MENU -->      
<nav>
    <div class="fs-primary-nav">
        <ul class="block-center-xy text-left">
            <li><a href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>"> Home</a></li>
            <li><a href="#">Daily tickets</a></li>
            <li><a href="<?php echo routing::getInstance()->getUrlWeb("events", "index") ?>">Events</a></li>
            <li><a href="#">Shuttle</a></li>
            <li><a href="<?php echo routing::getInstance()->getUrlWeb("gallery", "index") ?>">Gallery</a></li>
            <li><a href="<?php echo routing::getInstance()->getUrlWeb("videos", "index") ?>">Videos</a></li>
            <li><a href="<?php echo routing::getInstance()->getUrlWeb("about", "index") ?>">About</a></li>
            <li><a href="<?php echo routing::getInstance()->getUrlWeb("contact", "index") ?>">Contact Us</a></li>

            <li class="fs- text-center">Follow us</li>
            <hr>
            <div class="footer-2-soc-a mt-20 text-center">
                <a href="https://www.facebook.com/oronightclubpuntacana" title="Facebook" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
                <a href="https://twitter.com/ORONightClub" title="Twitter" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
                <a href="https://www.instagram.com/oronightclub/?hl=en" title="Instagram" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
                <a href="#" title="Youtube" target="_blank"><i class="fa fa-youtube-square fa-2x"></i></a>
            </div>
        </ul>
    </div>
</nav>

<?php echo view::includePartial("partials/homepage/floatMenuBar"); ?>