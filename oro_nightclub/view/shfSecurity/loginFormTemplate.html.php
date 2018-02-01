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
                        <h1>Sign In</h1>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label class=" pull-left label-login" for="brgusername"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Username </label>
                                <input type="text" class="form-control input-lg has-feedback-left" name="brgusername" id="brgusername" placeholder="Username"  required autofocus <?php
                                if (isset($user_name)) {
                                  echo 'value="' . $user_name . '"';
                                }
                                ?>>
                                <span class="fa fa-user-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>


                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label class="pull-left label-login" for="brgpassword"><i class="fa fa-key" aria-hidden="true"></i> Password </label>
                                <input type="password" class="form-control input-lg has-feedback-left" name="brgpassword" id="brgpassword" placeholder="Password" required>
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  mdl-button--colored">Sign In </button><br>

<!--                            <a class="reset_pass" href="<?php echo routing::getInstance()->getUrlWeb("shfSecurity", "recovery") ?>"><i class="fa fa-key" aria-hidden="true"></i> Lost your password?</a>-->
                        </div>
                        <div class="clearfix"></div>

                        <div class="separator form-group">
                            <p class="change_link">New to site?
                                <a class="to_register"> Remember Me <input name="chkRememberMe" id="chkRememberMe" type="checkbox"> </a>
                            </p>
                            
                            <!--
                                                        <div class="clearfix"></div>
                                                        <br />-->

                            <div>
                                <p>Copyright © <?php echo date("Y"); ?>. All Rights Reserved.<br><b> Bohemia Realty Group, LLC.</b></p><br>
                            </div>
                        </div>
                    </form>


                </section>
            </div>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
