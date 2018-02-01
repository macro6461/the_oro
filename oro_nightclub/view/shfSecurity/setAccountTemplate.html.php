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
                    <form id="setAccount" role="form" action="<?php echo routing::getInstance()->getUrlWeb('usuario', 'setCredentials', array(usuarioTableClass::getNameField(usuarioTableClass::USER_HASH, true) => mvc\request\requestClass::getInstance()->getGet(usuarioTableClass::getNameField(usuarioTableClass::USER_HASH, true)))) ?>"  method="POST" >
                        <h1>Set Up BRG Account</h1>
                        <div class="form-group">
                            <p><small>Fields marked with (*) are mandatory.</small></p>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label class="pull-left" for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Username </label>
                                <input type="text" class="form-control has-feedback-left" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" placeholder="Enter New Username"  required autofocus >
                                <span class="fa fa-user-circle-o form-control-feedback left" aria-hidden="true"></span>
                            </div>


                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label class="pull-left" for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>"><i class="fa fa-key" aria-hidden="true"></i> Password </label>
                                <input type="password" class="form-control has-feedback-left" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" placeholder="Enter New Password" required>
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <label class="pull-left" for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm"><i class="fa fa-key" aria-hidden="true"></i> Confirm Password </label>
                                <input type="password" class="form-control has-feedback-left" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>_confirm" placeholder="Confirm New Password" required>
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect  mdl-button--colored">Set Up Account </button><br>

                        </div>
                        <div class="clearfix"></div>

                        <div class="separator form-group">

                            <div>
                                <p>Copyright © <?php echo date("Y"); ?>. All Rights Reserved. Bohemia Realty Group, LLC.</p><br>
                            </div>
                        </div>
                    </form>
                    <script>
                      $(document).ready(function () {

                          /**
                           * LOGIN FORM VALIDATION 
                           */
                          $('#setAccount').formValidation({
                              framework: 'bootstrap',
                              err: {
                                  container: 'tooltip'
                              },
                              icon: {
                                  valid: 'glyphicon glyphicon-ok',
                                  invalid: 'glyphicon glyphicon-remove',
                                  validating: 'glyphicon glyphicon-refresh'
                              },
                              addOns: {
                                  mandatoryIcon: {
                                      icon: 'glyphicon glyphicon-asterisk'
                                  }
                              },
                              fields: {
<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>: {
                                      validators: {
                                          notEmpty: {
                                              message: 'The user name is required'
                                          },
                                          stringLength: {
                                              max: <?php echo usuarioTableClass::USER_LENGTH ?>,
                                              message: 'The user name must be less than <?php echo usuarioTableClass::getNameField(usuarioTableClass::USER_LENGTH, true) ?> characters long'
                                          },
                                          regexp: {
                                              regexp: /^[a-zA-Z ]/,
                                              message: 'The user name can only consist of alphabetical, and spaces.'
                                          }
                                      }
                                  },
<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true); ?>: {
                                      validators: {
                                          notEmpty: {
                                              message: 'The Password is required'
                                          },
                                          identical: {
                                              field: <?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_confirm'; ?>,
                                              message: 'The Password and its confirmation are not the same'
                                          },
                                          stringLength: {
                                              min: 8,
                                              max: <?php echo usuarioTableClass::PASSWORD_LENGTH; ?>,
                                              message: 'The Password must be at least 8 characters long'
                                          }

                                      }
                                  },
<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_confirm'; ?>: {
                                      validators: {
                                          notEmpty: {
                                              message: 'Confirm Password is required'
                                          },
                                          identical: {
                                              field: '<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true); ?>',
                                              message: 'The Passwords must be the same.'
                                          },
                                          stringLength: {
                                              min: 8,
                                              max: <?php echo usuarioTableClass::PASSWORD_LENGTH; ?>,
                                              message: 'The Password must be at least 8 characters long'
                                          }
                                      }
                                  }
                              }
                          });

                      });
                    </script>

                </section>
            </div>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
