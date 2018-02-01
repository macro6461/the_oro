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
<!--                        <h1 class="page-title">CONTACT</h1>
                        <div class="page-sub-title">
                            Get In Touch 
                        </div>-->
                    </div>

                    <div class="col-md-4">
<!--                        <div class="breadcrumbs">
                            <a href="<?php echo \mvc\config\configClass::getUrlBase(), \mvc\config\configClass::getIndexFile(); ?>">Home</a><span class="slash-divider">/</span><span class="bread-current">CONTACT</span>
                        </div>-->
                    </div>

                </div>
            </div>
        </div>
        <!-- GOOGLE MAP & CONTACT FORM -->
        <div class="page-section">
            <div class="container-fluid">
                <div class="row">

<!--                    <div class="col-md-6">
                        <div class="row">
                            <div data-address="Boulevard Turístico del Este Km.28, Boulevard Turístico del Este 74, Punta Cana 23000, Dominican Republic" id="google-map" class="contact-form-with-catcha"></div>
                        </div>
                    </div>-->

                    <div class="col-md-12">
                        <div class="contact-form container  ">
                            <!-- TITLE -->
<!--                            <div class="mb-40">
                                <h2 class="section-title">CONTACT <span class="bold">US</span></h2>
                            </div>-->

                            <!-- CONTACT FORM -->
                            <div>
                                <form id="contact-form" action="php/contact-form-recaptcha.php" method="POST">

                                    <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <label>FIRST NAME *</label>
                                            <input type="text" value="" data-msg-required="Please enter your first name" maxlength="100" class="controled" name="name" id="name" placeholder=" FIRST NAME" required>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <label>LAST NAME *</label>
                                            <input type="text" value="" data-msg-required="Please enter your last name" maxlength="100" class="controled" name="last_name" id="last_name" placeholder="LAST NAME" required>
                                        </div>
                                    </div>

                                    <div class="row">    
                                        <div class="col-md-12 mb-30">
                                             <label>EMAIL ADDRESS *</label>
                                            <input type="email" value="" data-msg-required="Please enter your email address" data-msg-email="Please enter a valid email address" maxlength="100" class="controled" name="email" id="email" placeholder="EMAIL ADDRESS" required>
                                        </div>
                                    </div>
                                     <div class="row">    
                                        <div class="col-md-12 mb-30">
                                             <label>SUBJECT *</label>
                                            <input type="email" value="" data-msg-required="Please enter subject"  maxlength="100" class="controled" name="subject" id="subject" placeholder="SUBJECT" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-40">
                                            <label>MESSAGE *</label>
                                            <textarea maxlength="5000" data-msg-required="Please enter your message" rows="3" class="controled" name="message" id="message" placeholder="MESSAGE" required></textarea>
                                        </div>
                                    </div>

                                    

                                    <div class="row text-center">
                                        <div class="col-md-12 text-center-xxs mt-20 container">
                                            <input type="submit" name="enter" value="SUBMIT" class="button medium gray" data-loading-text="Loading...">
                                        </div>
                                    </div>

                                </form>	
                                <div class="alert alert-success hidden animated fadeIn" id="contactSuccess" >
                                    Thanks, your message has been sent to us
                                </div>

                                <div class="alert alert-danger hidden animated shake" id="contactError">
                                    <strong>Error!</strong> There was an error sending your message. Maybe you forgot to solve the CAPTCHA
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

<!--         DIVIDER 
        <hr class="mt-0 mb-0">          -->

<!--         CONTACT INFO SECTION 1 
        <div id="contact-link" class="page-section p-110-cont grey-light-bg">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-6">
                        <div class="cis-cont">
                            <div class="cis-icon">
                                <div class="icon icon-basic-map"></div>
                            </div>
                            <div class="cis-text">
                                <h3><span class="bold">ADDRESS</span></h3>
                                <p> BLVD. TURISTICO DEL ESTE KM.28<br>  PARC 74,
                        MACAO, MPIO. DE HIGUEY,<br> LA ALTAGRACIA,<br> REPUBLICA DOMINICANA</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="cis-cont">
                            <div class="cis-icon">
                                <div class="icon icon-basic-mail"></div>
                            </div>
                            <div class="cis-text">
                                <h3><span class="bold">EMAIL</span></h3>
                                <p><a href="mailto:reservations@oronightclub.com ">reservations@oronightclub.com </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="cis-cont">
                            <div class="cis-icon">
                                <div class="icon icon-basic-smartphone"></div>
                            </div>
                            <div class="cis-text">
                                <h3><span class="bold">CALL US</span></h3>
                                <p><a href="tel:1800312212">1-800-312-212</a>, <a href="tel:1800311101">1-800-311-101</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>        
        </div>        -->
        <!-- GOOLE MAP --> 
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