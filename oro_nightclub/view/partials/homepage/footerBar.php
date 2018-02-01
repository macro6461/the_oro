<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<!-- ********************************************************** FOOTER BAR **************************************************  -->
<!-- FOOTER 2 -->
<footer id="footer2" class="page-section pt-80 pb-50">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-3 widget">
                <div class="logo-footer-cont">
                    <a href="index.html">
                        <img class="logo-footer" src="<?php echo routing::getInstance()->getUrlImg("logo-footer.png") ?>" alt="ORO Night Club footer logo">
                    </a>
                </div>
                <div class="footer-2-text-cont">
                    <address>
                        BLVD. TURISTICO DEL ESTE KM.28<br>  PARC 74,
                        MACAO, MPIO. DE HIGUEY,<br> LA ALTAGRACIA,<br> REPUBLICA DOMINICANA                      
                    </address>
                </div>
                <div class="footer-2-text-cont">
                    FOR GENERAL INFORMATION <br>
                    <a href="tel:(809) 687-0000">(809) 687-0000</a><br>
                    FOR TABLE RESERVATIONS<br>
                    PLEASE CALL<br> <a href="tel:(809) 687-0000">(809) 687-0000</a><br>
                    EMAIL RSVP<br>
                    <a href="tel:(809) 687-0000">(809) 687-0000</a><br>
                    <a href="mailto:reservations@oronightclub.com ">reservations@oronightclub.com </a>
                </div>
                <div class="footer-2-text-cont">
                    PRIVATE EVENTS
                    <a class="a-text" href="mailto:reservations@oronightclub.com">reservations@oronightclub.com</a>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 widget">
                <h4>NAVIGATE</h4>
                <ul class="links-list bold a-text-cont">
                    <li><a href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>">HOME</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("about", "index"); ?>">THE CLUB</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("events", "index") ?>">EVENTS</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("gallery", "index") ?>">GALLERY</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("videos", "index") ?>">VIDEO</a></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("contact", "index"); ?>">CONTACT US</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-3 widget">
                <h4>ABOUT US</h4>
                <ul class="links-list a-text-cont" >
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("about", "index"); ?>">THE CLUB </a></li>

                    <li><a href="<?php echo routing::getInstance()->getUrlWeb("contact", "index"); ?>">CONTACT US</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 widget">
                <h4>RECENT TWEETS</h4>
                <div id="post-list-footer">
                    <a href="https://twitter.com/oronightclub?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @oronightclub</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <a class="twitter-timeline" data-height="400" data-theme="dark" data-link-color="#FAB81E" href="https://twitter.com/oronightclub?ref_src=twsrc%5Etfw">Tweets by oronightclub</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>                  
            </div>

        </div>    

        <div class="footer-2-copy-cont clearfix">
            <!-- Social Links -->
            <div class="footer-2-soc-a right">
                <a href="https://www.facebook.com/oronightclubpuntacana" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/ORONightClub" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.instagram.com/oronightclub/?hl=en" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="#" title="Youtube" target="_blank"><i class="fa fa-youtube-square"></i></a>
            </div>

            <!-- Copyright -->
            <div class="left">
                <a class="footer-2-copy" href="" target="_blank">&copy; 2013 • <?php echo date('Y'); ?> - ORO NIGHT CLUB. ALL RIGHTS RESERVED </a>
            </div>


        </div>

    </div>
</footer>

<!-- ********************************************************** END FOOTER BAR **************************************************  -->