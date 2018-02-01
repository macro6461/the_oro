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
                <!-- COTENT CONTAINER -->
                <div class=" white-bg  ">
                    <div class="relative">

                        <div class="col-md-12">
                            <div class="popup-gallery">

                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" title="Winter Dance"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img" class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" title="The Uninvited Guest"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img" class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" title="Oh no, not again!"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img"  class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" title="Winter Dance"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img" class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" title="The Uninvited Guest"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img"class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" title="Oh no, not again!"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img"  class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" title="Winter Dance"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img"class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" title="The Uninvited Guest"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" title="Oh no, not again!"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" title="Winter Dance"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img" class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" title="The Uninvited Guest"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" title="Oh no, not again!"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" title="Winter Dance"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img" class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" title="The Uninvited Guest"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img"  class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" title="Oh no, not again!"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img" class="photo-gallery-img"  ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" title="Winter Dance"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img" class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" title="The Uninvited Guest"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" title="Oh no, not again!"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" title="Winter Dance"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img" class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" title="The Uninvited Guest"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" title="Oh no, not again!"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img" class="photo-gallery-img"  ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" title="Winter Dance"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img" class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" title="The Uninvited Guest"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" title="Oh no, not again!"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img" class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" title="Winter Dance"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" title="The Uninvited Guest"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img" class="photo-gallery-img"></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" title="Oh no, not again!"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" title="Winter Dance"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-2.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" title="The Uninvited Guest"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-3.jpg") ?>" alt="img" class="photo-gallery-img" ></a>
                                <a href="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" title="Oh no, not again!"><img src="<?php echo routing::getInstance()->getUrlImg("about/about-1.jpg") ?>" alt="img"  class="photo-gallery-img" ></a>
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