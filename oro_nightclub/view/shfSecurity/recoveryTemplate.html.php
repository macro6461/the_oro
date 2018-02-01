<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;
?>
<div class="login">
    <?php echo view::includePartial("partials/header"); ?>

    <div  id="large-header" class="large-header" style="padding-top: 50px; ">

        <canvas class=" hidden-xs hidden-sm" id="login-canvas" height="1060"></canvas>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="main-title login_wrapper ">
            <div class="animate form login_form">
                <section class="login_content">
                    <div class="modal-header" align="center">
                        <img class="" id="img_logo" src="<?php echo routing::getInstance()->getUrlImg("logo/logo.png"); ?>">
                    </div>
                    <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
                      <?php view::includeHandlerMessage() ?>
                    <?php endif; ?>
                    </br>
                    <form id="loginAccess" role="form" action="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'login') ?>"  method="POST" >
                        <h1>Account Recovery</h1>
                        <div class="form-group">
                            <p class="text-justify">You can use this form to recover your password if you have forgotten it.</br> Because your password is securely encrypted in our database, it is impossible actually recover your password, but we will email you the steps to reset it securely.</br></br> Enter your email address below to get started..</p>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label class="pull-left" for="brgusername"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Email Address </label>
                                <input type="text" class="form-control has-feedback-left" name="brgusername" id="brgusername" placeholder="Please enter Username" required autofocus>
                                <span class="fa fa-user-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  mdl-button--colored">Verify </button><br>

                        </div>
                        <div class="clearfix"></div>

                        <div class="separator form-group">
                            
                            
                                                        <div class="clearfix"></div>
                                                        <br />

                            <div>
                                <p>Copyright © <?php echo date("Y"); ?>. All Rights Reserved. Bohemia Realty Group, LLC.</p><br>
                            </div>
                        </div>
                    </form>

                </section>
            </div>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>-->
